<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class ValidateTokenDigit implements ValidationRule {

    public function __construct() {}

    public function validate(string $attribute, mixed $value, Closure $fail): void {
        
        if (!preg_match("/^[A-Za-z0-9]{1}$/", $value)) {

            $realPosition = str_replace("d_", "", $attribute) + 1;
            $fail("Only characters [A-Za-z0-9] in digit {$realPosition}.");

        }

    }

}
