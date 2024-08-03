<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employees>
 */
class EmployeesFactory extends Factory
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
            'FullName' => fake()->name($gender = null|'male'|'female'),
            'Email'=>fake()->safeEmail(),
            'JobTitle'=>fake()->jobTitle(),
            'Phone' => fake()->e164PhoneNumber(),
            'Country' => fake()->country(),
            'pic' => fake()->imageUrl(450, 450, 'avatar', true),
            'password' => static::$password ??= Hash::make('password'),
            'Description' => fake()->paragraph(),
            'Hash_One'=>fake()->word(),
            'Hash_Tow'=>fake()->word(),
            'Hash_Three'=>fake()->word(),
            'created_at'=>now()
        ];
    }
}
