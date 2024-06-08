<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Models\WorkoutExercise;
class ExerciseTable extends Component
{
    use WithPagination;

    // Search query
    public $search = '';

    // Select parameters
    public $target = '';
    public $bodyPart = '';
    public $equipment = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = WorkoutExercise::query();

        if (is_string($this->target) && $this->target !== '') {
                $query->where('target', $this->target);
            }

        if (is_string($this->equipment) && $this->equipment !== '') {
            $query->where('equipment', $this->equipment);
        }

        if (is_string($this->bodyPart) && $this->bodyPart !== '') {
            $query->where('body_part', $this->bodyPart);
        }

        $exercises = $query->search($this->search)->paginate(20);
        return view('livewire.exercises.exercise-table',[
            'exercises' => $exercises,
        ]);
    }

    public function submit() {

    }
}
