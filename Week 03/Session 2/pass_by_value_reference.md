# Pass by (Value/Reference)

## Pass by Value
```php
<?php

function increaseValue($x)
{
	$x++;
	echo $x . '<br />';
}

$x = 4;
increaseValue($x); // 5
increaseValue($x); // 5
increaseValue($x); // 5
echo $x . '<br />'; // 4
```

## Pass by Reference (&)
```php
<?php

function increase(&$x)
{
	$x++;
	echo $x . '<br />';
}

$x = 4;
increase($x); // 5
increase($x); // 6
increase($x); // 7
echo $x . '<br />'; // 7
```
