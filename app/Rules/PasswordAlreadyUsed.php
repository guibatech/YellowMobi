<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule as ValidationRule;
use \Closure as Closure;
use App\Models\UserAccount as UserAccount;
use Illuminate\Support\Facades\Hash as Hash;

class PasswordAlreadyUsed implements ValidationRule {

    private UserAccount $user;

    public function __construct(UserAccount $user) {

        $this->user = $user;

    }

    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (Hash::check($value, $this->user->password)) {

            $fail("This password was recently used. Please, choose another one.");

        }

    }

}
