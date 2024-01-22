<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'user1',
            'email' => 'u1@gmail.com',
            'password' => bcrypt('user1'),
            'role' => 'user',
        ]); 
        User::create([
            'name' => 'admin1',
            'email' => 'a1@gmail.com',
            'password' => bcrypt('admin1'),
            'role' => 'admin',
        ]); 

        Hotel::create([

        ]);
    }
}
