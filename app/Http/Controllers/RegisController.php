<?php

namespace App\Http\Controllers;

use App\Models\regis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisController extends Controller
{
    /**
     * Tampilkan halaman registrasi.
     */
    public function index()
    {
        return view('autentikasi.registrasi_bootstrap');
    }

    /**
     * Tampilkan halaman utama (home).
     */
    public function home()
    {
        return view('index');
    }

    /**
     * Proses kirim data registrasi.
     */
    public function kirim_data(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role' => 'staf',
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }

    // Fungsi lainnya jika diperlukan
    public function create()
    {
        //
    }

    public function show(regis $regis)
    {
        //
    }

    public function edit(regis $regis)
    {
        //
    }

    public function update(Request $request, regis $regis)
    {
        //
    }

    public function destroy(regis $regis)
    {
        //
    }
}
