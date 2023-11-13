<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\PKL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PKLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $pklMahasiswa = DB::table('pkl')
            ->where('mahasiswa_id', $mahasiswa->nim)
            ->get();

        $pkl = $pklMahasiswa->where('mahasiswa_id', $mahasiswa->nim)->first();

        return view('mahasiswa.pkl.index')->with(compact('mahasiswa', 'pkl'));
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
            'nilai_pkl' => 'required|max:1',
            'semester' => 'required|max:1',
            'scan_berita_acara_seminar_pkl' => 'required|file|mimes:pdf|max:10240',
        ]);

        $pkl = PKL::findOrFail($id);
        $pkl->semester = $request->semester;
        $pkl->nilai_pkl = $request->nilai_pkl;
        if ($request->hasFile('scan_berita_acara_seminar_pkl')) {
            $file = $request->file('scan_berita_acara_seminar_pkl');
            $fileName = $file->hashName();
            $filePath = 'uploads/PKL/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $pkl->scan_berita_acara_seminar_pkl = $filePath;
        }
        $pkl->status = 'lulus';
        $pkl->status_validasi = 'PENDING';
        $pkl->save();

        return redirect()->route('mahasiswa.dashboard.akademik.pkl', ['mahasiswa' => $mahasiswa])
            ->with('success', 'Berkas Scan Berita Acara Berhasil Diunggah');
    }

    /**
     * Display the specified resource.
     */
    public function show(PKL $pKL)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $pkl = PKL::findOrFail($id);
        return view('mahasiswa.pkl.edit', ['mahasiswa' => $mahasiswa, 'pkl' => $pkl]);
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
            'nilai_pkl' => 'required|max:1',
            'semester' => 'required|max:1',
            'scan_berita_acara_seminar_pkl' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $pkl = PKL::findOrFail($id);
        $pkl->semester = $request->semester;
        $pkl->nilai_pkl = $request->nilai_pkl;
        if ($request->hasFile('scan_berita_acara_seminar_pkl')) {
            if ($pkl->scan_berita_acara_seminar_pkl) {
                Storage::disk('public')->delete($pkl->scan_berita_acara_seminar_pkl);
            }
            $file = $request->file('scan_berita_acara_seminar_pkl');
            $fileName = $file->hashName();
            $filePath = 'uploads/PKL/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $pkl->scan_berita_acara_seminar_pkl = $filePath;
        }
        $pkl->save();
        return redirect()->route('mahasiswa.dashboard.akademik.pkl', ['mahasiswa' => $mahasiswa])
            ->with('success', 'Perubahan Baru Berhasil Diunggah');
    }

    public function destroy(PKL $pKL)
    {
        //
    }
}
