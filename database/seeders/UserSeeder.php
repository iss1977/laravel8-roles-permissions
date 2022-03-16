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
        $admin =
        User::create([
            'name' => 'ianika',
            'email' => 'ianika@ianika.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'remember_token' => 'not set'
        ]);

        $admin->tasks()->create(['task_name'=>'Admin task']);

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
