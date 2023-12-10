<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\Mahasiswa;
use App\Models\PKL;
use App\Models\Skripsi;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // Cek apakah user telah login
        if (Auth::check()) {
            $user = Auth::user(); // Dapatkan user yang sedang login
            $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
            if ($this->hasNullFields($mahasiswa)) {
                return redirect()->route('mahasiswa.firstEdit');
            } else {
                return redirect()->route('mahasiswa.dashboard');
            }
        } else {
            // Redirect atau berikan pesan jika user belum login
            return redirect()->route('login')->with('message', 'Anda harus login terlebih dahulu.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    protected function hasNullFields(Mahasiswa $mahasiswa)
    {
        $fields = [
            'nim',
            'nama',
            'alamat',
            'kab_kota',
            'propinsi',
            'angkatan',
            'jalur_masuk',
            'email',
            'handphone',
            'status',
            'foto_mahasiswa',
            'dosen_wali',
            'user_id',
            // Tambahkan kolom lain yang harus diisi di sini
        ];

        foreach ($fields as $field) {
            if (is_null($mahasiswa->$field)) {
                return true;
            }
        }

        return false;
    }
    public function firstEdit()
    {
        $user = Auth::user();
        $data = DB::table('mahasiswa')
        ->join('dosen_wali', 'mahasiswa.dosen_wali', '=', 'dosen_wali.nip')
        ->select('mahasiswa.*', 'dosen_wali.nama as nama_dosen')
        ->get();

        $targetMahasiswa = $data->firstWhere('user_id', $user->id);

        return view('mahasiswa.updateDataDiri.updateDataUserMahasiswaBaru', ['targetMahasiswa' => $targetMahasiswa]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        // Ambil semua data mahasiswa (opsional, sesuaikan dengan kebutuhan Anda)


        return view('mahasiswa.dashboardMahasiswa', ['mahasiswa' => $mahasiswa]);
    }
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function firstUpdate(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.index')->with('error', 'Data Mahasiswa tidak ditemukan.');
        }

        // Validasi input
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kab_kota' => 'required',
            'propinsi' => 'required',
            'email' => 'required|email',
            'nomor_handphone' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->kab_kota = $request->kab_kota;
        $mahasiswa->propinsi = $request->propinsi;
        $mahasiswa->email = $request->email;
        $mahasiswa->handphone = $request->nomor_handphone;

        if ($request->hasFile('foto')) {
            // Menyimpan Upload foto
            $foto= $request->file('foto');
            $fileName = $foto->hashName();
            $filePath = 'uploads/foto_mahasiswa/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($foto));
            $mahasiswa->foto_mahasiswa = $filePath;

            $mahasiswa->save();
            
            // Tambahkan catatan otomatis di tabel PKL
            $pkl = new PKL();
            $pkl->status = 'belum ambil';
            $pkl->mahasiswa_id = $mahasiswa->nim;
            $pkl->save();
            
            // Tambahkan catatan otomatis di tabel Skripsi
            $skripsi = new Skripsi();
            $skripsi->status = 'belum ambil';
            $skripsi->mahasiswa_id = $mahasiswa->nim;
            $skripsi->save();
            
            return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui.');
        }
}

//  Profil Mahasiswa
    public function showProfile(){
        $user = Auth::user();
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        return view('mahasiswa.profile.profileMahasiswa', compact('mahasiswa'));
    }

    public function editProfile(){

        $user = Auth::user();
        // Ambil data mahasiswa yang sesuai dengan user yang telah login
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        return view('mahasiswa.profile.editProfile', compact('mahasiswa'));
    }

    public function updateProfile(Request $request){
    }
    public function store(Request $request, )
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
