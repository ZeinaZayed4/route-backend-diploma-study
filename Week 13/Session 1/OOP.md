# OOP PHP

## static
- `static` keyword is used to create class-level properties and methods that belong to the class itself rather than to individual instances of the class.
- **Static Properties**:
    ```php
    class Counter
    {
        public static $count = 0;
        
        public function __construct()
        {
            self::$count++;
        }
        
        public static function getCount()
        {
            return self::$count;
        }
    }
    
    $counter = new Counter(); // increase count by 1
    echo Counter::$count . '<br/>'; // 1
    echo Counter::getCount(); // 1
    ```
- **Static Methods**:
    ```php
    class MathHelper
    {
        public static function add(int $a, int $b): int
        {
            return $a + $b;
        }
        
        public static function multiply(int $a, int $b): int
        {
            return $a * $b;
        }
    }
    
    echo MathHelper::add(4, 8) . '<br/>'; // 12
    echo MathHelper::multiply(4, 8); // 32
    ```
- **Key Points**:
  - **Access**:
    - Use the scope resolution operator `::` to access static properties and methods
      - `ClassName::$property`
      - `ClassName::method()`
  - **Self-Reference**:
    - Inside the class, use `self::` to reference static members:
      ```php
      class Example {
          private static int $value = 10;
        
          public static function getValue(): int
          {
              return self::$value;
          }
      }
      ```
  - **No $this**:
    - Static methods can't use `$this` because they don't operate on specific instances.
