<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use App\Rules\EmailAlreadyRegistered as EmailAlreadyRegistered;

class SignupRequest extends FormRequest {

    public function authorize(): bool {

        return true;

    }

    public function rules(): array {

        return [
            'email' => [new EmailAlreadyRegistered(), 'bail', ],
        ];

    }

    public function messages(): array {

        return [

        ];

    }

}
