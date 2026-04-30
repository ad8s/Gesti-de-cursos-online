<?php

use App\Models\Category;
use App\Models\User;

test('admins can create categories', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->post(route('admin.categories.store'), [
            'description' => 'Courses about backend development.',
            'name' => 'Backend',
            'slug' => 'backend',
        ])
        ->assertRedirect(route('admin.categories.index'));

    $this->assertDatabaseHas('categories', [
        'name' => 'Backend',
        'slug' => 'backend',
    ]);
});

test('admins can create users', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->post(route('admin.users.store'), [
            'email' => 'student@example.com',
            'is_admin' => false,
            'name' => 'Student',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])
        ->assertRedirect(route('admin.users.index'));

    $this->assertDatabaseHas('users', [
        'email' => 'student@example.com',
        'name' => 'Student',
    ]);
});

test('admins can update categories and users', function () {
    $admin = User::factory()->admin()->create();
    $category = Category::factory()->create();
    $user = User::factory()->create();

    $this->actingAs($admin)
        ->put(route('admin.categories.update', $category), [
            'description' => 'Updated category description',
            'name' => 'Updated Category',
            'slug' => 'updated-category',
        ])
        ->assertRedirect(route('admin.categories.index'));

    $this->actingAs($admin)
        ->put(route('admin.users.update', $user), [
            'email' => 'updated@example.com',
            'is_admin' => true,
            'name' => 'Updated User',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])
        ->assertRedirect(route('admin.users.index'));

    expect($category->refresh()->name)->toBe('Updated Category');
    expect($user->refresh()->is_admin)->toBeTrue();
});
