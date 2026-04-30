<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'description' => fake()->sentence(),
            'name' => fake()->unique()->word(),
            'slug' => Str::slug(fake()->unique()->words(2, true)),
            'user_id' => User::factory(),
        ];
    }
}
