<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;

class UserController extends Controller
{
    public function login() : View
    {
        return view('authentication.login');
    }

    public function register() : View 
    {
        return view('authentication.register');
    }

    public function authenticate(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request ->session()->regenerate();

            return redirect()->route('products.index')
                    ->withSuccess('Login successful.');
        }
        return redirect()->back()->withErrors(['Credentials do no match existing records.']);
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->intended('/login')
                ->with('success', 'Account registered successfully.');
    }

    public function logout() : RedirectResponse {
        Auth::logout();
        return redirect()->route('login');
    }
}