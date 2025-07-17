# Conditions

- Conditions allow you to control program flow by executing different code blocks based on whether certain conditions are true or false.

## if
- Executes code only if a condition is true.
- Example:
  ```php
    $age = 18;
    if ($age >= 18) {
        echo "You are an adult."
    }
  ```

## if-else
- Provides an alternative code path when the condition is false.
- Example:
  ```php
    $temp = 25;
    if ($age > 30) {
        echo "It's hot outside."
    } eles {
        echo "It's not too hot.";
    }
  ```

## if-elseif-else
- Allows testing multiple conditions in sequence.
- Example:
  ```php
    $score = 85;

    if ($score >= 90) {
        echo "Grade: A";
    } elseif ($score >= 80) {
        echo "Grade: B";
    } elseif ($score >= 70) {
        echo "Grade: C";
    } elseif ($score >= 60) {
        echo "Grade: D";
    } else {
        echo "Grade: F";
    }
  ```

## Comparison Operators
1. Equality operators:
   - Loose comparison (type conversion) `==`.
   - Strict comparison (no type conversion) `===`.
   - Not equal `!=`.
   - Strict not equal `!==`.
2. Relational operators:
   - `> < >= <=`
3. Spaceship operator (PHP7+):
   - Code:
     ```php
        $result = ($a <=> $b);
        // returns: 
        // 1 if $a > $b, 
        // 0 if $a = $b,
        // -1 if $a < $b
     ```

## Logical Operators:
- Combine multiple conditions.
- `! and && or || xor`

## Null Coalescing Operator (PHP7+)
- Provides a default value if a variable is null.
- Code:
  ```php
    $username = $_GET['user'] ?? 'guest';
    
    // Null coalescing assignment (PHP 7.4+)
    $config['setting'] ??= 'default_value';
  ```
  
## Ternary Operator
- Shorthand for a simple if-else statement.
- Code:
  ```php
    $age = 20;
    $status = ($age >= 18) ? "adult" : "minor";
  ```
  
## Switch Statement
- Efficient for comparing a variable against many values.
- Code:
  ```php
    $day = "Monday";

    switch ($day) {
        case "Monday":
            echo "Start of work week";
            break;
        case "Wednesday":
        case "Thursday":
            echo "Midweek";
            break;
        case "Friday":
            echo "TGIF!";
            break;
        case "Saturday":
        case "Sunday":
            echo "Weekend!";
            break;
        default:
            echo "Invalid day";
    }
  ```

## Switch with Strict Comparison (PHP 8+)
- Code:
  ```php
    $value = 1;
  
    switch (true) {
        case $value === 1:
            echo "Exactly one."
            break;
        case $value === "1":
            echo "Exactly one."
            break;
    }
  ```

## Match Expression (PHP 8+)
- Modern alternative to switch with stricter comparison.
- Code:
  ```php
    $day = "Monday";
    
    $message = match ($day) {
        "Sunday" => "Start of work week",
        "Monday", "Tuesday", "Wednesday", "Thursday" => "Midweek",
        "Friday", "Saturday" => "Weekend",
        default => "Invalid day"
    };
    
    echo $message;
  ```

## Match with Expression:
- Code:
  ```php
    $age = 25;
  
    $category = match (true) {
        $age < 13 => "Child",
        $age < 20 => "Teenager",
        $age < 65 => "Adult",
        default => "Senior"  
    };
  ```

## Truthy and Falsy Values
- Falsy values:
  - `false`
  - `0` (integer)
  - `0.0` (float)
  - `""` (empty string)
  - `[]` (empty array)
  - `null`
- Truthy values:
  - Everything else, including:
    - Non-zero numbers.
    - Non-empty strings.
    - Non-empty arrays.
    - Objects.

## Best Practices:
- Use strict comparison when type matters.
- Use loose comparison for user input.
- Keep conditions readable.
- Handle edge cases:
  - Check for the existence of a variable before comparison.
  - or use null coalescing.

## if vs. switch vs. match
| Parameter                    | if                                                                                                                                              | switch                                                                                                                                                | match                                                                                                                                                  |
|------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------|
| Comparison Type              | - Uses any comparison operator.<br/> - Can perform both loose and strict comparisons.<br/> - Supports complex boolean expressions.              | - Uses loose comparison by default.<br/> - Can't perform strict comparison directly.<br/> - Compares against specific values only.                    | - Use strict comparison by default.<br/> - Always performs identity comparison.<br/> - Compares against specific values.                               |
| Return Values and Assignment | - Executes code blocks.<br/> - Doesn't return values directly.<br/> - Requires explicit assignment.                                             | - Executes code blocks.<br/> - Doesn't return values directly.<br/> - Requires explicit assignment.                                                   | - Returns values directly.<br/> - Can be assigned immediately.<br/> - More concise for value mapping.                                                  |
| Fall-through Behavior        | - No fall-through.<br/> - Each condition is independent.                                                                                        | - Has fall-through by default.<br/> - Requires `break` statements to prevent it.<br/> - Fall-through can be intentional.                              | - No fall-through.<br/> - Each arm is independent.<br/> - Multiple conditions use comma separation.                                                    |
| Performance Consideration    | - Sequential evaluation.<br/> - Stops at first true condition.<br/> - Performance depends on condition order.                                   | - Can use jump table for optimization.<br/> - Generally faster than if-elseif for many conditions.<br/> - Performance advantage increases more cases. | - Similar performance to switch.<br/> - Strict comparison may be slightly faster.<br/> - More memory efficient for simple mappings.                    |
| Error Handling               | - Graceful degradation.<br/> - Missing conditions simply don't execute.                                                                         | - Continues to default if no case matches.<br/> - Silent failure if no default provided.                                                              | - Throws `UnhandleMatchError` if no case matches.<br/> - Requires explicit default or all cases covered.                                               |
| Use Case Recommendations     | - Complex conditions with multiple operators.<br/> - Range comparisons.<br/> - Boolean logic combination.<br/> - Different types of conditions. | - Simple value comparisons.<br/> - Many possible values.<br/> - Fall-through behavior is desired.<br/> - Working with older PHP versions.             | - Simple value mappings.<br/> - Need strict comparison.<br/> - Want concise syntax.<br/> - Working with PHP 8+.<br/> - Need guaranteed error handling. |

## Examples
1. Account balance (balance = 1000, withdraw = 500):
    ```php
        $balance = 1000;
        $withdraw = 500;
   
        if ($balance > $withdraw) {
            echo "You can withdraw."
        } else {
            echo "You can NOT withdraw."
        }
    ```
2. Grades:
   ```php
        $grade = 90;
        
        if ($grade < 0 || $grade > 100)
            echo "Invalid grade";
        elseif ($grade > 0 && $grade < 50)
            echo "F";
        elseif ($grade >= 50 && $grade < 60)
            echo "D";
        elseif ($grade >= 60 && $grade < 70)
            echo "C";
        elseif ($grade >= 70 && $grade < 80)
            echo "B";
        elseif ($grade >= 80 && $grade < 80)
            echo "A";
        else
            echo "A+";
   ```
