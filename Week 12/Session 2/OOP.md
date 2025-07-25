# OOP PHP

## const
- `const` is used to define class constants -> values that belong to the class itself rather than to individual instances of the class.
    ```php
    <?php
    
    class HTTPStatus
    {
        public const OK = 200;
        public const NOT_FOUND = 404;
        public const SERVER_ERROR = 500;
        
        public static function getMessage(int $code): string
        {
            return match ($code) {
                self::OK => 'Success',
                self::NOT_FOUND => 'Page not found',
                self::SERVER_ERROR => 'Internal server error',
                default => 'Unknown status',
            };
        }
    }
    
    echo HTTPStatus::getMessage(HTTPStatus::NOT_FOUND);
    ```

## final
- `final` keyword prevents inheritance and method overriding.
- It can be applied to methods and classes to control how your code can be extended.
- final classes:
  - `final class DatabaseConnection {}`
- final methods:
  - `final public function eat() {}`
- final vs. private:
  - `private`: can't be accessed or overridden in child classes.
  - `final`: can be accessed but can't be overridden.
- The `final` keyword is a powerful tool for designing robust APIs and preventing unintended modifications to critical code paths.

## interface
- `interface` defines a contract that classes must follow.
- It specifies what methods a class must implement without providing the actual implementation.
- Key interface rules:
  - All methods must be public.
  - No method implementations (only signature).
  - Can contain constants.
  - Classes must implement all interface methods.
  - A class can implement multiple interfaces.
- Example:
  ```php
  <?php
    
  interface Readable
  {
      public function read(): string;
  }
    
  interface Writable
  {
      public function write(string $data): bool;
  }
    
  class File implements Readable, Writable
  {
      private string $filename;
        
      public function __construct(string $filename)
      {
          $this->filename = $filename;
      }
        
      public function read(): string
      {
          return file_get_contents($this->filename);
      }
        
      public function write(string $data): bool
      {
          return file_put_contents($this->filename, $data) !== false;
      }
  }
    
  $file = new File('test.txt');
  echo $file->read(); // Hello
  $file->write(' world');
  echo $file->read(); // Hello world
  ```

## Method Chaining
- is a technique where multiple methods are called on the same object in a single statement by returning `$this` from each method.
- Key principles:
  - Return `$this`: each chainable method must return the current object.
  - Return types: use `self` or the class name as return type.
  - Terminal methods: some methods don't return `$this` because they're meant to end the chain.
- Example:
  ```php
  <?php
    
  class QueryBuilder
  {
      private string $query = '';
      private array $conditions = [];
      private array $orderBy = [];
        
      public function select(string $columns): self
      {
          $this->query = "SELECT $columns";
          return $this;
      }
        
      public function from(string $table): self
      {
          $this->query .= " FROM $table";
          return $this;
      }
        
      public function where(string $condition): self
      {
          $this->conditions[] = $condition;
          return $this;
      }
        
      public function orderBy(string $column, string $direction = 'ASC'): self
      {
          $this->orderBy[] = "$column $direction";
          return $this;
      }
        
      public function build(): string
      {
          $sql = $this->query;
            
          if (! empty($this->conditions)) {
              $sql .= ' WHERE ' . implode(' AND ', $this->conditions);
          }
            
          if (! empty($this->orderBy)) {
              $sql .= ' ORDER BY ' . implode(', ', $this->orderBy);
          }
          return $sql;
      }
  }
    
  $sql = (new QueryBuilder())
      ->select('id, name, email')
      ->from('users')
      ->where('active = 1')
      ->where('age > 18')
      ->orderBy('name')
      ->orderBy('created_at', 'DESC')
      ->build();
    
  echo $sql;
  ```

## trait
- `trait` is a mechanism for code reuse that allows you to share methods across multiple classes without using inheritance.
- It solves the problem of single inheritance limitation and helps avoid code duplication.
- Example:
    ```php
    <?php
    
    trait Loggable
    {
        public function log(string $message): void
        {
            echo '[' .date('Y-m-d H:i:s') . '] ' . $message . '<br/>';
        }
        
        public function logError(string $error): void
        {
            $this->log('ERROR: ' . $error);
        }
        
        public function logInfo(string $info): void
        {
            $this->log('INFO: ' . $info);
        }
    }
    
    class User
    {
        use Loggable;
        
        private string $name;
        
        public function __construct(string $name)
        {
            $this->name = $name;
            $this->logInfo("User $name created");
        }
        
        public function getName(): string
        {
            return $this->name;
        }
    }
    
    class Order
    {
        use Loggable;
        
        private int $id;
        private float $total;
        
        public function __construct(int $id, float $total)
        {
            $this->id = $id;
            $this->total = $total;
            $this->logInfo("Order $id created with total $total");
        }
    }
    
    $user = new User('Zeina Zayed');
    $order = new Order(246, 842);
    ```
