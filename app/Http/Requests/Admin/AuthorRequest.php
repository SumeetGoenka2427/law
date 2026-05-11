<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'slug'        => ['nullable', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],
            'bio'         => ['nullable', 'string'],
            'image'       => ['nullable', 'image', 'max:2048'],
            'email'       => ['nullable', 'email', 'max:255'],
            'twitter'     => ['nullable', 'string', 'max:255'],
            'linkedin'    => ['nullable', 'string', 'max:255'],
            'is_active'   => ['nullable', 'boolean'],
        ];
    }
}
