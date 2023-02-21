<?php

namespace App\Rules;

use \Closure as Closure;
use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;

class PasswordHasNumbers implements ValidationRule {

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (!preg_match("/[0-9]+/", $value)) {

            $fail('The chosen password must have at least one number.');

        }

    }

}
