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
use Illuminate\Support\Facades\Storage;

class VerifikasiProgressStudiController extends Controller
{
    // IRS
    public function indexIrs()
    {
        $user = Auth::user();
        $dosenWali = DosenWali::findOrFail($user->username);

        $irsMahasiswa = DB::table('mahasiswa')
            ->join('irs', 'mahasiswa.nim', '=', 'irs.mahasiswa_id')
            ->join('dosen_wali', 'mahasiswa.dosen_wali', '=', 'dosen_wali.nip')
            ->select('mahasiswa.nama', 'irs.*')
            ->where('status_validasi', '=', 'PENDING')
            ->where('dosen_wali.nip', '=', $dosenWali->nip)
            ->get();


        return view('dosenWali.verifikasi.irs.indexIrs', ['dosenWali' => $dosenWali, 'irsMahasiswa' => $irsMahasiswa]);
    }

    public function showIrs($id)
    {
        $irs = IRS::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($irs->mahasiswa_id);

        return view('dosenWali.verifikasi.irs.showIrs', compact('mahasiswa', 'irs'));
    }

    public function editIrs($id)
    {
        $irs = IRS::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($irs->mahasiswa_id);
        return view('dosenWali.verifikasi.irs.editIrs', compact('mahasiswa', 'irs'));
    }

    public function updateIrs($id, Request $request)
    {
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

        return redirect()->route('dosenWali.verifikasi.irs.show', ['id' => $irs->id])
            ->with('success', 'Perubahan pada IRS berhasil disimpan.');
    }

    public function validateIrs($id)
    {
        $irs = IRS::findOrFail($id);

        $irs->status_validasi = 'DISETUJUI';
        $irs->save();
        return redirect()->route('dosenWali.verifikasi.irs.show', ['id' => $irs->id])
            ->with('success', 'Validasi berhasil dilakukan.');
    }

    // KHS
    public function indexKhs()
    {
        $user = Auth::user();
        $dosenWali = DosenWali::findOrFail($user->username);

        $khsMahasiswa = DB::table('mahasiswa')
            ->join('khs', 'mahasiswa.nim', '=', 'khs.mahasiswa_id')
            ->join('dosen_wali', 'mahasiswa.dosen_wali', '=', 'dosen_wali.nip')
            ->select('mahasiswa.nama', 'khs.*')
            ->where('status_validasi', '=', 'PENDING')
            ->where('dosen_wali.nip', '=', $dosenWali->nip)
            ->get();


        return view('dosenWali.verifikasi.khs.indexKhs', ['dosenWali' => $dosenWali, 'khsMahasiswa' => $khsMahasiswa]);
    }

    public function showKhs($id)
    {
        $khs = KHS::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($khs->mahasiswa_id);

        return view('dosenWali.verifikasi.khs.showkhs', compact('mahasiswa', 'khs'));
    }

    public function editKhs($id)
    {
        $khs = KHS::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($khs->mahasiswa_id);
        return view('dosenWali.verifikasi.khs.editKhs', compact('mahasiswa', 'khs'));
    }

    public function updateKhs($id, Request $request)
    {
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

        return redirect()->route('dosenWali.verifikasi.khs.show', ['id' => $khs->id])
            ->with('success', 'Perubahan pada KHS berhasil disimpan.');
    }

    public function validateKhs($id)
    {
        $khs = KHS::findOrFail($id);

        $khs->status_validasi = 'DISETUJUI';
        $khs->save();
        return redirect()->route('dosenWali.verifikasi.khs.show', ['id' => $khs->id])
            ->with('success', 'Validasi berhasil dilakukan.');
    }

    public function indexPkl()
    {
        $user = Auth::user();
        $dosenWali = DosenWali::findOrFail($user->username);

        $pklMahasiswa = DB::table('mahasiswa')
            ->join('pkl', 'mahasiswa.nim', '=', 'pkl.mahasiswa_id')
            ->join('dosen_wali', 'mahasiswa.dosen_wali', '=', 'dosen_wali.nip')
            ->select('mahasiswa.nama', 'pkl.*')
            ->where('status_validasi', '=', 'PENDING')
            ->where('dosen_wali.nip', '=', $dosenWali->nip)
            ->get();


        return view('dosenWali.verifikasi.pkl.indexPkl', ['dosenWali' => $dosenWali, 'pklMahasiswa' => $pklMahasiswa]);
    }
    public function showPkl($id)
    {
        $pkl = PKL::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($pkl->mahasiswa_id);

        return view('dosenWali.verifikasi.pkl.showPkl', compact('mahasiswa', 'pkl'));
    }

    public function editPkl($id)
    {
        $pkl = PKL::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($pkl->mahasiswa_id);
        return view('dosenWali.verifikasi.pkl.editPkl', compact('mahasiswa', 'pkl'));
    }

    public function updatePkl($id, Request $request)
    {
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
        return redirect()->route('dosenWali.verifikasi.pkl.show', ['id' => $pkl->id])
            ->with('success', 'Perubahan Baru Berhasil Diunggah');
    }

    public function validatePkl($id)
    {
        $pkl = PKL::findOrFail($id);

        $pkl->status_validasi = 'DISETUJUI';
        $pkl->save();
        return redirect()->route('dosenWali.verifikasi.pkl.show', ['id' => $pkl->id])
            ->with('success', 'Validasi berhasil dilakukan.');
    }

    public function indexSkripsi()
    {
        $user = Auth::user();
        $dosenWali = DosenWali::findOrFail($user->username);

        $skripsiMahasiswa = DB::table('mahasiswa')
            ->join('skripsi', 'mahasiswa.nim', '=', 'skripsi.mahasiswa_id')
            ->join('dosen_wali', 'mahasiswa.dosen_wali', '=', 'dosen_wali.nip')
            ->select('mahasiswa.nama', 'skripsi.*')
            ->where('status_validasi', '=', 'PENDING')
            ->where('dosen_wali.nip', '=', $dosenWali->nip)
            ->get();


        return view('dosenWali.verifikasi.skripsi.indexSkripsi', ['dosenWali' => $dosenWali, 'skripsiMahasiswa' => $skripsiMahasiswa]);
    }

    public function showSkripsi($id)
    {
        $skripsi = Skripsi::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($skripsi->mahasiswa_id);

        return view('dosenWali.verifikasi.skripsi.showSkripsi', compact('mahasiswa', 'skripsi'));
    }

    public function editSkripsi($id)
    {
        $skripsi = Skripsi::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($skripsi->mahasiswa_id);
        return view('dosenWali.verifikasi.skripsi.editSkripsi', compact('mahasiswa', 'skripsi'));
    }

    public function updateSkripsi($id, Request $request)
    {
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
        return redirect()->route('dosenWali.verifikasi.skripsi.show', ['id' => $skripsi->id])
            ->with('success', 'Perubahan berhasil disimpan.');
    }

    public function validateSkripsi($id)
    {
        $skripsi = Skripsi::findOrFail($id);

        $skripsi->status_validasi = 'DISETUJUI';
        $skripsi->save();
        return redirect()->route('dosenWali.verifikasi.skripsi.show', ['id' => $skripsi->id])
            ->with('success', 'Validasi berhasil dilakukan.');
    }

}
