<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;

class DatabaseSizeExplosionProtection implements ValidationRule {

    private int $fieldSize;
    private ?string $fantasyName;

    public function __construct(int $fieldSize, ?string $fantasyName) {

        $this->fieldSize = $fieldSize;
        $this->fantasyName = $fantasyName;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (strlen($value) > $this->fieldSize) {

            if ($this->fantasyName != null) {

                $fail("The {$this->fantasyName} can only have a maximum of {$this->fieldSize} characters.");

            } else {

                $fail("The {$attribute} can only have a maximum of {$this->fieldSize} characters.");

            }

        }

    }

}
