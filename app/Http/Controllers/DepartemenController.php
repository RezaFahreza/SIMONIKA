<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user(); // Dapatkan user yang sedang login
            $departemen = Departemen::where('user_id', $user->id)->first();
            return view('departemen.dashboardDepartemen',compact('departemen'));
        } else {
            // Redirect atau berikan pesan jika user belum login
            return redirect()->route('login')->with('message', 'Anda harus login terlebih dahulu.');
        }
        
    }

    public function showProfile()
    {
        $user = Auth::user(); // Dapatkan user yang sedang login
        $departemen = Departemen::where('user_id', $user->id)->first();
        return view('departemen.profile.profileDepartemen', compact('departemen'));
    }

    public function editProfile()
    {
        $user = Auth::user(); // Dapatkan user yang sedang login
        $departemen = Departemen::where('user_id', $user->id)->first();
        return view('departemen.profile.editProfile',compact('departemen'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Dapatkan user yang sedang login
        $departemen = Departemen::where('user_id', $user->id)->first();

        $request->validate([
            'nama_departemen' => 'required',
            'kode_departemen' => 'required',
            'email' => 'required|email',
        ]);

        $departemen->nama_departemen = $request->nama_departemen;
        $departemen->kode_departemen = $request->kode_departemen;
        $departemen->email = $request->email;
        $departemen->save();

        return redirect()->route('departemen.profile')->with('success', 'Perubahan berhasil disimpan');
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
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departemen $departemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departemen $departemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departemen $departemen)
    {
        //
    }
}
