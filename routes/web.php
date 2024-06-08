<?php

use App\Models\WorkoutSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Models\WorkoutExercise;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::any('exercises', function () {
    return view('exercises.index');
})->middleware(['auth'])->name('exercises');

Route::get('workouts', function () {
    $myWorkouts = WorkoutSession::query()->where('user_id',Auth::user()->id)->get();

    return view('workouts.index',[
        'myWorkouts'=>$myWorkouts
    ]);
})->middleware(['auth'])->name('workouts');

Route::get('workouts/{id}', function ($id) {
    $program = WorkoutSession::query()->where('id',$id)->first();
    if ($program != null ) {
    return view('workouts.show',[
        'program' => $program
    ]);
    }
})->name('workouts.show');

Route::view('workouts/create', 'workouts.create')->name('workouts.create');

Route::get('exercises/{id}', function ($id) {
    $exercise = WorkoutExercise::query()->where('id',$id)->first();
    return view('exercises.show',[
       'exercise' => $exercise,
    ]);
})->name('exercises.show');

require __DIR__ . '/auth.php';
