<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function register()
    {
        return view('login.register');
    }

    public function create(Request $request): RedirectResponse
    {
        $rules = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'noHp' => 'required|numeric',
            'alamat' => 'required'
        ]);

        $rules['password'] = bcrypt($rules['password']);


        User::create($rules);

        return redirect('/login');
    }


    public function authenticate(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role == "admin") {
                return redirect()->route('admin');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->with('error', 'Login Gagal');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
