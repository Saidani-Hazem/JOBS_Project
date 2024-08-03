<?php

namespace Database\Factories;

use App\Models\ese;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_name' => fake()->jobTitle(),
            'Type' => fake()->word(),
            'Price' => fake()->unique()->randomFloat(),
            'Description' => fake()->paragraph(),
            'ese_id'=> ese::get('id')->random(),
            'created_at'=>now()
        ];
    }
}
