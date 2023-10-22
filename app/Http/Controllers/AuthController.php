<?php

namespace App\Http\Controllers;

use App\Jobs\CustomerJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\SendMailable;


class AuthController extends Controller
{
    public function loginForm() {
        return view('auth.login');
    }

    public function registerForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|string|min:6'
        ]);

        $token = Str::random(24);

        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'remember_token'    => $token
        ]);


        CustomerJob::dispatch(($user));

        return redirect('/')->with('message', 'Check email for verification');
    }

    public function verification(User $user, $token) {
        if ($user->remember_token !== $token) {
            return redirect('/')->with('error', 'Invalid token');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('message', 'Account verified.');
    }

    public function login (Request $request) {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || $user->email_verified_at == null) {
            return redirect('/')->with('error', 'Invalid.');
        }

        $login = auth()->attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        if (!$login) {
            return back()->with('error', 'Invalid credentials');
        }

        return redirect('/dashboard');

    }

    public function logout(Request $request) {
        auth()->logout();

        return redirect('/')->with('message', 'You have logged out');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect()->route('loginForm');
    }
}
