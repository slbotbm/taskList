<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(50)->create()->each(function ($user) {
            $numTasks = random_int(5, 30);
            Task::factory()
            ->count($numTasks)
            ->for($user)->create();
        });
        
    }
}
