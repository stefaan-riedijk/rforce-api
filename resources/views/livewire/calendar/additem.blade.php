<?php

use Livewire\Volt\Component;
use App\Models\CalendarItem;
use App\Models\WorkoutSession;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; // Added use statement for Auth

new class extends Component {
    public $workoutPlanId;
    public $dateTime;

    public function createItem()
    {
        $workoutPlan = WorkoutSession::query()
            ->where('id', $this->workoutPlanId)
            ->first();
        $this->validate([
            'workoutPlanId' => 'required',
            'dateTime' => 'required',
        ]);
        CalendarItem::create([
            'user_id' => Auth::user()->id,
            'workout_session_id' => $workoutPlan->id,
            'title' => $workoutPlan->title,
            'description' => $workoutPlan->description,
            'scheduled_at' => $this->dateTime,
        ]);
        $this->dispatch('closeModal', modalName: 'addEvent'); // Uncommented dispatch line
        redirect()->route('calendar');
    }
}; ?>


<div class="ml-auto">
    <x-wui-button x-on:click="$openModal('addEvent')" class="m-4 ml-auto" right-icon="plus">Add new workout sessions
    </x-wui-button>
    <x-modal name="addEvent">
        <x-card title="Schedule a new workout session">
            <form>

                <div class="mx-auto max-w-xl space-y-2">

                    <p class="mb-6">
                        Look for a workout plan and add it to your schedule.
                    </p>
                    <x-select label="Search for a workout" placeholder="Pick your workout plan" :async-data="route('api.workouts.search')"
                        option-label="title" option-value="id" wire:model="workoutPlanId" />
                    <x-datetime-picker wire:model="dateTime" />
                </div>
                <x-slot name="footer" class="flex justify-end gap-x-4">
                    <x-wui-button flat label="Cancel" x-on:click="close" />
                    <x-wui-button primary label="I Agree" wire:click="createItem" />
                </x-slot>
                <x-errors />
            </form>
        </x-card>
    </x-modal>
</div>
