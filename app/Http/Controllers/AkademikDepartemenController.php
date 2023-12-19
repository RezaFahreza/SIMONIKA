<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Mahasiswa;
use App\Models\PKL;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;


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

        return view('departemen.akademik.pencarian.detailSemester', [
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
        return view('departemen.akademik.rekap.detailPkl', compact('MahasiswaPKL', 'angkatan', 'status'));

    }
    
    public function cetakRekapPKL(){
        $PKL = PKL::with('mahasiswa')->get();

        $RekapPklPerAngkatan = $PKL->groupBy('mahasiswa.angkatan')->map(function ($items) {
            return [
                'jumlah_ambil' => $items->where('status', 'lulus')->count(),
                'jumlah_belum_ambil' => $items->where('status', 'belum ambil')->count(),
            ];
        });
        $pdf = PDF::loadView('departemen.akademik.rekap.pdfPkl', ['RekapPklPerAngkatan']);
        return $pdf->download('rekap-pkl-departemen');
    }

    public function cetakRekapPKLPerAngkatanStatus($angkatan, $status){
        $MahasiswaPKL = Mahasiswa::where('angkatan', $angkatan)->leftJoin('pkl', function ($join) use ($status) {
            $join->on('mahasiswa.nim', '=', 'pkl.mahasiswa_id')->where('pkl.status', '=', $status);
        })
        ->select('mahasiswa.nim', 'mahasiswa.nama', 'mahasiswa.angkatan', 'pkl.nilai_pkl as nilai')->get();
        // dd($MahasiswaPKL);
        $filename = 'rekap_pkl_' . $angkatan . '_' . str_replace(' ', '_', $status) . '.pdf';

        $pdf = PDF::loadView('departemen.akademik.rekap.pdfPkl', ['MahasiswaPKL' => $MahasiswaPKL, 'angkatan' => $angkatan, 'status' => $status]);
        return $pdf->stream($filename);
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
        return view('departemen.akademik.rekap.detailSkripsi', compact('MahasiswaSkripsi', 'angkatan', 'status'));
    }

    public function cetakRekapSkripsi(){
        $Skripsi = Skripsi::with('mahasiswa')->get();

        $RekapSkripsiPerAngkatan = $Skripsi->groupBy('mahasiswa.angkatan')->map(function ($items) {
            return [
                'jumlah_ambil' => $items->where('status', 'lulus')->count(),
                'jumlah_belum_ambil' => $items->where('status', 'belum ambil')->count(),
            ];
        });
        $pdf = PDF::loadView('departemen.akademik.rekap.pdfSkripsi', ['RekapSkripsiPerAngkatan']);
        return $pdf->download('rekap-pkl-departemen');
    }

    public function cetakRekapSkripsiPerAngkatanStatus($angkatan, $status){
        $MahasiswaSkripsi = Mahasiswa::where('angkatan', $angkatan)->leftJoin('skripsi', function ($join) use ($status) {
            $join->on('mahasiswa.nim', '=', 'skripsi.mahasiswa_id')->where('skripsi.status', '=', $status);
        })
            ->select('mahasiswa.nim', 'mahasiswa.nama', 'mahasiswa.angkatan', 'skripsi.nilai_skripsi as nilai')->get();
        // dd($MahasiswaPKL);
        $filename = 'rekap_skripsi_' . $angkatan . '_' . str_replace(' ', '_', $status) . '.pdf';

        $pdf = PDF::loadView('departemen.akademik.rekap.pdfSkripsi', ['MahasiswaSkripsi' => $MahasiswaSkripsi, 'angkatan' => $angkatan, 'status' => $status]);
        return $pdf->stream($filename);
    }
    


    // Status
    public function indexRekapStatus(){
        $Mahasiswa = Mahasiswa::all();

        $RekapStatus = $Mahasiswa->groupBy('angkatan')->map(function($items){
            return[
                'Aktif' => $items->where('status', 'Aktif')->count(),
                'Cuti' => $items->where('status', 'Cuti')->count(),
                'Mangkir' => $items->where('status', 'Mangkir')->count(),
                'DO' => $items->where('status', 'DO')->count(),
                'Undur Diri' => $items->where('status', 'Undur Diri')->count(),
                'Lulus' => $items->where('status', 'Lulus')->count(),
                'Meninggal Dunia' => $items->where('status', 'Meninggal Dunia')->count(),
            ];
        });
        // dd($RekapStatus);
        return view('departemen.akademik.rekap.rekapBerdasarkanStatus', compact('RekapStatus'));
    }

    public function showRekapStatus($angkatan, $status){
        $MahasiswaStatus = Mahasiswa::where('angkatan', $angkatan)->where('status', $status)->select('nim', 'nama', 'angkatan', 'jalur_masuk')->get();
        // dd($MahasiswaStatus);
        return view('departemen.akademik.rekap.detailStatus', compact('MahasiswaStatus', 'angkatan', 'status'));
    }

    public function cetakRekapStatus(){

    }

    public function cetakRekapStatusDetail($angkatan, $status){
        $MahasiswaStatus = Mahasiswa::where('angkatan', $angkatan)->where('status', $status)->select('nim', 'nama', 'angkatan', 'jalur_masuk')->get();

        $filename = 'rekap_status_' . $angkatan . '_' . str_replace(' ', '_', $status) . '.pdf';

        $pdf = PDF::loadView('departemen.akademik.rekap.pdfStatus', ['MahasiswaStatus' => $MahasiswaStatus, 'angkatan' => $angkatan, 'status' => $status]);
        return $pdf->stream($filename);
    }
}
