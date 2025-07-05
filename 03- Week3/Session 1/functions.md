# Function

## Syntax
- `function function_name(parameters) { // code }`

## Function Types
1. void
2. return

## Examples
```php
function message()
{
    echo "Hello!";
}
message();
```

```php
function greet(): string
{
	return "Hi!";
}
echo greet();
```

```php
function sum($op1, $op2): int|float
{
	return $op1 + $op2;
}
echo sum(4, 8);
```

```php
function multiply($op1, $op2, $op3 = 1): int|float
{
	return $op1 * $op2 * $op3;
}
echo multiply(5, 10);
```

```php
function operate($op1, string $operation, $op2): mixed
{
	switch ($operation) {
		case '+':
			$result = $op1 + $op2;
			break;
		case '-':
			$result = $op1 - $op2;
			break;
		case '*':
			$result = $op1 * $op2;
			break;
		case '/':
			$result = $op1 / $op2;
			break;
		default:
			return "Supported operations: + - * /";
	}
	return $result;
}
echo operate(8, '+', 4);
```
