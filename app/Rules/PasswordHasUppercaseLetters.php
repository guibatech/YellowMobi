<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class PasswordHasUppercaseLetters implements ValidationRule {

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (!preg_match("/[A-Z]+/", $value)) {

            $fail('The chosen password must have at least one uppercase letter.');

        }

    }

}
