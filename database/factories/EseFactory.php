<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ese>
 */
class EseFactory extends Factory
{

    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Name' => fake()->company(),
            'Phone' => fake()->e164PhoneNumber(),
            'Place' => fake()->country(),
            'Email' => fake()->safeEmail(),
            'logo' => fake()->imageUrl(450, 450, 'logo', true),
            'Domaine' => fake()->bs(),
            'passwrod' => static::$password ??= Hash::make('password')
        ];
    }
}
