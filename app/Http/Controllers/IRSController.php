<?php

namespace App\Http\Controllers;

use App\Models\IRS;
use App\Models\Mahasiswa;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $irsMahasiswa = DB::table('irs')
            ->where('mahasiswa_id', $mahasiswa->nim)
            ->orderBy('semester_aktif','asc')
            ->get();

        return view('mahasiswa.akademik.irs.index')->with(compact('mahasiswa', 'irsMahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        return view('mahasiswa.akademik.irs.create')->with(compact('mahasiswa'));
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
            'jumlah_sks_diambil' => 'required|numeric|digits_between:1,2',
            'scan_irs' => 'required|file|mimes:pdf|max:10240',
        ]);

        if (IRS::where('semester_aktif', $request->semester_aktif)->where('mahasiswa_id', $mahasiswa->nim)->exists()) {
            return redirect()->route('mahasiswa.dashboard.akademik.irs.create', ['mahasiswa' => $mahasiswa])
                ->with('error', 'IRS untuk semester tersebut sudah terdaftar');
        }

        $newIRS = new IRS();
        $newIRS->semester_aktif = $request->semester_aktif;
        $newIRS->jumlah_sks_diambil = $request->jumlah_sks_diambil;
        $newIRS->mahasiswa_id = $mahasiswa->nim;

        if ($request->hasFile('scan_irs')) {
            $file = $request->file('scan_irs');
            $fileName = $file->hashName();
            $filePath = 'uploads/IRS/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $newIRS->scan_irs = $filePath;
        }

        $newIRS->save();

        return redirect()->route('mahasiswa.dashboard.akademik.irs', ['mahasiswa' => $mahasiswa])
            ->with('success', 'Entry baru IRS berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $irs = IRS::findOrFail($id);
        return view('mahasiswa.akademik.irs.show',compact('mahasiswa', 'irs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $irs = IRS::findOrFail($id);
        return view('mahasiswa.akademik.irs.edit', compact('mahasiswa', 'irs'));
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
            'jumlah_sks_diambil' => 'required|numeric|digits_between:1,2',
            'scan_irs' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $irs = IRS::findOrFail($id);
        $irs->semester_aktif = $request->semester_aktif;
        $irs->jumlah_sks_diambil = $request->jumlah_sks_diambil;
        if ($request->hasFile('scan_irs')) {
            // Menghapus file lama
            if ($irs->scan_irs) {
                Storage::disk('public')->delete($irs->scan_irs);
            }

            $file = $request->file('scan_irs');
            $fileName = $file->hashName();
            $filePath = 'uploads/IRS/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $irs->scan_irs = $filePath;
        }
        $irs->save();
        return redirect()->route('mahasiswa.dashboard.akademik.irs.show', ['mahasiswa' => $mahasiswa, 'id' => $irs->id])
            ->with('success', 'Perubahan pada IRS berhasil disimpan');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IRS $iRS)
    {
        //
    }
}
