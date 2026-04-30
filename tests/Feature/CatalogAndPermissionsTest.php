<?php

use App\Models\Category;
use App\Models\Course;
use App\Models\User;

test('guests can view the course catalog and details', function () {
    $course = Course::factory()->create(['title' => 'Laravel Basics']);

    $this->get(route('courses.index'))
        ->assertOk()
        ->assertSee('Laravel Basics');

    $this->get(route('courses.show', $course))
        ->assertOk()
        ->assertSee('Laravel Basics');
});

test('authenticated users can create and enroll in courses', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $courseData = [
        'category_id' => $category->id,
        'description' => 'A practical course about building applications.',
        'ends_at' => now()->addWeeks(4)->format('Y-m-d H:i:s'),
        'is_published' => true,
        'level' => 'beginner',
        'slug' => 'practical-laravel',
        'starts_at' => now()->addWeek()->format('Y-m-d H:i:s'),
        'title' => 'Practical Laravel',
    ];

    $this->actingAs($user)
        ->post(route('courses.store'), $courseData)
        ->assertRedirect();

    $course = Course::where('slug', 'practical-laravel')->firstOrFail();

    $this->actingAs($user)
        ->post(route('courses.enroll', $course))
        ->assertRedirect();

    expect($user->fresh()->courses)->toHaveCount(1);
});

test('owners can edit their own courses', function () {
    $owner = User::factory()->create();
    $course = Course::factory()->for($owner, 'owner')->create();

    $this->actingAs($owner)
        ->put(route('courses.update', $course), [
            'category_id' => $course->category_id,
            'description' => 'Updated description',
            'ends_at' => now()->addWeeks(8)->format('Y-m-d H:i:s'),
            'is_published' => true,
            'level' => 'intermediate',
            'slug' => 'updated-course-slug',
            'starts_at' => now()->addDays(2)->format('Y-m-d H:i:s'),
            'title' => 'Updated Course',
        ])
        ->assertRedirect(route('courses.show', $course));

    $course->refresh();

    expect($course->title)->toBe('Updated Course');
});

test('non admins cannot access admin resources', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.categories.index'))
        ->assertForbidden();
});

test('admins can access admin resources', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('admin.categories.index'))
        ->assertOk();
});
