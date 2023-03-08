<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use App\Rules\EmailAlreadyRegistered as EmailAlreadyRegistered;
use App\Rules\ValidateEmailFormat as ValidateEmailFormat;
use App\Rules\UsernameAlreadyRegistered as UsernameAlreadyRegistered;
use App\Rules\ValidateUsernameFormat as ValidateUsernameFormat;
use App\Rules\MinimumNumberCharacters as MinimumNumberCharacters;
use App\Rules\PasswordHasUppercaseLetters as PasswordHasUppercaseLetters;
use App\Rules\PasswordHasLowercaseLetters as PasswordHasLowercaseLetters;
use App\Rules\PasswordHasNumbers as PasswordHasNumbers;
use App\Rules\PasswordHasSpecialCharacters as PasswordHasSpecialCharacters;
use App\Rules\ConfirmPassword as ConfirmPassword;
use App\Rules\AgeGroup as AgeGroup;
use App\Rules\FutureDate as FutureDate;
use App\Rules\ValidateName as ValidateName;
use App\Rules\DatabaseSizeExplosionProtection as DatabaseSizeExplosionProtection;
use App\Rules\CheckIntegrityDateTime as CheckIntegrityDateTime;

class SignupRequest extends FormRequest {

    protected $stopOnFirstFailure = true;

    public function authorize(): bool {

        return true;

    }

    public function rules(): array {

        return [
            'name' => ['required', 'bail', new DatabaseSizeExplosionProtection(255, null), 'bail', new ValidateName(), 'bail',],
            'dateOfBirth' => ['required', 'bail', new MinimumNumberCharacters(10, 'date of birth'), 'bail', new DatabaseSizeExplosionProtection(10, 'date of birth'), 'bail', new CheckIntegrityDateTime("date of birth"), 'bail', new FutureDate(), 'bail', new AgeGroup(18, 110), 'bail',],
            'email' => ['required', 'bail', new DatabaseSizeExplosionProtection(255, null), 'bail', new ValidateEmailFormat(), 'bail', new EmailAlreadyRegistered(), 'bail', ],
            'username' => ['required', 'bail', new MinimumNumberCharacters(3, null), 'bail', new DatabaseSizeExplosionProtection(255, null), 'bail', new ValidateUsernameFormat(), 'bail', new UsernameAlreadyRegistered(), 'bail', ],
            'password' => ['required', 'bail', new MinimumNumberCharacters(8, null), 'bail', new DatabaseSizeExplosionProtection(255, null), 'bail', new PasswordHasUppercaseLetters(), 'bail', new PasswordHasLowercaseLetters(), 'bail', new PasswordHasSpecialCharacters(), 'bail', new PasswordHasNumbers(), 'bail', ],
            'confirmPassword' => ['required', 'bail', new DatabaseSizeExplosionProtection(255, 'password confirmation'), 'bail', new ConfirmPassword($this->password), 'bail', ],
            'agree' => ['required', 'bail', ],
        ];

    }

    public function messages(): array {

        return [
            'name.required' => 'Enter your name.',
            'dateOfBirth.required' => 'Enter your date of birth.',
            'email.required' => 'Enter your email.',
            'username.required' => 'Choose a username.',
            'password.required' => 'Choose a password.',
            'confirmPassword.required' => 'Confirm the chosen password.',
            'agree.required' => 'Before continuing, you must accept the Community Rules and Privacy Policy.',
        ];

    }

}
