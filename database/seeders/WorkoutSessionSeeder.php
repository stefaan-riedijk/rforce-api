<?php

namespace Database\Seeders;

use App\Models\WorkoutExercise;
use App\Models\WorkoutSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkoutSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exercises = WorkoutExercise::query()->inRandomOrder()->take(3)->get();
        $exercises = $exercises->toArray();

        WorkoutSession::factory()->count(4)->create();

//        hasAttached($exercises,['num_sets'=>fake()->numberBetween(1,12),'num_reps'=>fake()->numberBetween(2,20)])
    }
}
