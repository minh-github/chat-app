<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User 1',
            'email' => 'user1@user.com',
            'password' => bcrypt('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'user2@user.com',
            'password' => bcrypt('password')
        ]);
    }
}
