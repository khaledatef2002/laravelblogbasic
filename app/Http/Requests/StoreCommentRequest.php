<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'min:5', 'max:30'],
            'message' => ['required', 'min:5', 'max:50'],
            'blog_id' => ['required', 'exists:blogs,id']
        ];
    }

    public function attributes(): array
    {
        return [
            'blog_id' => 'blog'
        ];
    }
}
