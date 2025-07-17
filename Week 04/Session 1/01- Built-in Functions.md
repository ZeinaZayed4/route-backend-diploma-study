# Built-in Functions

## String Functions
- echo:
  - Output on or more strings.
  - Higher performance than print.
  - Code:
    ```php
        <?php
        echo "Hello!";
    ```
- print:
  - Output a string.
  - Returns 1.
  - Code:
    ```php
        <?php
        print "Hello!";
    ```
- rtrim:
  - Removes whitespaces (or other characters) from the end of a string.
  - Code:
    ```php
        <?php
        $name = "Zeina    ";
        var_dump(rtrim($name));
    ```
- ltrim:
  - Removes whitespaces (or other characters) from the beginning of a string.
  - Code:
    ```php
        <?php
        $name = "   Zeina";
        var_dump(ltrim($name));
    ```
- trim:
  - Removes whitespaces (or other characters) from the beginning and the end of a string.
  - Code:
    ```php
        <?php
        $name = "   Zeina   ";
        var_dump(trim($name));
    ```
- lcfirst:
  - Makes a string's first character lowercase.
  - Code:
    ```php
        <?php
        $name = "Zeina";
        echo lcfirst($name); // zeina
    ```
- ucfirst:
  - Makes a string's first character uppercase.
  - Code:
    ```php
        <?php
        $name = "zeina";
        echo ucfirst($name); // Zeina
    ```
- strtolower:
  - Makes a string lowercase.
  - Code:
    ```php
        <?php
        $name = "ZEINA";
        echo strtolower($name); // zeina
    ```
- strtoupper:
  - Makes a string uppercase.
  - Code:
    ```php
        <?php
        $name = "zeina";
        echo strtoupper($name); // ZEINA
    ```
- md5:
  - Calculates the md5 hash of a string.
  - Code:
    ```php
        <?php
        $password = "12345";
        echo md5($password); // 827ccb0eea8a706c4c34a16891f84e7b
    ```

## Mathematics Functions
- abs:
  - Absolute value.
  - Code:
    ```php
        <?php
        $num = -4;
        echo abs($num); // 4
    ```
- pow:
  - Exponential expression.
  - Code:
    ```php
        <?php
        $num = 4;
        echo pow($num, 2); // 16
    ```
- round:
  - Rounds a float.
  - Code:
    ```php
        <?php
        echo round(12 / 5) . '<br />'; // 2.4 => 2
        echo round(13 / 5); // 2.6 => 3
    ```

## Array Functions
- array_keys:
  - Return all the keys or a subset of the keys of an array.
  - Code:
    ```php
        <?php
        $array1 = [2, 4, 6];
        $array2 = [2 => 100, "color" => "blue"];

        print_r(array_keys($array1)); // 0, 1, 2
        echo '<br />';
        print_r(array_keys($array2)); // 2, color
    ```
- array_values:
  - Returns all the values of an array.
  - Code:
    ```php
        <?php
        $array1 = [2, 4, 6];
        $array2 = [2 => 100, "color" => "blue"];

        print_r(array_values($array1)); // 2, 4, 6
        echo '<br />';
        print_r(array_values($array2)); // 100, blue
    ```
