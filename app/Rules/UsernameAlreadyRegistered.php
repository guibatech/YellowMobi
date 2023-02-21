<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;
use App\Models\UserAccount as UserAccount;

class UsernameAlreadyRegistered implements ValidationRule {

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (count(UserAccount::where('username', '=', $value)->get()) > 0) {

            $fail('The chosen username already exists.');

        }

    }

}
