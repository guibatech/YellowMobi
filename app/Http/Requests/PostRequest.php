<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as FormRequest;
use App\Rules\DatabaseSizeExplosionProtection as DatabaseSizeExplosionProtection;
use App\Rules\MinimumNumberCharacters as MinimumNumberCharacters;
use App\Rules\CheckMimeType as CheckMimeType;
use App\Rules\CheckFileSize as CheckFileSize;

class PostRequest extends FormRequest {

    protected $stopOnFirstFailure = true;

    public function authorize(): bool {

        return true;

    }

    public function rules(): array {

        return [
            'postText' => ['required', 'bail', new MinimumNumberCharacters(1, 'post'), 'bail', new DatabaseSizeExplosionProtection(300, "text of your post"), 'bail',],
            'postImage' => [new CheckMimeType(['image/png', 'image/jpg', 'image/jpeg', 'image/gif']), 'bail', new CheckFileSize(5000000), 'bail',],
        ];

    }

    public function messages(): array {

        return [
            'postText.required' => 'Before publishing, insert awesome text.',
        ];

    }

}
