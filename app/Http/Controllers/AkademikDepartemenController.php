<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Mahasiswa;
use App\Models\PKL;
use App\Models\Skripsi;
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

    // REKAP
    // pkl
    public function indexRekapPKL(){
        $PKL = PKL::with('mahasiswa')->get();

        $RekapPklPerAngkatan = $PKL->groupBy('mahasiswa.angkatan')->map(function ($items){
            return [
                'jumlah_ambil' => $items->where('status', 'lulus')->count(),
                'jumlah_belum_ambil' => $items->where('status', 'belum ambil')->count(),
            ];
        });
        // dd($RekapPklPerAngkatan);
        return view('departemen.akademik.rekap.rekapPklMahasiswa', compact('RekapPklPerAngkatan'));
    }

    public function showRekapPKL($angkatan, $status){
        $MahasiswaPKL = Mahasiswa::where('angkatan', $angkatan)->leftJoin('pkl', function ($join) use ($status){
            $join->on('mahasiswa.nim', '=', 'pkl.mahasiswa_id')->where('pkl.status', '=', $status);
        })
        ->select('mahasiswa.nim', 'mahasiswa.nama', 'mahasiswa.angkatan', 'pkl.nilai_pkl as nilai')->get();

        // dd($MahasiswaPKL);
        return view('departemen.akademik.list.listSudahLulusPkl', compact('MahasiswaPKL'));

    }


    // Skripsi
    public function indexRekapSkripsi()
    {
        $Skripsi = Skripsi::with('mahasiswa')->get();

        $RekapSkripsiPerAngkatan = $Skripsi->groupBy('mahasiswa.angkatan')->map(function ($items) {
            return [
                'jumlah_ambil' => $items->where('status', 'lulus')->count(),
                'jumlah_belum_ambil' => $items->where('status', 'belum ambil')->count(),
            ];
        });
        // dd($RekapSkripsiPerAngkatan);
        return view('departemen.akademik.rekap.rekapSkripsiMahasiswa', compact('RekapSkripsiPerAngkatan'));
    }

    public function showRekapSkripsi($angkatan, $status)
    {
        $MahasiswaSkripsi = Mahasiswa::where('angkatan', $angkatan)->leftJoin('skripsi', function ($join) use ($status) {
            $join->on('mahasiswa.nim', '=', 'skripsi.mahasiswa_id')->where('skripsi.status', '=', $status);
        })
            ->select('mahasiswa.nim', 'mahasiswa.nama', 'mahasiswa.angkatan', 'skripsi.nilai_skripsi as nilai')->get();

        // dd($MahasiswaSkripsi);
        return view('', compact('MahasiswaSkripsi'));
    }


    // Status
    public function indexRekapStatus(){

        return view('departemen.akademik.rekap.rekapBerdasarkanStatus');
    }
}
