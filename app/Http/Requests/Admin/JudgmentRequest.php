<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JudgmentRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255'],
            'category_id'      => ['nullable', 'exists:categories,id'],
            'case_number'      => ['nullable', 'string', 'max:255'],
            'court'            => ['required', 'string', 'max:255'],
            'bench'            => ['nullable', 'string', 'max:255'],
            'excerpt'          => ['nullable', 'string', 'max:500'],
            'content'          => ['required', 'string'],
            'pdf_file'         => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
            'decided_at'       => ['nullable', 'date'],
            'status'           => ['required', 'in:draft,published,archived'],
            'is_featured'      => ['nullable', 'boolean'],
            'published_at'     => ['nullable', 'date'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ];
    }
}
