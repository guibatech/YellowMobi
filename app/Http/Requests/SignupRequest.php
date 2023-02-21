<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use App\Rules\EmailAlreadyRegistered as EmailAlreadyRegistered;
use App\Rules\ValidateEmailFormat as ValidateEmailFormat;
use App\Rules\UsernameAlreadyRegistered as UsernameAlreadyRegistered;
use App\Rules\ValidateUsernameFormat as ValidateUsernameFormat;
use App\Rules\NumberCharactersPassword as NumberCharactersPassword;

class SignupRequest extends FormRequest {

    protected $stopOnFirstFailure = true;

    public function authorize(): bool {

        return true;

    }

    public function rules(): array {

        return [
            'email' => ['required', 'bail', new ValidateEmailFormat(), 'bail', new EmailAlreadyRegistered(), 'bail',],
            'username' => ['required', 'bail', new ValidateUsernameFormat(), 'bail', new UsernameAlreadyRegistered(), 'bail',],
            'password' => ['required', 'bail', new NumberCharactersPassword(), 'bail', ],
        ];

    }

    public function messages(): array {

        return [
            'email.required' => 'Enter your email.',
            'username.required' => 'Choose a username.',
            'password.required' => 'Choose a password.',
        ];

    }

}
