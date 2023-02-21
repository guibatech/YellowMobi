<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class ConfirmPassword implements ValidationRule {

    private ?string $password;

    public function __construct(?string $password) {

        $this->password = $password;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if ($value != $this->password) {

            $fail('The password confirmation must match the chosen password.');

        }

    }

}
