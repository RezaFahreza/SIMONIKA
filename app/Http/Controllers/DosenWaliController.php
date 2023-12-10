<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenWaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::check()) {
            $user = Auth::user(); // Dapatkan user yang sedang login
            $dosenWali = DosenWali::where('user_id', $user->id)->first();
            return view('dosenWali.dashboardDosenWali',['dosenWali'=>$dosenWali]);
        } else {
            // Redirect atau berikan pesan jika user belum login
            return redirect()->route('login')->with('message', 'Anda harus login terlebih dahulu.');
        }
    }

    public function showProfile(){

        $user = Auth::user(); // Dapatkan user yang sedang login
        $dosenWali = DosenWali::where('user_id', $user->id)->first();
        return view('dosenWali.profile.profileDosenWali', compact('dosenWali'));
    }

    public function editProfile()
    {
        $user = Auth::user(); // Dapatkan user yang sedang login
        $dosenWali = DosenWali::where('user_id', $user->id)->first();
        return view('dosenWali.profile.editProfile', compact('dosenWali'));
    }

    public function updateProfile(Request $request)
    {
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
    public function show(DosenWali $dosenWali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DosenWali $dosenWali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DosenWali $dosenWali)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DosenWali $dosenWali)
    {
        //
    }
}
