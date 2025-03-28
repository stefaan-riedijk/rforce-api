<?php

use Livewire\Volt\Component;
use App\Models\WorkoutSession;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public $sort = '';
    public $workouts;
    public $deleteId;

    public function deleteWorkout($id)
    {
        $this->workouts->where('id', $id)->first()->delete();
        //        dd($workout);
        WorkoutSession::query()->where('id', $id)->delete();

        $this->render();
    }
    public function showView($id)
    {
        redirect()->route('workouts.show', [
            'id' => $id,
        ]);
    }

    public function render(): mixed
    {
        $workouts = WorkoutSession::query()
            ->where('user_id', Auth::user()->id)
            ->get();
        if ($this->sort !== '' && $this->sort !== null) {
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
        $this->deleteId = $id;
    }
}; ?>
<div>
    @php
        $sortOptions = [
            ['name' => 'Name - Ascending', 'id' => 'title ASC'],
            ['name' => 'Name - Descending', 'id' => 'title DESC'],
            ['name' => 'Date modified - Ascending', 'id' => 'created_at ASC'],
            ['name' => 'Date modified - Descending', 'id' => 'created_at DESC'],
        ];
    @endphp
    <div class="flex flex-row-reverse">
        <x-select class="ml-auto max-w-lg" option-value="id" option-label="name" wire:model.live="sort" label="Sort by:"
            :options="$sortOptions" />
    </div>
    <div class="grid:cols-1 my-4 grid gap-4 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($workouts as $workout)
            <x-card class="h-30 cursor-pointer border border-black bg-gray-300 shadow-lg"
                wire:click="showView({{ $workout->id }})">
                <x-slot name="title" class="!font-bold italic">
                    <a href="{{ route('workouts.show', ['uuid' => $workout->uuid]) }}" class="">
                        {{ $workout->title }}
                    </a>
                </x-slot>
                <x-slot name="action">
                    <x-wui-dropdown align="left" width="w-32" class="align-left w-32">
                        <x-wui-dropdown.item class="justify-middle" icon="pencil">Edit</x-wui-dropdown.item>
                        {{--                        <x-wui-dropdown.item seperator/> --}}
                        <x-wui-dropdown.item class="justify-middle text-red-600" icon="trash"
                            x-on:click="$openModal('deleteConfirmation')"
                            wire:click="modalOpened({{ $workout->id }})">Delete
                        </x-wui-dropdown.item>
                    </x-wui-dropdown>
                </x-slot>
                <x-slot name="slot" class="h-12 items-center overflow-hidden text-center !text-rose-500">
                    {{ $workout->description }}
                </x-slot>
                <x-slot name="footer" class="justify-between">
                    <div class="flex flex-row">
                        <p class="">Completion time: {{ $workout->estimated_duration }} mins.</p>
                        {{--                        <x-wui-button x-on:click="$openModal('deleteConfirmation')" --}}
                        {{--                                      wire:click="modalOpened({{$workout->id}})" class="ml-auto" --}}
                        {{--                                      icon="trash" zinc/> --}}
                    </div>
                </x-slot>
            </x-card>
        @endforeach
    </div>
    <x-modal name="deleteConfirmation">
        <x-card title="Do you want to delete this program?">
            <p>
                Are you sure you want to delete this workout plan?
            </p>
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <x-wui-button flat label="Cancel" x-on:click="close" />
                <x-wui-button primary label="Delete" x-on:click="close"
                    wire:click="deleteWorkout({{ $deleteId }})" />
            </x-slot>
        </x-card>
    </x-modal>
</div>
