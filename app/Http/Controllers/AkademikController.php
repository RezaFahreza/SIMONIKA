<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AkademikController extends Controller
{
    public function indexMahasiswa(){
        $user = Auth::user();
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        return view('mahasiswa.akademik.biodata.biodata',['mahasiswa'=>$mahasiswa]);
    }
    
}
