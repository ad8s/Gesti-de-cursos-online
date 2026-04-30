<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'description' => fake()->paragraph(),
            'ends_at' => now()->addWeeks(fake()->numberBetween(2, 16)),
            'is_published' => true,
            'level' => fake()->randomElement(['beginner', 'intermediate', 'advanced']),
            'slug' => Str::slug(fake()->unique()->words(3, true)),
            'starts_at' => now()->addDays(fake()->numberBetween(1, 30)),
            'title' => fake()->sentence(3),
            'user_id' => User::factory(),
        ];
    }
}
