<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class GoodValidator extends Validator
{
	public function validateStrlenMax100($attribute, $value, $parameters)
	{
		return strlen($value) <= 100;
	}

	public function validateStrlenMax500($attribute, $value, $parameters)
	{
		return strlen($value) <= 500;
	}
}
