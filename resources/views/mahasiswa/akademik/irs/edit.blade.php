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
                    <a class="nav-link active" aria-current="true""
                        href=" {{ route('mahasiswa.dashboard.akademik.irs') }}">IRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true""
                        href=" {{ route('mahasiswa.dashboard.akademik.khs') }}">KHS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true""
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
                        <h1 class="mb-3">Edit IRS</h1>
                        <form action="{{ route('mahasiswa.dashboard.akademik.irs.update',['id' => $irs->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="semester_aktif">Semester Aktif</label>
                                <input type="text" name="semester_aktif" class="form-control" value="{{ $irs->semester_aktif }}">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_sks_diambil">Jumlah SKS Diambil</label>
                                <input type="text" name="jumlah_sks_diambil" class="form-control" value="{{ $irs->jumlah_sks_diambil }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="scan_irs" class="form-label">Scan IRS</label>
                                @if ($irs->scan_irs)
                                <br>
                                <a href="{{ asset('storage/' . $irs->scan_irs) }}" target="_blank">Lihat Scan IRS Sebelumnya</a>
                                @endif
                                <input class="form-control" type="file" name="scan_irs">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('mahasiswa.dashboard.akademik.irs.show', ['id' => $irs->id]) }}" class="btn btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection