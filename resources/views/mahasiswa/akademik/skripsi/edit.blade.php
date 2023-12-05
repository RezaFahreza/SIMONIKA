@extends('layouts.main')

@section('contents')
<div class="card text">
    <nav>
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik') }}">Biodata Akademik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true""
                        href=" {{ route('mahasiswa.dashboard.akademik.irs') }}">IRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true""
                        href=" {{ route('mahasiswa.dashboard.akademik.khs') }}">KHS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true""
                        href=" {{ route('mahasiswa.dashboard.akademik.pkl') }}">PKL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true""
                        href=" {{ route('mahasiswa.dashboard.akademik.skripsi') }}">Skripsi</a>
                </li>
                <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-primary">Kembali Ke
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
                            <h1 class="mb-0">Unggah Ulang Berkas skripsi</h1>
                        </div>
                        <hr />
                        <form action="{{ route('mahasiswa.dashboard.akademik.skripsi.update', ['id' => $skripsi->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="semester" class="form-label">Semester</label>
                                <input type="text" name="semester" class="form-control" value="{{ $skripsi->semester }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nilai_skripsi" class="form-label">Nilai Skripsi</label>
                                <input type="text" name="nilai_skripsi" class="form-control" value="{{ $skripsi->nilai_skripsi }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_lulus_sidang" class="form-label">Tanggal Lulus Sidang</label>
                                <input type="date" name="tanggal_lulus_sidang" class="form-control" value="{{ $skripsi->tanggal_lulus_sidang }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="lama_studi_semester" class="form-label">Lama Studi (dalam semester)</label>
                                <input type="text" name="lama_studi_semester" class="form-control" value="{{ $skripsi->lama_studi_semester }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="scan_berita_acara_sidang_skripsi" class="form-label">Scan Berita Acara</label>
                                @if ($skripsi->scan_berita_acara_sidang_skripsi)
                                <br>
                                <a href="{{ asset('storage/' . $skripsi->scan_berita_acara_sidang_skripsi) }}" target="_blank">Lihat Scan Berita Acara
                                    Sebelumnya</a>
                                @endif
                                <input class="form-control" type="file" name="scan_berita_acara_sidang_skripsi">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('mahasiswa.dashboard.akademik.skripsi') }}" class="btn btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection