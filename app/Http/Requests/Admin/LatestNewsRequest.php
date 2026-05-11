<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LatestNewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255'],
            'category_id'      => ['nullable', 'exists:categories,id'],
            'author_id'        => ['nullable', 'exists:authors,id'],
            'excerpt'          => ['nullable', 'string', 'max:500'],
            'content'          => ['required', 'string'],
            'image'            => ['nullable', 'image', 'max:2048'],
            'status'           => ['nullable', 'in:draft,published,archived'],
            'is_featured'      => ['nullable', 'boolean'],
            'is_breaking'      => ['nullable', 'boolean'],
            'published_at'     => ['nullable', 'date'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ];
    }
}
