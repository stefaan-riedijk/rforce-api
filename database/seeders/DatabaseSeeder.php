<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WorkoutExercise;
use App\Models\WorkoutSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::create([
           'name'=>'Stefaan Riedijk',
            'email'=>'stefaanriedijk@gmail.com',
            'password'=>'superuser'
        ]);
        User::create([
            'name'=>'Roberto Dias',
            'email'=>'robertorforce@gmail.com',
            'password'=>'#21hogeschool'
        ]);


    }
}
