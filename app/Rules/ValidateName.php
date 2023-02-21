<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class ValidateName implements ValidationRule {

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (!preg_match('/^[A-Za-z ]+$/', $value)) {

            $fail('The chosen name can only have letters and spaces.');

        }

    }

}
