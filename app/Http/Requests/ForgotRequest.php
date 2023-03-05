<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use App\Rules\ValidateIfEmailOrUsername as ValidateIfEmailOrUsername;
use App\Rules\DatabaseSizeExplosionProtection as DatabaseSizeExplosionProtection;

class ForgotRequest extends FormRequest {

    protected $stopOnFirstFailure = true;

    public function __construct() {}

    public function authorize(): bool {

        return true;

    }

    public function rules(): array {

        return [
            'credential' => ['required', 'bail', new ValidateIfEmailOrUsername(), 'bail', new DatabaseSizeExplosionProtection(255, null)],
        ];

    }

    public function messages(): array {

        return [
            'credential.required' => "Enter your email or @username.",
        ];

    }

}
