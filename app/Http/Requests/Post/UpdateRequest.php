<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['string', 'min:2'],
            'body' => ['string', 'min:2'],
            'tags' => 'array',
            'tags.*' => ['string', 'min:2']
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'title must be string',
            'title.min' => 'title must be at least :min chars',

            'body.string' => 'body must be string',
            'body.min' => 'body must be at least :min chars',

            'tags.array' => 'tags must be array',
            'tags.*.string' => 'tag must be string',
            'tags.*.min' => 'tag must be at least :min chars',
        ];
    }
}
