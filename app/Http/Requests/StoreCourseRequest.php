<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', Rule::exists('categories', 'id')],
            'description' => ['nullable', 'string'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
            'is_published' => ['boolean'],
            'level' => ['required', 'string', Rule::in(['beginner', 'intermediate', 'advanced'])],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('courses', 'slug')],
            'starts_at' => ['nullable', 'date'],
            'title' => ['required', 'string', 'max:255'],
        ];
    }
}
