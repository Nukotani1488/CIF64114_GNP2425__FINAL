<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    function show(Request $request)
    {
        return view('statistics');
    }
}
