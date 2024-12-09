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
            ->setTitle('Expenses by Type')
            ->addColumn('Workouts Created', \Illuminate\Support\Facades\Auth::user()->workouts()->count(), '#f6ad55')
            ->addColumn('Workouts Favorited', Auth::user()->favorites()->count(), '#fc8181');


        return view('app.dashboard', [
            'columnChartModel' => $columnChartModel
        ]);
    }
}
