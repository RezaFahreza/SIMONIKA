<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserMahasiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        $index = 1;
        foreach($collection as $row){
            if($index > 1){
                $data = [
                    'nim' => (string)$row[0],
                    'nama' => $row[1],
                    'angkatan' => (string)$row[2],
                    'jalur_masuk' => $row[3],
                    'dosen_wali' => (string)$row[4],
                ];

                // Simpan data user
                $user = new User();
                $user->username = $data['nim'];
                $user->password = Hash::make('password');
                $user->role_id = 4;
                $user->save();

                // Simpan data mahasiswa
                $mahasiswa = new Mahasiswa();
                $mahasiswa->nim = $data['nim'];
                $mahasiswa->nama = $data['nama'];
                $mahasiswa->angkatan = $data['angkatan'];
                $mahasiswa->jalur_masuk = $data['jalur_masuk'];
                $mahasiswa->dosen_wali = $data['dosen_wali'];
                $mahasiswa->user_id = $user->id;
                $mahasiswa->save();

            }
            $index++;
        }
    }
}

