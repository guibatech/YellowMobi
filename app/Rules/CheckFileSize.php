<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class CheckFileSize implements ValidationRule {

    private int $allowedBytes;

    public function __construct(int $allowedBytes) {

        $this->allowedBytes = $allowedBytes;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if ($value->getSize() > $this->allowedBytes) {
            
            $mb = $this->allowedBytes / 1e+6;
            $fail("This file is too big. Maximum size: {$mb} mb.");

        }

    }

}
