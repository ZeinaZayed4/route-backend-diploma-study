# Types of Errors

- PHP has several types of errors that can occur during script execution.

## Fatal Errors
- These stop script executions immediately.
1. **E_ERROR**:
   - Fatal run-time errors that can't be recovered from.
   - ```php 
     call_undefined_function();
     ```
2. **E_COMPILE_ERROR**:
   - Fatal compile-time errors (syntax errors).
   - ```php
     <?php
     echo "Hello World!" // missing semicolon
     ```
3. **E_CORE_ERROR**:
   - Fatal error during PHP's initial startup.

## Warnings
- These don't stop execution but indicate problems.
1. E_WARNING:
   - Non-fatal errors during PHP's initial startup.
2. E_COMPILE_WARNING:
   - Non-fatal compile-time warnings.

## Notices
- These are suggestions for code improvement.
1. E_NOTICE:
   - Run-time notices for non-critical issues.
   - ```php
     echo $undefined_variable;
     ```
2. E_USER_NOTICE:
   - User-generated notices using `trigger_error()`.

## Parse Errors
1. E_PARSE:
   - Syntax errors that prevent the script from being parsed.
   - ```php
     if ($condition { // missing closing parenthesis
        echo "Hello!";
     }
     ```

## User-Defined Errors
- These are triggered manually by developers:
1. E_USER_ERROR:
   - User-generated fatal error.
2. E_USER_WARNING:
   - User-generated warning.
3. E_USER_NOTICE:
   - User-generated notice.
```php
if ($age < 0) {
    trigger_error("Age can't be negative.", E_USER_ERROR);
}
```

## Strict Standards
- E_STRICT:
   - Suggestions for code interoperability and forward compatibility.
   - ```php
     class MyClass {
        function oldMethod() {} // strict: should be public, private, or protected
     }
     ```

## Deprecated
- E_DEPRECATED:
  - Warnings about code that will be removed in future PHP versions.
  - ```php
    mysql_connect(); // deprecated
    ```

## Recoverable Fatal Errors
- E_RECOVERABLE_ERROR:
  - Catchable fatal errors that can be handled.
  - ```php
    function test(array $arr) { }
    test("string"); // argument must be an array
    ```

## Error Reporting Levels
- You can control which errors are reported using:
  - ```php
    error_reporting(E_ALL);
    error_reporting(E_ERROR | E_WARNING);
    error_reporting(0);
    ```

## Error Handling
- PHP provides several ways to handle errors:
  - `set_error_handle()` custom error handler.
  - `try/catch` blocks for exceptions.
  - `error_get_last()` get information about the last error.
