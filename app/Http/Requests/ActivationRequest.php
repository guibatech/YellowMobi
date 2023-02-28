<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use App\Rules\DatabaseSizeExplosionProtection as DatabaseSizeExplosionProtection;
use App\Rules\JustNumbers as JustNumbers;

class ActivationRequest extends FormRequest {

    protected $stopOnFirstFailure = true;

    public function authorize(): bool {

        return true;

    }

    public function rules(): array {

        $rules = [];
        
        foreach ($this->request as $inputName => $inputValue) {

            if (preg_match("/^(digit_){1}[0-9]+$/", $inputName)) {

                $rules[$inputName] = ['required', 'bail', new DatabaseSizeExplosionProtection(1, null), 'bail', new JustNumbers()];

            }

        }

        return $rules;

    }

    public function messages(): array {

        return [

        ];

    }

}
