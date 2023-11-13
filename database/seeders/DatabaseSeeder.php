<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

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
    }
}
