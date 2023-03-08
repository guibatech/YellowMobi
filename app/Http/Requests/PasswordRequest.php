<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use App\Rules\MinimumNumberCharacters as MinimumNumberCharacters;
use App\Rules\DatabaseSizeExplosionProtection as DatabaseSizeExplosionProtection;
use App\Rules\PasswordHasUppercaseLetters as PasswordHasUppercaseLetters;
use App\Rules\PasswordHasLowercaseLetters as PasswordHasLowercaseLetters;
use App\Rules\PasswordHasSpecialCharacters as PasswordHasSpecialCharacters;
use App\Rules\PasswordHasNumbers as PasswordHasNumbers;
use App\Rules\ConfirmPassword as ConfirmPassword;
use App\Rules\PasswordAlreadyUsed as PasswordAlreadyUsed;
use App\Models\UserAccount as UserAccount;

class PasswordRequest extends FormRequest {

    protected $stopOnFirstFailure = true;

    public function authorize(): bool {

        return true;

    }

    public function rules(): array {

        $user = UserAccount::where('forgot_token', '=', $this->token)->first();

        return [
            'password' => ['required', 'bail', new MinimumNumberCharacters(8, null), 'bail', new DatabaseSizeExplosionProtection(255, null), 'bail', new PasswordHasUppercaseLetters(), 'bail', new PasswordHasLowercaseLetters(), 'bail', new PasswordHasSpecialCharacters(), 'bail', new PasswordHasNumbers(), 'bail', new PasswordAlreadyUsed($user), 'bail',],
            'confirmPassword' => ['required', 'bail', new DatabaseSizeExplosionProtection(255, 'password confirmation'), 'bail', new ConfirmPassword($this->password), 'bail', ],
        ];

    }

    public function messages(): array {

        return [
            'password.required' => 'Choose a password.',
            'confirmPassword.required' => 'Confirm the chosen password.',
        ];

    }

}
