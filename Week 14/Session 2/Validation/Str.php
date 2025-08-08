<?php

namespace Validation;

class Str implements Validator
{
	public function check(string $key, mixed $value): string|bool
	{
		if (is_numeric($value))
			return ucfirst($key) . ' must be a string';
		
		return false;
	}
}