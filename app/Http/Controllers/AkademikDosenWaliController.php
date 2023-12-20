<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\IRS;
use App\Models\KHS;
use App\Models\Mahasiswa;
use App\Models\PKL;
use App\Models\Skripsi;
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

        return view('dosenWali.akademik.pencarian.searchMahasiswa', compact('dosenWali', 'mahasiswaPerwalian'));
    }

    public function searchMahasiswa(Request $request)
    {
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

        return view('dosenWali.akademik.pencarian.detailSemester', [
            'mahasiswa' => $mahasiswa, 'irsMahasiswa' => $irsMahasiswa,
            'khsMahasiswa' => $khsMahasiswa, 'pkl' => $pkl, 'skripsi' => $skripsi
        ]);
    }

    // Detail Akademik Semester
    // IRS
    public function showAkademikSemesterIRS($nim, $semester)
    {
        $irs = IRS::where('mahasiswa_id', $nim)->where('semester_aktif', $semester)->first();
        $khs = KHS::where('mahasiswa_id', $nim)->where('semester_aktif', $semester)->first();
        $pkl = PKL::where('mahasiswa_id', $nim)->where('semester', $semester)->first();
        $skripsi = Skripsi::where('mahasiswa_id', $nim)->where('semester', $semester)->first();
        // dd($pkl);
        return view('dosenWali.akademik.pencarian.detailIrsMahasiswa', compact('nim', 'semester', 'irs', 'khs', 'pkl', 'skripsi'));
    }
    // KHS
    public function showAkademikSemesterKHS($nim, $semester)
    {
        $irs = IRS::where('mahasiswa_id', $nim)->where('semester_aktif', $semester)->first();
        $khs = KHS::where('mahasiswa_id', $nim)->where('semester_aktif', $semester)->first();
        $pkl = PKL::where('mahasiswa_id', $nim)->where('semester', $semester)->first();
        $skripsi = Skripsi::where('mahasiswa_id', $nim)->where('semester', $semester)->first();
        return view('dosenWali.akademik.pencarian.detailKhsMahasiswa', compact('nim', 'semester', 'irs', 'khs', 'pkl', 'skripsi'));
    }
    // PKL
    public function showAkademikSemesterPKL($nim, $semester)
    {
        $irs = IRS::where('mahasiswa_id', $nim)->where('semester_aktif', $semester)->first();
        $khs = KHS::where('mahasiswa_id', $nim)->where('semester_aktif', $semester)->first();
        $pkl = PKL::where('mahasiswa_id', $nim)->where('semester', $semester)->first();
        $skripsi = Skripsi::where('mahasiswa_id', $nim)->where('semester', $semester)->first();
        return view('dosenWali.akademik.pencarian.detailPklMahasiswa', compact('nim', 'semester', 'irs', 'khs', 'pkl', 'skripsi'));
    }
    // Skripsi
    public function showAkademikSemesterSkripsi($nim, $semester)
    {
        $irs = IRS::where('mahasiswa_id', $nim)->where('semester_aktif', $semester)->first();
        $khs = KHS::where('mahasiswa_id', $nim)->where('semester_aktif', $semester)->first();
        $pkl = PKL::where('mahasiswa_id', $nim)->where('semester', $semester)->first();
        $skripsi = Skripsi::where('mahasiswa_id', $nim)->where('semester', $semester)->first();
        return view('dosenWali.akademik.pencarian.detailSkripsiMahasiswa', compact('nim', 'semester', 'irs', 'khs', 'pkl', 'skripsi'));
    }
}
