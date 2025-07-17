# PHP Variables

- Variables are fundamental building blocks for storing and manipulating data.
## Variable Basics
- Syntax:
  ```php
    $variable_name = value;
  ```
## Naming Rules:
  - Must start with a letter or underscore.
  - Can contain letters, numbers, and underscores.
  - Can't start with a number.
  - Case-sensitive ($name and $Name are different variables).
  - Can't use PHP reserved words.

## Data Types
- PHP is dynamically (loosely) typed, meaning variables can hold different types of data:
  1. Scalar Types:
     - String: text data enclosed in quotes.
     - Integer: whole numbers.
     - Float/Double: decimal numbers.
     - Boolean: true or false values.
  2. Compound Types:
     - Array: collection of values.
     - Object: instance of a class.
  3. Special Types:
     - NULL: represents no value.
     - Resource: references to external resources.

## Variable Scope
1. Global Scope:
   - Variables declared outside functions are global but need the **global** keyword to access inside functions.
   - Code:
     ```php
        $globalVar = "Hi!";
     
        function testGlobal()
        {
            global $globalVar;
            echo $globalVar;
        }
     ```
2. Local Scope:
   - Variables declared inside functions are local to that function.
   - Code:
     ```php
        function testLocal()
        {
            $localVar = "Hi!";
            echo $localVar;
        }
        echo $localVar; // Error - undefined variable
     ```
3. Static Variables:
   - Retain their value between function calls.
   - Code:
     ```php
        function counter()
        {
            static $count = 0;
            $count++;
            echo $count;
        }
        counter(); // 1
        counter(); // 2
     ```

## Superglobal Variables
- PHP provides built-in superglobal arrays accessible from any scope:
  - $_GET ⇒ HTTP GET data.
  - $_POST ⇒ HTTP POST data.
  - $_SESSION ⇒ Session variables.
  - $_COOKIE ⇒ Cookie values.
  - $_SERVER ⇒ Server information.
  - $_ENV ⇒ Environment variables.
  - $_FILES ⇒ File upload information.
  - $_GLOBALS ⇒ References all global variables.

## Variable Variables
- PHP allows using the value of one variable as the name of another.
- Code:
  ```php
    $var = "Hello";
    $$var = "World";
    echo $Hello;
  ```

## Type Juggling and Casting
- PHP automatically converts between types when needed.
- Code:
  ```php
    $number = "4";
    $result = $number + 8; // results in 12 (integer)
  
    // Explicit casting
    $string = "1234abcd";
    $integer = (int)$string; // results in 1234
  ```
  
## Variable Testing Functions
- PHP provides functions to check variable states.
  - isset() ⇒ checks if a variable exists and isn't null.
  - empty() ⇒ checks if a variable is empty.
  - is_null() ⇒ checks if a variable is null.
  - unset() ⇒ destroys a variable.

## References
- Variables can reference other variables using the ampersand (&).
- Code:
  ```php
    $original = "Hello";
    $reference = &$original;
    $reference = "World";
    echo $original; // World
  ```

## Some Functions to Get Information
- `gettype()` ⇒ returns the type of the variable passed.
  ```php
    $name = "Zeina";
    echo gettype($name); // string
  ```
- `var_dump()` ⇒ dumps information about a variable.
  ```php
    $name = "Zeina";
    var_dump($name); // string(5) "Zeina"
  ```

## Best Practices
- Use descriptive variable names that explain their purpose.
- Follow consistent naming conventions (camelCase or snake_case).
- Initialize variables before use to avoid undefined variable notices.
- Use `isset()` and `empty()` to check variables before using them.
- Be mindful of variable scope to avoid conflicts.
- Unset large variables when done to free memory.
