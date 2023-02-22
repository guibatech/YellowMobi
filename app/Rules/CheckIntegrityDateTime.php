<?php

namespace App\Rules;

use \Closure as Closure;
use \DateTime as DateTime;
use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Exception as Exception;

class CheckIntegrityDateTime implements ValidationRule {

    private ?string $fantasyName;

    public function __construct(?string $fantasyName) {

        $this->fantasyName = $fantasyName;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        try {

            new DateTime($value);

        } catch (Exception $e) {

            if ($this->fantasyName != null) {
                
                $fail("Enter a valid {$this->fantasyName}.");

            } else {

                $fail("Enter a valid {$attribute}.");

            }

        }

    }

}
