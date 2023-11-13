<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function generateUserMahasiswa(){
        $dosenWaliList = DosenWali::all();
        return view('operator.generateAkunMahasiswa',['dosenWaliList' => $dosenWaliList]);
    }

    public function storeUserMahasiswa(Request $request){
        $request->validate([
            'nim' => ['required', 'unique:mahasiswa,nim'],
            'nama' => ['required'],
            'angkatan' => ['required'],
            'jalur_masuk' => ['required'],
            'dosenWali' => ['required'],
        ]);

        // Simpan data user
        $user = new User();
        $user->username = $request->input('nim');
        $user->password = Hash::make('password');
        $user->role_id = 4;
        $user->save();

        // Simpan data mahasiswa
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->angkatan = $request->input('angkatan');
        $mahasiswa->jalur_masuk = $request->input('jalur_masuk');
        $mahasiswa->dosen_wali = $request->input('dosenWali');
        $mahasiswa->user_id = $user->id;
        $mahasiswa->save();

        return redirect()->route('operator.dashboard')->with('success','Akun Mahasiswa Berhasil Ditambahkan.');
    }
    public function index()
    {
        //
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
