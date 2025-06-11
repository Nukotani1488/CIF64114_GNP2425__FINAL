<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    function getTodayConsumption(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Today\'s consumption data retrieved successfully',
            'data' => [
                'sugar' => $request->user()->getSugarConsumptionToday()
            ],
        ]);
    }

    function show(Request $request)
    {
        return view('statistics', [
            'user' => $request->user(),
        ]);
    }
}
