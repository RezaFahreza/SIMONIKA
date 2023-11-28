<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AkademikDepartemenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $departemen = Departemen::findOrFail($user->username);

        $mahasiswaDepartemen = Mahasiswa::all();

        return view('departemen.akademik.pencarian.searchMahasiswa', compact('departemen', 'mahasiswaDepartemen'));
    }

    public function searchMahasiswa(Request $request)
    {
        $keyword = $request->input('keyword');
        $results = [];

        if ($keyword !== '') {
            $results = Mahasiswa::where(function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%')
                    ->orWhere('nim', 'like', '%' . $keyword . '%');
                })
                ->get();
        }

        // dd($results);
        return response()->json(['results' => $results]);
    }

    public function indexAkademik($nim)
    {
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

        return view('dosenWali.akademik.rekap.detailSemester', [
            'mahasiswa' => $mahasiswa, 'irsMahasiswa' => $irsMahasiswa,
            'khsMahasiswa' => $khsMahasiswa, 'pkl' => $pkl, 'skripsi' => $skripsi
        ]);
    }
}
