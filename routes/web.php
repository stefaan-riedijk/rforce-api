<?php

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

Route::any('workouts', function () {
    return view('workouts.index');
})->middleware(['auth'])->name('workouts');

Route::view('workouts/create', 'workouts.create')->name('workouts.create');

Route::get('exercises/{id}', function ($id) {
    $exercise = WorkoutExercise::query()->where('id',$id)->first();
    return view('exercises.show',[
       'exercise' => $exercise,
    ]);
})->name('exercises.show');

require __DIR__ . '/auth.php';
