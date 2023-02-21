<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class PasswordHasSpecialCharacters implements ValidationRule {

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (!preg_match("/[^A-Za-z0-9]+/", $value)) {

            $fail('The chosen password must have at least one special character.');

        }

    }

}
