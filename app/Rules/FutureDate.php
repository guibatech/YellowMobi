<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;
use \DateTime as DateTime;

class FutureDate implements ValidationRule {

    private string $appName;

    public function __construct() {

        $this->appName = config('app.name');

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        $beforeToday = (new DateTime('now'))->diff(new DateTime($value))->invert == 0 ? false : true;
        
        if (!$beforeToday) {

            $fail("Time travelers cannot have a {$this->appName} account.");

        }

    }

}
