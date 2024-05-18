<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutExercise;
class WorkoutExerciseController extends Controller
{
    public function show (Request $request) {
        $exercise = WorkoutExercise::where('id', $request->id)->first();
        return response()->json(compact('exercise'));
    }
}
