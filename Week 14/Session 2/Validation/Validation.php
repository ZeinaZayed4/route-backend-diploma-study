<?php

namespace Validation;

class Validation
{
	private array $errors = [];
	
	public function validate(string $key, mixed $value, array $rules): void
	{
		foreach ($rules as $rule) {
			$rule = "Validation\\" . $rule;
			$object = new $rule;
			
			$output = $object->check($key, $value);
			
			if ($output)
				$this->errors[] = $output;
		}
	}
	
	public function getErrors(): array
	{
		return $this->errors;
	}
}