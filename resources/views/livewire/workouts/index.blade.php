<?php

use Livewire\Volt\Component;
use App\Models\WorkoutSession;
use Illuminate\Support\Collection;

new class extends Component {
    public $sort = "";
    public $workouts;

    public function render(): mixed
    {
        if($this->sort !== "" && $this->sort !== null) {
        $sortOptions=explode(' ',$this->sort);
        if ($sortOptions[1]=='ASC') {
        $workouts=$this->workouts->sortBy($sortOptions[0]);
        $workouts=$workouts->values()->all();
        } else {
            $workouts=$this->workouts->sortByDesc($sortOptions[0]);
            $workouts=$workouts->values()->all();
        }

        } else {
            $workouts = $this->workouts;
        }
        $this->workouts=collect($workouts);
        return view('livewire.workouts.index', [
            'workouts'=>$workouts,
        ]);
    }
}; ?>
<div>
    @php
        $sortOptions = [
            ['name' => "Name - Ascending",'id'=>'title ASC'],
            ['name'=>"Name - Descending",'id'=>'title DESC'],
            ['name'=>"Date modified - Ascending",'id'=>'created_at ASC'],
            ['name'=>"Date modified - Descending", 'id'=>'created_at DESC']
        ];
 @endphp
    <div class="flex flex-row-reverse">
        <x-select class="ml-auto max-w-lg" option-value="id" option-label="name" wire:model.live="sort" label="Sort by:" :options="$sortOptions"/>
    </div>
    <div class="grid lg:grid-cols-4 md:grid-cols-3 grid:cols-1 gap-4 my-4">

        @foreach($workouts as $workout)
            <a href="{{ route('workouts.show',['id'=>$workout->id])  }}" class="">
                <x-card class="bg-blue-300 border-2 border-black h-30 shadow-lg">
                    <x-slot name="title" class="italic !font-bold">
                        {{$workout->title}}
                    </x-slot>
                    <x-slot name="slot" class="!text-rose-500 text-center h-12 items-center overflow-hidden">
                        {{$workout->description}}
                    </x-slot>
                    <x-slot name="footer" class="flex flex-row justify-between">
                        <p class="ml-auto">Completion time: {{$workout->estimated_duration}}</p>
                        <x-wui-button label="Save" zinc/>
                    </x-slot>
                </x-card>
            </a>
        @endforeach
    </div>
</div>
