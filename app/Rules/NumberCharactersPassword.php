<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class NumberCharactersPassword implements ValidationRule {

    private int $minimumLength;

    public function __construct() {

        $this->minimumLength = 8;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (strlen($value) < $this->minimumLength) {

            $fail("The chosen password must have at least {$this->minimumLength} characteres.");

        }

    }

}
