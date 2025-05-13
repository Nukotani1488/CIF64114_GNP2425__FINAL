<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use \App\Models\UserData;
use \App\Models\User;

class UserDataController extends Controller
{
    static function isRegistered(User $user)
    {
        if ($user->userData) {
            return $user->userData->registered;
        }
        return false;
    }

    static function createBlank(User $user)
    {
        $userData = new UserData();
        $userData->uid = $user->id;

        $userData->save();

        return $userData;
    }

    function fill_data(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->withErrors([
                'name' => 'You are not logged in',
            ]);
        }
        $validated = $request->validate([
            'full_name' => 'required|string|max:255|min:3',
            'height' => 'required|numeric|min:0|max:300',
            'weight' => 'required|numeric|min:0|max:300',
            'sex' => 'required|alpha',
            'birth_date' => 'required|date',
            'plan' => 'required|string|max:255',
        ]);

        $userData = null;

        if ($request->user()->userData) {
            $userData = $request->user()->userData;
        } else {
            $userData = self::createBlank($request->user());
        }

        $userData->full_name = $validated['full_name'];
        $userData->weight = $validated['weight'];
        $userData->height = $validated['height'];
        $userData->birth_date = $validated['birth_date'];
        $userData->plan = $validated['plan'];

        $userData->sex = $validated['sex']==='male' ? true : false;

        if ($userData->save()) {
            $userData->registered = true;
            $userData->save();
        } else {
            return redirect()->back()->withErrors([
                'name' => 'Failed to save user data',
            ]);
        }
        return redirect()->route('dashboard.index')->with('success', 'User data saved successfully');
    }

    function showFillData(Request $request)
    {
        if (self::isRegistered($request->user())) {
            return redirect()->route('dashboard.index');
        } else {
            return view('fill_data');
        }
    }
}
