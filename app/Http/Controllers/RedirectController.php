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
                return redirect(route('operator.dashboard'));
            } elseif (auth()->user()->role_id === 2) {
                // jika user departemen
                return redirect(route('departemen.dashboard'));
            } elseif (auth()->user()->role_id === 3) {
                // jika user dosenWali
                return redirect(route('dosenWali.dashboard'));
            } elseif (auth()->user()->role_id === 4) {
                // jika user mahasiswa
                return redirect(route('mahasiswa.index'));
            }
        } else {
            // If the user is not authenticated, you can redirect them to a login page or another appropriate location.
            return redirect('/login');
        }
    }
}
