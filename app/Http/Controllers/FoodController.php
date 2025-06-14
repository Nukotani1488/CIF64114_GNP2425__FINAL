<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Food;

class FoodController extends Controller
{
    function search(Request $request) {
        $validated = $request->validate([
            "name" => "required|regex:/^[a-zA-Z0-9 ]+$/",
        ]);

        $name = $validated["name"];

        $items = Food::select('id', 'name')
                    ->where('name', 'like', '%'.$name.'%')
                    ->get();

        return response()->json([
            "items" => $items->toJson(),
        ]);
    }
}
