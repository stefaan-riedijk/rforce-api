<?php

use App\Models\WorkoutSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Models\WorkoutExercise;
use App\Http\Controllers\ArticleController;


// UNAUTHENTICATED ROUTES
Route::view('/', 'welcome');
Route::get('/blog',[ArticleController::class,'index'])->name('blog');
Route::get('/blog/{id}', [ArticleController::class,'show'])->name('blog.article');


// BREEZE DEFAULT ROUTES
Route::get('/dashboard',\App\Http\Controllers\DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// WORKOUT EXERCISES ROUTES
Route::get('exercises', function () {
    return view('exercises.index');
})->middleware(['auth'])->name('exercises');
Route::get('exercises/{id}', function ($id) {
    $exercise = WorkoutExercise::query()->where('id',$id)->first();
    return view('exercises.show',[
        'exercise' => $exercise,
    ]);
})->name('exercises.show');

// WORKOUT SESSION ROUTES
Route::get('workouts', function () {
    $myWorkouts = WorkoutSession::query()->where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
    $favWorkouts = Auth::user()->favorites()->get();
    return view('workouts.index',[
        'myWorkouts'=>$myWorkouts,
        'favWorkouts'=>$favWorkouts
    ]);
})->middleware(['auth'])->name('workouts');
Route::view('workouts/create', 'workouts.create')->middleware(['auth'])->name('workouts.create');
// ///// Show workout plan route without auth middleware
Route::get('workouts/{id}', function ($id) {
    $program = WorkoutSession::query()->where('id',$id)->with('user')->first();
    $exercises = $program->exercises->all();
    if ($program != null ) {
    return view('workouts.show',[
        'program' => $program,
        'exercises' => $exercises
    ]);
    }
})->name('workouts.show');

//CALENDAR ROUTES
Route::view('/calendar','calendar.index')->name('calendar');
Route::view('/calendar/newItem','calendar.newitem')->name('calendar.newitem');

require __DIR__ . '/auth.php';
