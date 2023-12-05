@extends('layouts.main')

@section('contents')
<div class="card text">
    <nav>
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik', ['mahasiswa' => $mahasiswa]) }}">Biodata Akademik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.irs', ['mahasiswa' => $mahasiswa]) }}">IRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.khs', ['mahasiswa' => $mahasiswa]) }}">KHS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.pkl', ['mahasiswa' => $mahasiswa]) }}">PKL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.skripsi', ['mahasiswa' => $mahasiswa]) }}">Skripsi</a>
                </li>
                <a href="{{ route('mahasiswa.dashboard', ['mahasiswa' => $mahasiswa]) }}" class="btn btn-primary">Kembali Ke
                    Dashboard</a>
            </ul>
        </div>
    </nav>

    <main>
        <div class="card-body">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Nama: {{ $mahasiswa->nama }}</h3>
                                <p>NIM: {{ $mahasiswa->nim }}</p>
                                <!-- Tambahkan data biodata lainnya di sini -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h1 class="mb-0">Tambah Entry IRS</h1>
                        </div>
                        <br>
                        @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                        @endif
                        <form action="{{ route('mahasiswa.dashboard.akademik.irs.store', ['mahasiswa' => $mahasiswa]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="semester_aktif">Semester Aktif</label>
                                <input type="text" name="semester_aktif" class="form-control" value="{{ old('semester_aktif') }}">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_sks_diambil">Jumlah SKS Diambil</label>
                                <input type="text" name="jumlah_sks_diambil" class="form-control" value="{{ old('jumlah_sks_diambil') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="scan_irs" class="form-label">Scan IRS</label>
                                <input class="form-control" type="file" name="scan_irs">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('mahasiswa.dashboard.akademik.irs', ['mahasiswa' => $mahasiswa]) }}" class="btn btn-danger">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection