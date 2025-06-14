<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;

class AuthenticationController extends Controller
{
    function login(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
        $credentials = [
            'name' => $validated['name'],
            'password' => $validated['password'],
        ];
        $successResponse = response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'redirect' => route('dashboard.index'),
        ]);
        if (Auth::attempt($credentials)) {
            return $successResponse;
        } else if (Auth::attempt(['email' => $validated['name'], 'password' => $validated['password']])) {
            return $successResponse;
        } else if (Auth::attempt(['name' => $validated['name'], 'password' => $validated['password']])) {
            return $successResponse;
        } else {
            return redirect()->back()->withErrors([
                'name' => 'Invalid credentials',
            ]);
        }
    }

    function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
        } else {
            return redirect()->back()->withErrors([
                'name' => 'You are not logged in',
            ]);
        }
    }

    function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|alpha_dash|max:255|unique:users,name|min:3',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|alpha_dash|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'redirect' => route('login'),
        ]);
    }

    function showLogin(Request $request)
    {
        return view('login');
    }

    function showRegister(Request $request)
    {
        return view('register');
    }
}
