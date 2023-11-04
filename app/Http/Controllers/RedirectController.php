<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek()
    {
        if (auth()->check()) {
            if (auth()->user()->role_id === 1) {
                // jika user operator
                return redirect('/operator');
            } elseif (auth()->user()->role_id === 2) {
                // jika user departemen
                return redirect('/departemen');
            } elseif (auth()->user()->role_id === 3) {
                // jika user dosenWali
                return redirect('/dosenWali');
            } elseif (auth()->user()->role_id === 4) {
                // jika user mahasiswa
                return redirect('/mahasiswa');
            }
        } else {
            // If the user is not authenticated, you can redirect them to a login page or another appropriate location.
            return redirect('/login');
        }
    }
}
