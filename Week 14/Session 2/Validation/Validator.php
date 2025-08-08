<?php

namespace Validation;

interface Validator
{
	public function check(string $key, mixed $value);
}