<?php

namespace App\Http\Controllers;

use App\Models\KHS;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KHSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $khsMahasiswa = DB::table('khs')
            ->where('mahasiswa_id', $mahasiswa->nim)
            ->orderBy('semester_aktif', 'asc')
            ->get();

        return view('mahasiswa.akademik.khs.index')->with(compact('mahasiswa', 'khsMahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        return view('mahasiswa.akademik.khs.create')->with(compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $request->validate([
            'semester_aktif' => 'required|numeric|digits_between:1,2',
            'jumlah_sks_semester' => 'required|numeric|digits_between:1,2',
            'sks_kumulatif' => 'required|numeric|digits_between:1,3',
            'ip_semester' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'between:0,4'],
            'ip_kumulatif' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'between:0,4'],
            'scan_khs' => 'required|file|mimes:pdf|max:10240',
        ]);

        if (KHS::where('semester_aktif', $request->semester_aktif)->where('mahasiswa_id', $mahasiswa->nim)->exists()) {
            return redirect()->route('mahasiswa.dashboard.akademik.khs.create', ['mahasiswa' => $mahasiswa])
                ->with('error', 'KHS untuk semester tersebut sudah terdaftar');
        }

        $newKHS = new KHS();
        $newKHS->semester_aktif = $request->semester_aktif;
        $newKHS->jumlah_sks_semester = $request->jumlah_sks_semester;
        $newKHS->sks_kumulatif = $request->sks_kumulatif;
        $newKHS->ip_semester = $request->ip_semester;
        $newKHS->ip_kumulatif = $request->ip_kumulatif;
        $newKHS->mahasiswa_id = $mahasiswa->nim;

        if ($request->hasFile('scan_khs')) {
            $file = $request->file('scan_khs');
            $fileName = $file->hashName();
            $filePath = 'uploads/KHS/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $newKHS->scan_KHS = $filePath;
        }

        $newKHS->save();

        return redirect()->route('mahasiswa.dashboard.akademik.khs', ['mahasiswa' => $mahasiswa])
            ->with('success', 'Entry baru KHS berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $khs = KHS::findOrFail($id);
        return view('mahasiswa.akademik.khs.show', compact('mahasiswa', 'khs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $khs = KHS::findOrFail($id);
        return view('mahasiswa.akademik.khs.edit', compact('mahasiswa', 'khs'));
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
            'semester_aktif' => 'required|numeric|digits_between:1,2',
            'jumlah_sks_semester' => 'required|numeric|digits_between:1,2',
            'sks_kumulatif' => 'required|numeric|digits_between:1,3',
            'ip_semester' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'between:0,4'],
            'ip_kumulatif' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'between:0,4'],
            'scan_khs' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $khs = KHS::findOrFail($id);
        $khs->semester_aktif = $request->semester_aktif;
        $khs->jumlah_sks_semester = $request->jumlah_sks_semester;
        $khs->sks_kumulatif = $request->sks_kumulatif;
        $khs->ip_semester = $request->ip_semester;
        $khs->ip_kumulatif = $request->ip_kumulatif;
        if ($request->hasFile('scan_khs')) {
            // Menghapus file lama
            if ($khs->scan_khs) {
                Storage::disk('public')->delete($khs->scan_khs);
            }

            $file = $request->file('scan_khs');
            $fileName = $file->hashName();
            $filePath = 'uploads/KHS/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $khs->scan_khs = $filePath;
        }
        $khs->save();

        return redirect()->route('mahasiswa.dashboard.akademik.khs.show', ['mahasiswa' => $mahasiswa, 'id' => $khs->id])
            ->with('success', 'Perubahan pada KHS berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KHS $kHS)
    {
        //
    }
}
