@extends('layouts.main')

@section('contents')
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true"
                        href="{{ route('mahasiswa.dashboard.akademik') }}">Biodata Akademik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true""
                        href="{{ route('mahasiswa.dashboard.akademik.irs') }}">IRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true""
                        href="{{ route('mahasiswa.dashboard.akademik.khs') }}">KHS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true""
                        href="{{ route('mahasiswa.dashboard.akademik.pkl') }}">PKL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true""
                        href="{{ route('mahasiswa.dashboard.akademik.skripsi') }}">Skripsi</a>
                </li>
                <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-primary">Kembali Ke
                    Dashboard</a>
            </ul>
        </div>
        <div class="card-body">
            <div class="container">
                <h2>Biodata Mahasiswa</h2>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/' . $mahasiswa->foto_mahasiswa) }}"
                            alt="Foto Mahasiswa" class="img-thumbnail">
                    </div>
                    <div class="col-md-6">
                        <h3>Nama: {{ $mahasiswa->nama }}</h3>
                        <p>NIM: {{ $mahasiswa->nim }}</p>
                        <!-- Tambahkan data biodata lainnya di sini -->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
