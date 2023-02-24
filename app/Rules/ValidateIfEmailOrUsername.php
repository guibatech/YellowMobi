<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class ValidateIfEmailOrUsername implements ValidationRule {

    public function __construct() {}

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (!preg_match("/^[A-Za-z0-9_.]+([@][A-Za-z0-9]+){1}([.]{1}[A-Za-z0-9]{2,4})+$/", $value) && !preg_match("/^[@]{1}[A-Za-z0-9_]+$/", $value)) {

            $fail('Enter a valid email or @username.');

        }

    }

}
