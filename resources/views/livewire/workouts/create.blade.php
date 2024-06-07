<?php

use Livewire\Volt\Component;
use App\Models\WorkoutExercise;


new class extends Component {

    public $selectedExerciseId;
    public $exercises = [];

    public function updatedExercises($value)
    {
        dd($value);
    }

//    public function itemSelected()
//    {
//        info('hendrik');
//        dump($this->selectedExercise);
//    }

    public function addExerciseItem()
    {
        if ($this->selectedExerciseId != null) {

            $exercise = WorkoutExercise::query()->where('id', $this->selectedExerciseId)->select(['id','name'])->first();
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

}; ?>

<div class="h-full">
    {{ info('Hendrik') }}
    <form class="max-w-2xl mx-auto">
        <x-input label="Workout Title" placeholder="Day 1 - Upper/Lower Split"/>
        <x-input type="text" class="min-w-30" placeholder="Provide additional information about the workout program."
                 label="Workout Description (Optional)"/>
        <x-input type="number" label="Estimated duration (min)" suffix="minutes" positive/>
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
            @foreach($exercises as $exercise)
                <div class="flex flex-row pb-2 mb-2 mx-2 space-x-2 justify-between items-center">
                    <div class="flex items-center overflow-hidden w-48">
                        <image class="w-10 h-10 mr-3"
                               src="https://res.cloudinary.com/drsvmmwgj/image/upload/v1716072414/workout-images/imgs/image_{{$exercise['id']-1}}"/>
                        <p class="ml-3 text-nowrap whitespace-nowrap font-semibold align-text-bottom">{{ucfirst($exercise['name'])   }}</p>
                    </div>
                    {{--                    <x-inputs.number md label="Sets" class="max-w-12"/>--}}
                    <div>
                        <x-label class="mx-auto">Sets</x-label>
                    <div x-data="{ count: 0 }" class="flex items-center gap-x-3">
                        <x-wui-button x-hold.click.repeat.200ms="count > 0 ? count-- : null" icon="minus"/>

                        <span class="bg-teal-600 text-black px-5 py-1.5" x-text="count"></span>

                        <x-wui-button x-hold.click.repeat.200ms="count++" icon="plus"/>
                    </div>
                    </div>

                        <x-input type="number" class="w-6 ml-auto" label="Reps per set"/>
                        <x-wui-button.circle lg rounded wire:click="deleteExerciseItem({{ $loop->index }})" icon="trash"
                                             class="min-w-max self-end ml-auto"/>
                </div>
            @endforeach

        </div>
        <x-wui-button light yellow class="p-2" rounded="2xl" right-icon="upload" lg label="Submit"/>
    </form>
    <div>Hallo</div>
</div>
