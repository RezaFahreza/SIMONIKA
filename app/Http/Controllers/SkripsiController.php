<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $skripsiMahasiswa = DB::table('skripsi')
            ->where('mahasiswa_id', $mahasiswa->nim)
            ->get();

        $skripsi = $skripsiMahasiswa->where('mahasiswa_id', $mahasiswa->nim)->first();
        return view('mahasiswa.akademik.skripsi.index')->with(compact('mahasiswa', 'skripsi'));
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
    public function storeBerkas(Request $request, $id)
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $request->validate([
            'semester' => 'required|max:1',
            'nilai_skripsi' => 'required|max:1',
            'tanggal_lulus_sidang' => 'required|date_format:Y-m-d', // Sesuaikan format tanggal
            'lama_studi_semester' => 'required|digits_between:1,2',
            'scan_berita_acara_sidang_skripsi' => 'required|file|mimes:pdf|max:10240',
        ]);

        $skripsi = Skripsi::findOrFail($id);
        $skripsi->status = 'lulus';
        $skripsi->semester = $request->semester;
        $skripsi->nilai_skripsi = $request->nilai_skripsi;
        if ($request->hasFile('scan_berita_acara_sidang_skripsi')) {
            $file = $request->file('scan_berita_acara_sidang_skripsi');
            $fileName = $file->hashName();
            $filePath = 'uploads/Skripsi/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $skripsi->scan_berita_acara_sidang_skripsi = $filePath;
        }
        $skripsi->tanggal_lulus_sidang = $request->tanggal_lulus_sidang;
        $skripsi->lama_studi_semester = $request->lama_studi_semester;
        $skripsi->status_validasi = 'PENDING';
        $skripsi->save();

        return redirect()->route('mahasiswa.dashboard.akademik.skripsi', ['mahasiswa' => $mahasiswa])
            ->with('success', 'Berkas Berhasil Diunggah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skripsi $skripsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $skripsi = Skripsi::findOrFail($id);
        return view('mahasiswa.akademik.skripsi.edit', ['mahasiswa' => $mahasiswa, 'skripsi' => $skripsi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $request->validate([
            'semester' => 'required|max:1',
            'nilai_skripsi' => 'required|max:1',
            'tanggal_lulus_sidang' => 'required|date_format:Y-m-d', // Sesuaikan format tanggal
            'lama_studi_semester' => 'required|digits_between:1,2',
            'scan_berita_acara_sidang_skripsi' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $skripsi = Skripsi::findOrFail($id);
        $skripsi->semester = $request->semester;
        $skripsi->nilai_skripsi = $request->nilai_skripsi;
        if ($request->hasFile('scan_berita_acara_sidang_skripsi')) {
            if ($skripsi->scan_berita_acara_sidang_skripsi) {
                Storage::disk('public')->delete($skripsi->scan_berita_acara_sidang_skripsi);
            }
            $file = $request->file('scan_berita_acara_sidang_skripsi');
            $fileName = $file->hashName();
            $filePath = 'uploads/Skripsi/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $skripsi->scan_berita_acara_sidang_skripsi = $filePath;
        }
        $skripsi->tanggal_lulus_sidang = $request->tanggal_lulus_sidang;
        $skripsi->lama_studi_semester = $request->lama_studi_semester;
        $skripsi->save();
        return redirect()->route('mahasiswa.dashboard.akademik.skripsi', ['mahasiswa' => $mahasiswa])
            ->with('success', 'Perubahan Berhasil Diunggah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skripsi $skripsi)
    {
        //
    }
}
