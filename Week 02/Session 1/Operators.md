# Operators

## Arithmetic Operators
- `+ - * / % **`
- Code:
  ```php
    $x = 8;
    $y = 4;

    echo ($x + $y) . '<br />'; // 12
    echo ($x - $y) . '<br />'; // 4
    echo ($x * $y) . '<br />'; // 32
    echo ($x / $y) . '<br />'; // 2
    echo ($x % $y) . '<br />'; // 0
    echo ($x ** $y) . '<br />'; // 4096
  ```

## Assignment Operators
- `= += -= *= /= %=`
- Code:
  ```php
    $x = 8;
    $y = 4;

    $x += $y;
    echo $x . '<br />'; // 12

    $x -= $y;
    echo $x . '<br />'; // 8

    $x *= $y;
    echo $x . '<br />'; // 32

    $x /= $y;
    echo $x . '<br />'; // 8

    $x %= $y;
    echo $x . '<br />'; // 0
  ```

## Comparison Operators
- `== != <> === !== < <= > >= <=>`
- `==` => compares values only, while `===` compares types and values.
- Code:
  ```php
    $x = 8;
    $y = 4;

    var_dump($x == $y) . '<br />'; // bool(false)
    var_dump($x != $y) . '<br />'; // bool(true)
    var_dump($x === $y) . '<br />'; // bool(false)
    var_dump($x !== $y) . '<br />'; // bool(true)
    var_dump($x > $y) . '<br />'; // bool(true)
    var_dump($x >= $y) . '<br />'; // bool(true)
    var_dump($x < $y) . '<br />'; // bool(false)
    var_dump($x <= $y) . '<br />'; // bool(false)
    var_dump($x <> $y) . '<br />'; // bool(true)
    var_dump($x <=> $y) . '<br />'; // int(1)
  ```

## Increment / Decrement Operators
- `++$var $var++ --$var $var--`
- Code:
  ```php
    $x = 8;
    $y = 4;

    $x++; // $x = 8
    ++$x; // $x = 10
    $x--; // $x = 10
   --$x; // $x = 8
  ```

## Logical Operators
- `! and && or || xor`
- Code:
  ```php
    $x = 8;
    $y = 4;

    var_dump($x > 5 && $y < 2); // T && F => F
    var_dump($x > 5 || $y < 2); // T && F => T
    var_dump($x > 5 xor $y < 2); // T && F => T
    var_dump(!($x > 5)); // !T => F
  ```

## String Operators
- `. .=`
- Code:
  ```php
    $fName = "Zeina";
    $lName = "Zayed";

    echo $fName . ' ' . $lName . '<br />'; // Zeina Zayed

    $str = "Hello";
    $str .= " World!";
    echo $str; // Hello World!
  ```

## Array Operators
- `+ == === != <> !==`
- Code:
  ```php
    $arr1 = [0 => 1, 1 => 2, 2 => 3, 3 => 4];
    $arr2 = [4 => 5, 5 => 6, 6 => 7, 7 => 8];

    echo '<pre>';
    print_r($arr1 + $arr2);
    echo '</pre>';

    var_dump($arr1 == $arr2); // bool(false)
    var_dump($arr1 === $arr2); // bool(false)
    var_dump($arr1 != $arr2); // bool(true)
    var_dump($arr1 <> $arr2); // bool(true)
    var_dump($arr1 !== $arr2); // bool(true)
  ```

## Conditional Assignment Operators
- `?: ??`
- Code:
  ```php
    echo (8 > 4) ? "Greater <br />" : "Less <br />";
    echo ($num) ?? "Not defined";
  ```
