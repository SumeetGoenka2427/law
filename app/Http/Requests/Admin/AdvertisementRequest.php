<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title'     => ['required', 'string', 'max:255'],
            'position'  => ['required', 'string', 'max:100'],
            'image'     => ['nullable', 'image', 'max:2048'],
            'url'       => ['nullable', 'url', 'max:500'],
            'code'      => ['nullable', 'string'],
            'size'      => ['nullable', 'string', 'max:50'],
            'is_active' => ['nullable', 'boolean'],
            'starts_at' => ['nullable', 'date'],
            'ends_at'   => ['nullable', 'date', 'after_or_equal:starts_at'],
        ];
    }
}
