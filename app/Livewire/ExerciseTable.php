<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\WorkoutExercise;
class ExerciseTable extends Component
{
    public function render()
    {
        $exercises = WorkoutExercise::paginate(20);
        return view('livewire.exercises.exercise-table',[
            'exercises' => $exercises
        ]);
    }
}
