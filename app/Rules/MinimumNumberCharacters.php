<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class MinimumNumberCharacters implements ValidationRule {

    private int $minimumLength;
    private ?string $fantasyName;

    public function __construct(int $minimumLength, ?string $fantasyName) {

        $this->minimumLength = $minimumLength;
        $this->fantasyName = $fantasyName;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (strlen($value) < $this->minimumLength) {

            if ($this->fantasyName != null) {

                $fail("Your {$this->fantasyName} must have at least {$this->minimumLength} character(s).");
            
            } else {
                
                $fail("Your {$attribute} must have at least {$this->minimumLength} character(s).");

            }

        }

    }

}
