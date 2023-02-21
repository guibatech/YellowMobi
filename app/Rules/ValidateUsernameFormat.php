<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class ValidateUsernameFormat implements ValidationRule {

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (!preg_match("/^[A-Za-z0-9_]+$/", $value)) {

            $fail('The chosen username can only contain letters, numbers and underlines.');

        }

    }

}
