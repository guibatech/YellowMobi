<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;
use \DateTime as DateTime;

class AgeGroup implements ValidationRule {

    private int $minimumAge;
    private int $maximumAge;
    private string $appName;

    public function __construct(int $minimumAge, int $maximumAge) {

        $this->minimumAge = $minimumAge;
        $this->maximumAge = $maximumAge;
        $this->appName = config('app.name');

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        $age = ((new DateTime('now'))->diff(new DateTime($value)))->y;

        if ($age < $this->minimumAge) {

            $fail("You must be at least {$this->minimumAge} years old to create {$this->appName} account.");

        }

        if ($age > $this->maximumAge) {

            $fail("Are you really {$age} years old?");

        }

    }

}
