<?php

namespace Database\Seeders;

use App\Models\ese;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Posts;
use App\Models\applied;
use App\Models\employees;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        employees::factory(20)->create();
        ese::factory(8)->create();
        Posts::factory(6)->create();
        applied::factory(12)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
