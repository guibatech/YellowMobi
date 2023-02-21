<?php

namespace App\Rules;

use \Closure as Closure;
use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;

class PasswordHasLowercaseLetters implements ValidationRule {

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (!preg_match("/[a-z]+/", $value)) {

            $fail("The chosen password must have at least one lowercase letter.");

        }

    }

}
