<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:2'],
            'body' => ['required', 'string', 'min:10'],
            'user_id' => ['required', 'integer'],
            'tags' => 'array',
            'tags.*' => ['string', 'min:2']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title is required',
            'title.string' => 'title must be string',
            'title.min' => 'title must be at least :min chars',

            'body.required' => 'body is required',
            'body.string' => 'body must be string',
            'body.min' => 'body must be at least :min chars',

            'user_id.required' => 'user_id is required',
            'user_id.integer' => 'user_id must be integer',

            'tags.array' => 'tags must be array',
            'tags.*.string' => 'tag must be string',
            'tags.*.min' => 'tag must be at least :min chars',
        ];
    }
}
