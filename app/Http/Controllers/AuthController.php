<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\CreateUserRequest;

class AuthController extends Controller
{
    public function store(CreateUserRequest $request)
    {
        $uuid = Str::uuid();
        $request->merge([
            'id' => $uuid,
            'password' => Hash::make($request->password)
        ]);
        User::create($request->toArray());
        return redirect()->back()->with('success', 'Admin created successfully!');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('username', $request['username'])->first();

        if ($user && Hash::check($request['password'], $user->password)) {

            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('home')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
