<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registrationForm()
    {
        return view('auth.registration');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        // Validate the request
        $details = $request->only('email','password');
        if(Auth::attempt( $details)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid details !'
        ]);
    }

    public function registrationAction(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ];

        $user = User::create($data);

        return redirect()->route('login')->with('success','Registration successfully. please login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
