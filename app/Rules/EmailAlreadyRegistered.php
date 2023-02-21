<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;
use App\Models\UserAccount as UserAccount;

class EmailAlreadyRegistered implements ValidationRule {

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (count(UserAccount::where('email', '=', $value)->get()) > 0) {

            $fail("The email entered is already registered.");

        }

    }

}
