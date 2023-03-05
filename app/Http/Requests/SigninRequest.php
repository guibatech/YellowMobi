<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use App\Rules\DatabaseSizeExplosionProtection as DatabaseSizeExplosionProtection;
use App\Rules\ValidateIfEmailOrUsername as ValidateIfEmailOrUsername;

class SigninRequest extends FormRequest {

    protected $stopOnFirstFailure = true;

    public function authorize(): bool {

        return true;

    }

    public function rules(): array {

        return [
            'credential' => ['required', 'bail', new DatabaseSizeExplosionProtection(255, null), 'bail', new ValidateIfEmailOrUsername(), 'bail', ],
            'password' => ['required', 'bail', new DatabaseSizeExplosionProtection(255, null), 'bail', ],
        ];

    }

    public function messages(): array {

        return [
            'credential.required' => 'Enter your email or @username.',
            'password.required' => 'Enter your password.',
        ];

    }

}
