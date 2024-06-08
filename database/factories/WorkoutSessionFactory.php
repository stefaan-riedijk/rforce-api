<?php

namespace Database\Factories;

use App\Models\WorkoutSession;
use App\Models\WorkoutExercise;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkoutSession>
 */
class WorkoutSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => fake()->words(3,true),
            'description' => fake()->paragraph,
            'estimated_duration'=>fake()->numberBetween(15,120),
            'user_id' => fake()->numberBetween(1,5)
        ];
    }

    public function configure() {

        return $this->afterCreating(function (WorkoutSession $workoutSession) {
                $exercises = [234,467,1250];

                $workoutSession->exercises()->syncWithPivotValues($exercises, [
                    // Additional pivot attributes, if any
                    'num_sets'=>fake()->numberBetween(1,10),
                    'num_reps'=>fake()->numberBetween(1,20),
                ]);

        });
    }
}
