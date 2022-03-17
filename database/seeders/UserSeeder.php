<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creating one admin to log in for testing
        $admin =
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'remember_token' => 'not set',
        ]);

        $admin->tasks()->create(
            ['task_name'=>'Admin task',
            'due_date'=>now()->modify('+1 day')
        ]);

        // creating one admin to log in for testing
        $user =
        User::create([
            'name' => 'user',
            'email' => 'user@test.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'remember_token' => 'not set',
        ]);
        $user->tasks()->create(
            ['task_name'=>'User task',
            'due_date'=>now()->modify('+1 day')
        ]);


        User::factory()
        ->count(20)
        ->has(Task::factory()->count(25))
        ->state(new Sequence(
            ['is_admin' => 1],
            ['is_admin' => 0],
        ))
        ->create();

    }
}
