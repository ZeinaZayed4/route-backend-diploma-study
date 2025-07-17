# Loops

- Loops are used for repeating code execution.

## for
- ideal when you know exactly how many iterations you need.
- Code:
  ```php
    for ($i = 0; $i < 10; ++$i) {
        echo "$i ";
    }
  ```

## while
- Executes code as long as the condition remains true.
- Best when you don't know the exact number of iterations.
- Code:
  ```php
    $i = 0;
    while ($i < 10) {
        echo "$i ";
        $i++;
    }
  ```
  
## do-while
- Similar to while, but guarantees at least one execution since the condition is checked after the loop body.
- Code:
  ```php
    $attempts = 0;
    do {
        $attempts++;
        echo "$attempts ";
        $success = (rand(1, 10) > 7);
    } while (!$success && $attempts < 5);
  ```

## foreach
- Specifically designed for iterating over arrays and objects.
- Mostly commonly use loop in PHP.
- Code:
  ```php
    $fruits = ["apple", "banana", "orange"];
    
    // values only
    foreach ($fruits as $fruit) {
        echo "Fruit: $fruit<br />";
    }
  
    // with keys and values
    foreach ($fruits as $index => $fruit) {
        echo "Index $index: $fruit<br />";
    }
  ```

## Loop Control Statements
### break
- Exists the current loop immediately.
- Code:
  ```php
    for ($i = 0; $i < 10; ++$i) {
        if ($i === 5)
            break;
        echo "$i ";
    }
    // output: 0 1 2 3 4
  ```
### continue
- Skips the rest of the current iteration and moves to the next one.
- Code:
  ```php
    for ($i = 0; $i < 10; ++$i) {
        if ($i % 2 !== 0)
            continue;
        echo "$i ";
    }
    // output: 0 2 4 6 8
  ```

## Alternative Syntax
- PHP provides alternative syntax for loops, useful in mixed HTML/PHP code.
- Code:
  ```php
    for ($i = 0; $i < 10; ++$i):
        echo "$i ";
    endfor;
  ```
  
## Nested Loops
- Loops inside other loops for complex iterations.
- Code:
  ```php
    for ($i = 1; $i <= 10; ++$i) {
	    for ($j = 1; $j <= 10; ++$j) {
	    	echo "$i * $j = " . ($i * $j) . PHP_EOL;
	    }
	    echo PHP_EOL;
    }
  ```
  
## Best Practices
- Choose the right loop:
  - Use `foreach` for arrays and objects.
  - Use `for` when you need precise control over iteration.
  - Use `while / do-while` for condition-based loops.
- Avoid common pitfalls:
  ```php
    $items = [1, 2, 3, 4, 5];
  
    // wrong - unpredictable behavior
    foreach ($items as $key => $item) {
        if ($item === 3) {
            unset($items[$key]); // modifying during iteration
        }
    }
  
    // right - collect keys to remove, then remove
    $keyToRemove = [];
    foreach ($items as $key => $item) {
        if ($item === 3) {
            $keyToRemove[] = $key; // modifying during iteration
        }
    }
    foreach ($keyToRemove as $key) {
        unset($items[$key]);
    }
  ```
- Use meaningful variable names:
  ```php
    // good
    foreach ($users as $user) {
        echo $user['name'];
    }
  
    // bad
    foreach ($users as $u) {
        echo $u['name'];
    }
  ```
- Handle edge cases:
  ```php
    // check if an array is not empty
    if (!empty($items)) {
        foreach ($items as $item) {
            processItem($item);
        }
    }
  ```
