<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public \App\Models\WorkoutSession $workout;
    public $isFavorited;

    public function addFavorite()
    {
        if($this->isFavorited==false) {
            Auth::user()->favorites()->attach($this->workout->id);
        } else {
            Auth::user()->favorites()->detach($this->workout->id);
        }
    }

    public function render(): mixed
    {
        $this->isFavorited = Auth::user()->favorites()->where('workout_session_id', $this->workout->id)->exists();
        return view('livewire.workouts.show.addfavorite',[
            'workout'=>$this->workout
        ]);
    }
}; ?>

<div>
    @if($isFavorited==true)
        <x-wui-button flat red rounded wire:click="addFavorite"><x-icon name="heart" class="w-5 h-5" solid /></x-wui-button>
    @else
        <x-wui-button flat zinc rounded icon="heart" wire:click="addFavorite"/>
    @endif
</div>
