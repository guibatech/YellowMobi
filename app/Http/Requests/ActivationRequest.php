<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use App\Traits\TokenTrait as TokenTrait;

class ActivationRequest extends FormRequest {

    use TokenTrait;

    protected $stopOnFirstFailure = true;

    public function authorize(): bool {

        return true;

    }

    public function rules(): array {
        
        return $this->tokenValidations($this->all());

    }

    public function messages(): array {

        return [

        ];

    }

}
