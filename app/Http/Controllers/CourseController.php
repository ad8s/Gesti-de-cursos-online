<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::with(['category', 'owner'])->withCount('students')->latest()->get();

        return view('courses.index', compact('courses'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('courses.create', compact('categories'));
    }

    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $course = Course::create($this->filledCourseData($request->validated(), $request->user()->id));

        return redirect()->route('courses.show', $course)->with('status', 'course-created');
    }

    public function show(Course $course): View
    {
        $course->load(['category', 'owner', 'students']);

        return view('courses.show', compact('course'));
    }

    public function edit(Course $course): View
    {
        Gate::authorize('is_owner', $course);

        $course->load(['category', 'owner']);
        $categories = Category::orderBy('name')->get();

        return view('courses.edit', compact('course', 'categories'));
    }

    public function update(UpdateCourseRequest $request, Course $course): RedirectResponse
    {
        $course->update($this->filledCourseData($request->validated(), $request->user()->id, $course));

        return redirect()->route('courses.show', $course)->with('status', 'course-updated');
    }

    public function destroy(Course $course): RedirectResponse
    {
        Gate::authorize('is_owner', $course);

        $course->delete();

        return redirect()->route('courses.index')->with('status', 'course-deleted');
    }

    private function filledCourseData(array $data, int $userId, ?Course $course = null): array
    {
        $slugSource = $data['slug'] ?? $data['title'];
        $data['slug'] = $this->uniqueSlug($slugSource, $course);
        $data['user_id'] = $course?->user_id ?? $userId;
        $data['is_published'] = array_key_exists('is_published', $data) ? (bool) $data['is_published'] : true;

        return $data;
    }

    private function uniqueSlug(string $value, ?Course $course = null): string
    {
        $slug = Str::slug($value) ?: 'course';
        $baseSlug = $slug;
        $index = 1;

        while (Course::query()->when($course, fn ($query) => $query->where('id', '!=', $course->getKey()))->where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$index;
            $index++;
        }

        return $slug;
    }
}
