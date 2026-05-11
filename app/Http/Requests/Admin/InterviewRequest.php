<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InterviewRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title'                   => ['required', 'string', 'max:255'],
            'slug'                    => ['nullable', 'string', 'max:255'],
            'author_id'               => ['nullable', 'exists:authors,id'],
            'interviewee_name'        => ['required', 'string', 'max:255'],
            'interviewee_designation' => ['nullable', 'string', 'max:255'],
            'excerpt'                 => ['nullable', 'string', 'max:500'],
            'content'                 => ['required', 'string'],
            'image'                   => ['nullable', 'image', 'max:2048'],
            'status'                  => ['required', 'in:draft,published,archived'],
            'is_featured'             => ['nullable', 'boolean'],
            'published_at'            => ['nullable', 'date'],
            'meta_title'              => ['nullable', 'string', 'max:255'],
            'meta_description'        => ['nullable', 'string', 'max:500'],
        ];
    }
}
