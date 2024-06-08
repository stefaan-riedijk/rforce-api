<?php

use Livewire\Volt\Component;

new class extends Component {
    public $workouts;


}; ?>

<div class="grid grid-cols-3 gap-4 my-4">
    @foreach($workouts as $workout)
        <a href="{{ route('workouts.show',['id'=>$workout->id])  }}">
            <x-card class="col-span-1 max-w-16 border shadow">
                <x-slot name="title" class="italic !font-bold">
                    {{$workout->title}}
                </x-slot>
                <x-slot name="slot" class="!text-rose-500">
                    {{$workout->description}}
                </x-slot>
                <x-slot name="footer" class="flex items-center justify-between">
                    <p>Completion time: {{$workout->estimated_duration}}</p>
                    <x-wui-button label="Save" primary/>
                </x-slot>
            </x-card>
        </a>
    @endforeach
</div>
