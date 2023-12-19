<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Departemen;
use App\Models\DosenWali;
use App\Models\Operator;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'operator'
        ]);

        Role::create([
            'role_name' => 'departemen'
        ]);

        Role::create([
            'role_name' => 'dosenWali'
        ]);

        Role::create([
            'role_name' => 'mahasiswa'
        ]);

        // Seeder Operator
        User::create([
            'username' => '1234',
            'password' => Hash::make('password'),
            'role_id' => '1',
        ]);
        Operator::create([
            'nip' => '1234',
            'nama' => 'Operator 1',
            'email' => 'operator1@gmail.com',
            'handphone' => '08818091634',
            'foto' => null,
            'user_id' => '1',
        ]);

        // Seeder Departemen
        User::create([
            'username' => '2234',
            'password' => Hash::make('password'),
            'role_id' => '2',
        ]);
        Departemen::create([
            'kode_departemen' => '2234',
            'nama_departemen' => 'Departemen Informatika',
            'email' => 'departemeninformatika@gmail.com',
            'foto' => null,
            'user_id' => '2',
        ]);

        // Seeder dosenWali
        User::create([
            'username' => '3234',
            'password' => Hash::make('password'),
            'role_id' => '3',
        ]);
        DosenWali::create([
            'nip' => '3234',
            'nama' => 'Dosen Wali 1',
            'email' => 'dosenwali1@gmail.com',
            'handphone' => '08818091634',
            'foto' => null,
            'user_id' => '3',
        ]);

        User::create([
            'username' => '3235',
            'password' => Hash::make('password'),
            'role_id' => '3',
        ]);
        DosenWali::create([
            'nip' => '3235',
            'nama' => 'Dosen Wali 2',
            'email' => 'dosenwali2@gmail.com',
            'handphone' => '08818091635',
            'foto' => null,
            'user_id' => '4',
        ]);
    }
}
