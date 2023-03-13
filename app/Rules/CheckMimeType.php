<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class CheckMimeType implements ValidationRule {

    private Array $allowedMimeTypes;

    public function __construct(Array $allowedMimeTypes) {

        $this->allowedMimeTypes = $allowedMimeTypes;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (!in_array($value->getMimeType(), $this->allowedMimeTypes)) {

            $fail("This file type is not allowed.");

        }

    }

}
