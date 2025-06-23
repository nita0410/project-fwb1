<?php

namespace App\Http\Controllers;

use App\Models\login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

  
class LoginController extends Controller
{ 

    //login
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Akun tidak ditemukan.')->withInput();
        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin');
            } elseif ($user->role === 'manajer') {
                return redirect()->route('manajer.laporan');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->with('error', 'Email atau kata sandi salah.')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function index()
    {
        return view('autentikasi.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(login $login)
    {
        //
    }
}
