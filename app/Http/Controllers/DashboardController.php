<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function __invoke()
    {

        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Workouts Completed')
            ->addColumn('Created Workouts', \Illuminate\Support\Facades\Auth::user()->workouts()->count(), '#f6ad55')
            ->addColumn('Favorited Workouts', Auth::user()->favorites()->count(), '#fc8181');


        return view('app.dashboard', [
            'columnChartModel' => $columnChartModel
        ]);
    }
}
