<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Userを10件作成し、Userをeachで繰り返す
        \App\Models\User::factory(2)->create()->each(function ($user) {
            // Eventの作成時にuser_idに作成したユーザーIDを渡す
            \App\Models\Event::factory(5)
                ->create(['user_id' => $user->id]);
        });
    }
}
