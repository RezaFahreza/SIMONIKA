<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AkademikDosenWaliController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();
        $dosenWali = DosenWali::findOrFail($user->username);
        // dd($dosenWali);
        $mahasiswaPerwalian = DB::table('mahasiswa')
            ->where('dosen_wali', $dosenWali->nip)
            ->get();
        
        return view('dosenWali.akademik.pencarian.searchMahasiswa',compact('dosenWali', 'mahasiswaPerwalian'));
    }

    public function searchMahasiswa(Request $request){
        $keyword = $request->input('keyword');
        $results = [];

        if ($keyword !== '') {
            $idDosenWali = Auth::user()->dosenWali->nip;

            $results = Mahasiswa::where(function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%')
                    ->orWhere('nim', 'like', '%' . $keyword . '%');
            })
                ->where('dosen_wali', $idDosenWali)
                ->get();
        }

        return response()->json(['results' => $results]);
    }

    public function indexAkademik($nim){
        // mendapatkan data mahasiswa
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        // mendapatkan data IRS
        $irsMahasiswa = DB::table('irs')
            ->where('mahasiswa_id', $mahasiswa->nim)
            ->orderBy('semester_aktif', 'asc')
            ->get();

        // mendapatkan data KHS
        $khsMahasiswa = DB::table('khs')
            ->where('mahasiswa_id', $mahasiswa->nim)
            ->orderBy('semester_aktif', 'asc')
            ->get();

        // mendapatkan data PKL
        $pklMahasiswa = DB::table('pkl')
            ->where('mahasiswa_id', $mahasiswa->nim)
            ->get();

        $pkl = $pklMahasiswa->where('mahasiswa_id', $mahasiswa->nim)->first();

        // mendapatkan data Skripsi
        $skripsiMahasiswa = DB::table('skripsi')
        ->where('mahasiswa_id', $mahasiswa->nim)
        ->get();

        $skripsi = $skripsiMahasiswa->where('mahasiswa_id', $mahasiswa->nim)->first();

        // dd($skripsi);

        return view('dosenWali.akademik.pencarian.detailSemester',['mahasiswa'=>$mahasiswa, 'irsMahasiswa'=>$irsMahasiswa,
    'khsMahasiswa'=>$khsMahasiswa, 'pkl'=>$pkl, 'skripsi'=>$skripsi]);
    }
}


