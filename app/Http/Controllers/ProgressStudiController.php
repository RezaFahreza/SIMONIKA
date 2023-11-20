<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgressStudi;

public function search(Request $request)
{
    $query = $request->input('query');

    $mahasiswas = Mahasiswa::where('nim', 'like', "%$query%")
        ->orWhere('nama', 'like', "%$query%")
        ->get();

    $results = [];
    foreach ($mahasiswas as $mahasiswa) {
        $progressStudi = ProgressStudi::where('mahasiswa_id', $mahasiswa->id)->get();
        $results[] = [
            'mahasiswa' => $mahasiswa,
            'progress_studi' => $progressStudi,
        ];
    }

    return view('search', compact('results'));
}
