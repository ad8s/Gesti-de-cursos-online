<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        $course = $this->route('course');

        return $this->user() !== null && $course instanceof Course && $this->user()->isOwner($course);
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', Rule::exists('categories', 'id')],
            'description' => ['nullable', 'string'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
            'is_published' => ['boolean'],
            'level' => ['required', 'string', Rule::in(['beginner', 'intermediate', 'advanced'])],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('courses', 'slug')->ignore($this->route('course'))],
            'starts_at' => ['nullable', 'date'],
            'title' => ['required', 'string', 'max:255'],
        ];
    }
}
