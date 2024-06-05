<?php

use Livewire\Volt\Component;

new class extends Component {
    public $selectedExercise;

    public $exercises = [];


}; ?>

<div class="h-full">
    <form class="max-w-2xl mx-auto">
        <x-input label="Workout Title" placeholder="Day 1 - Upper/Lower Split"/>
        <x-textarea placeholder="Provide additional information about the workout program." label="Workout Description (Optional)"/>
        <x-input label="Estimated duration"/>
        <h4 class="text-sm mt-4">Exercises</h4>
        <div class="my-3 border rounded-lg border-black">
            <div class="flex flex-row mb-4 mx-2 space-x-2">

                <x-select
                    label="Search for exercises"
                    placeholder="Select exercise"
                    :async-data="route('api.exercises.search')"
                    option-label="name"
                    option-value="id"
                    wire:model.defer="selectedExercise"
                    class="max-w-md"
                />
                <x-inputs.number label="Sets" class="max-w-xs"/>
                <x-input type="number" label="Reps per set"/>
                <x-wui-button.circle lg rounded icon="trash" class="min-w-max self-end" />
            </div>
            <x-wui-button icon="plus" label="Add another item" class="mx-auto min-w-max mb-3"/>
        </div>
    </form>
    <div>Hallo</div>
</div>
