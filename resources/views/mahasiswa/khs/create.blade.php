@extends('layouts.main')

@section('contents')
    <div class="card text">
        <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="true"
                        href="{{ route('mahasiswa.dashboard.akademik') }}">Biodata Akademik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true""
                        href="{{ route('mahasiswa.dashboard.akademik.irs') }}">IRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true""
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
                            <h1 class="mb-0">Tambah Entry KHS</h1>
                        </div>
                        <br>
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <form action="{{ route('mahasiswa.dashboard.akademik.khs.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="semester_aktif">Semester Aktif</label>
                                <input type="text" name="semester_aktif" class="form-control"
                                    value="{{ old('semester_aktif') }}">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_sks_semester">Jumlah SKS Semester</label>
                                <input type="text" name="jumlah_sks_semester" class="form-control"
                                    value="{{ old('jumlah_sks_semester') }}">
                            </div>
                            <div class="form-group">
                                <label for="sks_kumulatif">SKS Kumulatif</label>
                                <input type="text" name="sks_kumulatif" class="form-control"
                                    value="{{ old('sks_kumulatif') }}">
                            </div>
                            <div class="form-group">
                                <label for="ip_semester">IP Semester</label>
                                <input type="text" name="ip_semester" class="form-control"
                                    value="{{ old('ip_semester') }}">
                            </div>
                            <div class="form-group">
                                <label for="ip_kumulatif">IP Kumulatif</label>
                                <input type="text" name="ip_kumulatif" class="form-control"
                                    value="{{ old('ip_kumulatif') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="scan_khs" class="form-label">Scan KHS</label>
                                <input class="form-control" type="file" name="scan_khs">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('mahasiswa.dashboard.akademik.khs') }}"
                                class="btn btn-danger">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
