<?php

namespace Validation;

class Required implements Validator
{
	public function check(string $key, mixed $value): string|bool
	{
		if (empty($value))
			return ucfirst($key) . ' is required';
		
		return false;
	}
}