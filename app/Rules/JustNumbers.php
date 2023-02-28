<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class JustNumbers implements ValidationRule {

    public function __construct() {}

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        $valueArray = str_split($value, 1);

        foreach ($valueArray as $valueItem) {

            if (!preg_match("/^[0-9]{1}$/", $valueItem)) {

                $fail("Only numbers are allowed in the {$attribute} field.");

            }

        }

    }

}
