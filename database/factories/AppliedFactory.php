<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\employees;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\applied>
 */
class AppliedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'emp_id'=>employees::get('id')->random(),
           'job_id'=>Posts::get('id')->random(),
           'created_at'=>now()
        ];
    }
}
