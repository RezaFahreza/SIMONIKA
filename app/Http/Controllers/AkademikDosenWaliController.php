<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkademikDosenWaliController extends Controller
{
    public function index(DosenWali $dosenWali)
    {
        $mahasiswaPerwalian = DB::table('mahasiswa')
            ->where('dosen_wali', $dosenWali->nip)
            ->get();

        return view('dosenWali.akademik', ['dosenWali' => $dosenWali, 'mahasiswaPerwalian' => $mahasiswaPerwalian]);
    }

    public function profilMahasiswa(DosenWali $dosenWali, $nim){

        $mahasiswa = Mahasiswa::findOrFail($nim);
        return view('dosenWali.profile.profile',['dosenWali'=>$dosenWali, 'mahasiswa'=>$mahasiswa]);
    }
}
