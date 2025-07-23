# OOP PHP

### Object Oriented Programming:
- it is a programming paradigm that organizes software design around objects rather than functions or logic.
- it structures code by encapsulating data and methods within objects, promoting modularity, reusability, and maintainability.

### Key Concepts in OOP:
- **Classes**:
    - Blueprint for creating objects, defining their attributes and methods.
- **Objects**:
    - basic building blocks of OOP, representing real-world entities with data (attributes) and behaviors (methods).
- **Encapsulation**:
    - Bundling data and methods within an object.
- **Inheritance**:
    - Creating new classes (subclasses) based on existing ones (superclasses), inheriting their attributes and methods, and potentially adding new ones.
- **Polymorphism**:
    - The ability of objects of different classes to respond to the same method calls in their own way.
- **Abstraction**:
    - Hiding complex implementation details behind simple interfaces.

### Benefits of OOP:
- **Modularity**:
    - Code is organized into reusable, independent modules (objects), making it easier to understand, maintain, and debug.
- **Reusability**:
    - Objects and classes can be reused in different parts of a program or in other projects, reducing code duplication.
- **Maintainability**:
    - Changes in one object typically have minimal impact on other parts of the system, simplifying updates and bug fixes.
- **Real-world modeling**:
    - OOP allows for natural representation of real-world entities and their interactions, making it easier to develop complex systems.

### Constructor `__construct()`
- A function that runs automatically when an object is initialized.
- It's used for initialization.
    ```php
    <?php
    
    class User
    {
        private string $name;
        private string $email;
        
        public function __construct(string $name, string $email)
        {
            $this->name = $name;
            $this->email = $email;
            echo "User $name created.<br />";
        }
        
        public function getName(): string
        {
            return $this->name;
        }
    }
    
    $user = new User('Zeina', 'zeina@email.com'); // User Zeina created
    echo $user->getName(); // Zeina
    ```

### Destructor `__destruct()`
- A function that runs when an object is destroyed (goes out of scope or script ends).
- Used for cleanup.
- Useful for closing file handles, database connections, or freeing up resources.
    ```php
    <?php
    
    class DatabaseConnection {
        private $connection;
        
        public function __construct($host, $username, $password)
        {
            $this->connection = new PDO("mysql:host=$host", $username, $password);
            echo 'Database connected<br />';
        }
        
        public function __destruct()
        {
            $this->connection = null;
            echo 'Database connection closed.<br />';
        }
    }
    
    $db = new DatabaseConnection('localhost', 'root', '');
    // Database connected
    // Database connection closed.
    ```

### Inheritance
- Single inheritance:
  - PHP classes can only extend one parent class.
- **Basic inheritance**:
    ```php
    <?php
    
    class Animal {
        protected string $name;
        protected string $species;
        
        public function __construct(string $name, string $species)
        {
            $this->name = $name;
            $this->species = $species;
        }
        
        public function eat(): void
        {
            echo "$this->name is eating<br/>";
        }
        
        public function sleep()
        {
            echo "$this->name is sleeping<br/>";
        }
    }
    
    class Dog extends Animal
    {
        private string $breed;
        
        public function __construct(string $name, string $breed)
        {
            parent::__construct($name, "Canine");
            $this->breed = $breed;
        }
        
        public function bark(): void
        {
            echo "$this->name is barking: Woof!<br/>";
        }
    }
    
    $dog = new Dog("Buddy", "Golden");
    $dog->eat(); // Buddy is eating
    $dog->bark(); // Buddy is barking: Woof!
    ```
- **Method overriding**:
    ```php
    <?php
    
    class Shape
    {
        protected string $name;
        
        public function __construct(string $name)
        {
            $this->name = $name;
        }
        
        public function area(): float
        {
            return 0;
        }
        
        public function describe(): void
        {
            echo "This is a $this->name<br/>";
        }
    }
    
    class Circle extends Shape
    {
        private float $radius;
        
        public function __construct(float $radius)
        {
            parent::__construct("Circle");
            $this->radius = $radius;
        }
        
        public function area(): float
        {
            return number_format(pi() * pow($this->radius, 2), 2);
        }
        
        public function describe(): void
        {
            parent::describe();
            echo "Radius = $this->radius<br/>";
        }
    }
    
    $circle = new Circle(2.1);
    echo "Area = " . $circle->area() . '<br />'; // Area = 13.85
    $circle->describe();
    // This is a Circle
    // Radius = 2.1
    ```
- **Access modifiers**:
    ```php
    <?php
    
    class Vehicle {
        public string $color; // accessible everywhere
        protected string $engine; // accessible in this class and subclasses
        private string $vin; // only accessible in this class
        
        public function start(): void
        {
            echo "Vehicle starting<br/>";
        }
        
        protected function checkEngine(): void
        {
            echo "Engine check<br/>";
        }
        
        private function getVin(): string
        {
            return $this->vin;
        }
    }
    
    class Car extends Vehicle
    {
        public function startCar(): void
        {
            $this->checkEngine(); // can access protected
            $this->start(); // can access public
            // $this->getVin(); // can't access private
        }
    }
    
    $car = new Car();
    $car->startCar();
    // Engine check
    // Vehicle starting
    ```
- **Abstract class**:
  - blueprints that can't be instantiated directly.
  - They're designed to be extended by other classes and often contain both concrete and abstract methods.
  - Child classes must implement ALL abstract methods.
    ```php
    <?php
    
    abstract class Employee
    {
        protected string $name;
        protected int $salary;
        
        public function __construct(string $name, int $salary)
        {
            $this->name = $name;
            $this->salary = $salary;
        }
        
        // concrete method
        public function getName(): string
        {
            return $this->name;
        }
        
        // abstract method -> must be implemented by child classes
        abstract public function calculateBonus(): float;
        abstract public function getJobTitle(): string;
    }
    
    class Manager extends Employee
    {
        public function calculateBonus(): float
        {
            return $this->salary * 0.15;
        }
        
        public function getJobTitle(): string
        {
            return "Manager";
        }
    }
    
    class Developer extends Employee
    {
        public function calculateBonus(): float
        {
            return $this->salary * 0.10;
        }
        
        public function getJobTitle(): string
        {
            return "Developer";
        }
    }
    
    $manager = new Manager('Zeina', 40000);
    echo $manager->getName() . '<br/>';
    echo $manager->getJobTitle() . '<br/>';
    echo $manager->calculateBonus() . '<br/>';
    
    echo '<hr/>';
    
    $developer = new Developer('Zeina', 35000);
    echo $developer->getName() . '<br/>';
    echo $developer->getJobTitle() . '<br/>';
    echo $developer->calculateBonus() . '<br/>';
    ```

### Overloading
- PHP doesn't support traditional method overloading like C# or Java.
- `...` operator collects multiple arguments into an array.
- Must be the last parameter in the function signature.
  ```php
  <?php
  
  class Operation {
      public function sum(...$nums): float
      {
          $sum = 0;
          foreach ($nums as $num) {
              $sum += $num;
          }
          return $sum;
      }
  }
  
  $op = new Operation();
  echo $op->sum(10, 20) . '<br/>'; // 30
  echo $op->sum(10, 20, 30) . '<br/>'; // 60
  echo $op->sum(10, 20, 30, 40) . '<br/>'; // 100
  ```
