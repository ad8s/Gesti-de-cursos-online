<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, 'index'])->name('home');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->whereNumber('course')->name('courses.show');

Route::get('/dashboard', function (Request $request) {
    return view('dashboard', [
        'categoriesCount' => Category::count(),
        'coursesCount' => Course::count(),
        'enrolledCoursesCount' => $request->user()?->courses()->count() ?? 0,
        'usersCount' => User::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->whereNumber('course')->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->whereNumber('course')->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->whereNumber('course')->name('courses.destroy');

    Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->whereNumber('course')->name('courses.enroll');
    Route::delete('/courses/{course}/enroll', [EnrollmentController::class, 'unenroll'])->whereNumber('course')->name('courses.unenroll');
    Route::get('/my-courses', [EnrollmentController::class, 'myCourses'])->name('my-courses');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'can:is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
