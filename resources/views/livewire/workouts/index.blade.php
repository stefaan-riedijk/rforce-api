<?php

use Livewire\Volt\Component;
use App\Models\WorkoutSession;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public $sort = "";
    public $workouts;
    public $deleteId;

    public function deleteWorkout($id)
    {
        $this->workouts->where('id',$id)->first()->delete();
//        dd($workout);
        WorkoutSession::query()->where('id', $id)->delete();

        $this->render();
    }


    public function render(): mixed
    {
        $workouts = WorkoutSession::query()->where('user_id',Auth::user()->id)->get();
        if ($this->sort !== "" && $this->sort !== null) {
            $sortOptions = explode(' ', $this->sort);
            if ($sortOptions[1] == 'ASC') {
                $workouts = $workouts->sortBy($sortOptions[0]);
                $workouts = $workouts->values()->all();
            } else {
                $workouts = $workouts->sortByDesc($sortOptions[0]);
                $workouts = $workouts->values()->all();
            }

        }

        $this->workouts = collect($workouts);
        return view('livewire.workouts.index', [
            'workouts' => $workouts,
        ]);
    }

    public function modalOpened($id)
    {
        $this->deleteId=$id;
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
        <x-select class="ml-auto max-w-lg" option-value="id" option-label="name" wire:model.live="sort" label="Sort by:"
                  :options="$sortOptions"/>
    </div>
    <div class="grid lg:grid-cols-4 md:grid-cols-3 grid:cols-1 gap-4 my-4">

        @foreach($workouts as $workout)
            <x-card class="bg-gray-300 border border-black h-30 shadow-lg">
                <x-slot name="title" class="italic !font-bold">
                    <a href="{{ route('workouts.show',['id'=>$workout->id])  }}" class="">
                        {{$workout->title}}
                    </a>
                </x-slot>
                <x-slot name="slot" class="!text-rose-500 text-center h-12 items-center overflow-hidden">
                    {{$workout->description}}
                </x-slot>
                <x-slot name="footer" class=" justify-between">
                    <div class="flex flex-row">
                        <p class="">Completion time: {{$workout->estimated_duration}} mins.</p>
                        <x-wui-button x-on:click="$openModal('deleteConfirmation')" wire:click="modalOpened({{$workout->id}})" class="ml-auto"
                                      icon="trash" zinc/>
                    </div>
                </x-slot>
            </x-card>
        @endforeach
    </div>
        <x-modal name="deleteConfirmation">
            <x-card title="Consent Terms">
                <p>
                    Are you sure you want to delete this workout plan?
                </p>
                <x-slot name="footer" class="flex justify-end gap-x-4">
                    <x-wui-button flat label="Cancel" x-on:click="close"/>
                    <x-wui-button primary label="I Agree" x-on:click="close" wire:click="deleteWorkout({{$deleteId}})"/>
                </x-slot>
            </x-card>
        </x-modal>
</div>
