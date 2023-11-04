<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dologin(Request $request)
    {
        // Validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Retrieve the user by email
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        // Check if the provided password matches the hashed password in the database
        if (password_verify($credentials['password'], $user->password)) {
            // Password matches, log in the user
            auth()->login($user);

            // Membuat ulang session login
            $request->session()->regenerate();

            if ($user->role_id === 1) {
                // Jika user operator
                return redirect()->intended('/operator')->with('user',$user);
            } elseif ($user->role_id === 2) {
                // Jika user departemen
                return redirect()->intended('/departemen')->with('user', $user);
            } elseif ($user->role_id === 3) {
                // Jika user dosenWali
                return redirect()->intended('/dosenWali')->with('user', $user);
            } elseif ($user->role_id === 4) {
                // Jika user mahasiswa
                return redirect()->intended('/mahasiswa')->with('user', $user);
            }
        }

        // Jika email atau password salah
        // Kirimkan session error
        return back()->with('error', 'Email atau password salah');
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
