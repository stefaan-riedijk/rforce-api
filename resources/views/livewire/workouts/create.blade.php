<?php

use Livewire\Volt\Component;
use App\Models\WorkoutExercise;
use App\Models\WorkoutSession;
use Illuminate\Support\Facades\Auth;


new class extends Component {

    public $workoutTitle;
    public $workoutDescr;
    public $workoutEst;
    public $selectedExerciseId;
    public $exercises = [];

    protected $rules = [
        'workoutTitle' => 'required|min:6',
        'workoutEst' => 'required',
        'exercises' => 'array'
    ];

    public function updateNumSets($index, $value)
    {
        $this->exercises[$index]['numSets'] = $value;
    }

    public function updateNumReps($index, $value)
    {
            $this->exercises[$index]['numReps'] = (int)$value;
    }

    public function addExerciseItem()
    {
        if ($this->selectedExerciseId != null) {

            $exercise = WorkoutExercise::query()->where('id', $this->selectedExerciseId)->select(['id', 'name'])->first();
            $this->exercises[] = [
                'id' => $exercise->id,
                'name' => $exercise->name,
                'numSets' => 0,
                'numReps' => 0
            ];
            $this->selectedExerciseId = null;
        }

    }

    public function deleteExerciseItem($index)
    {
        unset($this->exercises[$index]);
        $this->exercises = array_values($this->exercises);
    }

    public function submit()
    {
        $this->validate();
        $exercises = $this->exercises;
        if (!empty($exercises)) {
            $program = WorkoutSession::create([
            'title'=>$this->workoutTitle,
            'description'=>$this->workoutDescr,
            'estimated_duration'=>$this->workoutEst,
                'user_id'=>Auth::user()->id
        ]);
            foreach($exercises as $index => $exercise) {
                $program->exercises()->attach($exercise['id'],['num_reps'=>$exercise['numReps'],'num_sets'=>$exercise['numSets']]);
            }
        }
        redirect()->route('workouts');
    }
}; ?>

<div class="h-full p-4">
    <form class="max-w-2xl mx-auto space-y-1">
        <x-input wire:model="workoutTitle" label="Workout Title" placeholder="Day 1 - Upper/Lower Split"/>
        <x-input wire:model="workoutDescr" type="text" class="min-w-30" placeholder="Provide additional information about the workout program."
                 label="Workout Description (Optional)"/>
        <x-input wire:model="workoutEst" type="number" label="Estimated duration (min)" suffix="minutes" positive/>
        <h4 class="text-sm mt-4">Exercises</h4>
        <div class="my-3 border rounded-lg border-black pb-3">
            <div class="flex flex-row mt-3 mb-4 mx-2 space-x-2">
                <x-select
                    label="Search for exercises"
                    placeholder="Select exercise"
                    :async-data="route('api.exercises.search')"
                    option-label="name"
                    option-value="id"
                    wire:model.defer="selectedExerciseId"
                    class="max-w-md"
                />
                <x-wui-button wire:click="addExerciseItem" icon="plus" label="Add another item"
                              class=" justify-end place-self-end min-w-max mb-3 self-end"/>
            </div>
            @foreach($exercises as $index => $exercise)
                <div class="flex flex-row pb-2 mb-2 mx-2 space-x-2 justify-between items-center">
                    <div class="flex items-center overflow-hidden w-48">
                        <image class="w-10 h-10 mr-3"
                               src="https://res.cloudinary.com/drsvmmwgj/image/upload/v1716072414/workout-images/imgs/image_{{$exercise['id']-1}}"/>
                        <p class="ml-3 text-nowrap whitespace-nowrap font-semibold align-text-bottom">{{ucfirst($exercise['name'])   }}</p>
                    </div>
                    <div>
                        <x-label class="mx-auto">Sets</x-label>
                        <div x-data="{ count: 0, index: '{{ $index }}' }"
                             x-init="$watch('count', value => $wire.updateNumSets(index,value))"
                             class="flex items-center gap-x-3">
                            <x-wui-button x-on:click="count > 0 ? count-- : null" icon="minus"/>
                            <span class="bg-teal-600 text-black px-5 py-1.5" x-text="count"></span>
                            <x-wui-button x-on:click="count++" icon="plus"/>
                        </div>
                    </div>
                    <div class="ml-auto" x-data="{ amount: 0, index: '{{ $index }}'}">

                    <x-input
                            x-model="amount"
                            @input="amount = $event.target.value"
                            x-init="$watch('amount', value => $wire.updateNumReps(index,amount))"
                             type="number"
                             class="w-6" label="Reps per set" number/>
                    </div>
                    <x-wui-button.circle lg rounded wire:click="deleteExerciseItem({{ $index }})" icon="trash"
                                         class="min-w-max self-end ml-auto"/>
                </div>
            @endforeach

        </div>
        <x-wui-button wire:click="submit" light yellow class="p-2 mb-3" rounded="2xl" right-icon="upload" lg label="Submit"/>
        <x-errors/>
    </form>
</div>
