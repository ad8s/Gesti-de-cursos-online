<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    public function enroll(Request $request, Course $course): RedirectResponse
    {
        $request->user()->courses()->syncWithoutDetaching([
            $course->id => ['enrolled_at' => now()],
        ]);

        return back()->with('status', 'course-enrolled');
    }

    public function unenroll(Request $request, Course $course): RedirectResponse
    {
        $request->user()->courses()->detach($course->id);

        return back()->with('status', 'course-unenrolled');
    }

    public function myCourses(Request $request): View
    {
        $courses = $request->user()->courses()->with(['category', 'owner'])->latest()->get();

        return view('enrollments.my-courses', compact('courses'));
    }
}
