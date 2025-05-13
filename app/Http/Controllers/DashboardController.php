<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\UserDataController;
use App\Models\Food;

class DashboardController extends Controller
{
    function show(Request $request)
    {
        if (!UserDataController::isRegistered(Auth::user())) {
            return redirect()->route('userdata.fill.get');
        }
        return view('dashboard', [
            'user' => $request->user(),
            'food_list' => Food::all(),
        ]);
    }
}
