<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $validatedUser = $request->validated();
        $validatedUser['password'] = bcrypt($validatedUser['password']);
        if ($request->hasFile('avatar')) {
            $validatedUser['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        $user = User::create($validatedUser);
        Auth::login($user);

        return redirect('/');
    }

    public function login()
    {
        return view('users.login');
    }
    public function authenticate(LoginUserRequest $request)
    {
        $loginUser = $request->validated();
        if (auth()->attempt($loginUser)) {
            $request->session()->regenerate();
            return redirect('/');
        };
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
