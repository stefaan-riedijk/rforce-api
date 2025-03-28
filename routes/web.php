<?php

use App\Models\WorkoutSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Models\WorkoutExercise;
use App\Http\Controllers\ArticleController;


// UNAUTHENTICATED ROUTES
Route::view('/', 'index')->name('home');
Route::view('/about/trainer','marketing.trainer')->name('trainer');
Route::view('/about/methodology','marketing.methodology')->name('methodology');
Route::view('pricing','marketing.pricing')->name('pricing');

// BREEZE DEFAULT ROUTES
Route::get('/dashboard',\App\Http\Controllers\DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// WORKOUT EXERCISES ROUTES
Route::get('exercises', function () {
    return view('app.exercises.index');
})->middleware(['auth'])->name('exercises');
Route::get('exercises/{id}', function ($id) {
    $exercise = WorkoutExercise::query()->where('id',$id)->first();
    return view('app.exercises.show',[
        'exercise' => $exercise,
    ]);
})->name('exercises.show');

// WORKOUT SESSION ROUTES
Route::get('workouts', function () {
    $myWorkouts = WorkoutSession::query()->where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
    $favWorkouts = Auth::user()->favorites()->get();
    return view('app.workouts.index',[
        'myWorkouts'=>$myWorkouts,
        'favWorkouts'=>$favWorkouts
    ]);
})->middleware(['auth'])->name('workouts');
Route::view('workouts/create', 'app.workouts.create')->middleware(['auth'])->name('workouts.create');
// ///// Show workout plan route without auth middleware
Route::get('workouts/{uuid}', function ($uuid) {
    $workoutSession = WorkoutSession::with(['user','exercises'])->where('uuid',$uuid)->firstOrFail();
    return view('app.workouts.show',[
        'program' => $workoutSession,
        'exercises' => $workoutSession->exercises
    ]);
})->name('workouts.show');

//CALENDAR ROUTES
Route::view('/calendar','app.calendar.index')->name('calendar');
Route::view('/calendar/newItem','app.calendar.newitem')->name('calendar.newitem');

require __DIR__ . '/auth.php';
