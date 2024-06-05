<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WorkoutExercise;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ExerciseAsyncController extends Controller
{
    public function __invoke(Request $request): Collection
    {
        return WorkoutExercise::query()
            ->select('id', 'name')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('name', 'like', "%{$request->search}%")
//                    ->orWhere('target', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn(Builder $query) => $query->limit(10)
            )
            ->orderBy('name')
            ->get()
            ->map(function (WorkoutExercise $exercise) {
                return $exercise;
            });
    }
}
