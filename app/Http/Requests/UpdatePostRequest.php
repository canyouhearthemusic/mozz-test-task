<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'category' => ['array'],
            'title' => ['min:4', 'max:50', 'string'],
            'excerpt' => ['min:4', 'max:50', 'string'],
            'body' => ['min:10', 'string'],
            'thumbnail' => ['image', 'mimes:jpg,png'],
        ];
    }
}
