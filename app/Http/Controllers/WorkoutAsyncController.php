<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSession;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class WorkoutAsyncController extends Controller
{
    public function __invoke(Request $request) : Collection
    {
        return WorkoutSession::query()
            ->select('id', 'title')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('title', 'like', "%{$request->search}%")
//                    ->orWhere('target', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn(Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn(Builder $query) => $query->limit(10)
            )
            ->orderBy('title')
            ->get()
            ->map(function (WorkoutSession $workoutSession) {
                return $workoutSession;
            });
    }
}
