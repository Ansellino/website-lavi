<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminAnsel'),
            'is_admin' => true,
        ]);

        User::factory(10)->create();
        //Post::factory(10)->create();
    }
}
