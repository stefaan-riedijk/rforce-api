<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Models\WorkoutExercise;
class ExerciseTable extends Component
{
    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->reset();
    }
    public function render()
    {
        $exercises = WorkoutExercise::search($this->search)->paginate(20);
        return view('livewire.exercises.exercise-table',[
            'exercises' => $exercises
        ]);
    }
}
