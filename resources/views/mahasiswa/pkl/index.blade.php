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
                    <a class="nav-link" aria-current="true""
                        href="{{ route('mahasiswa.dashboard.akademik.khs') }}">KHS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true""
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
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if ($pkl->status == 'belum ambil')
                            <div class="d-flex align-items-center justify-content-between">
                                <h1 class="mb-0">Unggah Berkas PKL</h1>
                            </div>
                            <hr />
                            <form
                                action="{{ route('mahasiswa.dashboard.akademik.pkl.storeBerkas', ['id' => $pkl->id]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="text" name="semester" class="form-control" value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nilai_pkl" class="form-label">Nilai PKL</label>
                                    <input type="text" name="nilai_pkl" class="form-control" value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="scan_berita_acara_seminar_pkl" class="form-label">Scan Berita Acara</label>
                                    <input class="form-control" type="file" name="scan_berita_acara_seminar_pkl">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        @elseif ($pkl->status == 'lulus')
                            @if ($pkl->status_validasi == 'PENDING')
                                <table class="table table-bordered">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h1 class="mb-0">Berkas PKL</h1>
                                    </div>
                                    <hr />
                                    <tr>
                                        <th>Semester</th>
                                        <td>{{ $pkl->semester }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nilai PKL</th>
                                        <td>{{ $pkl->nilai_pkl }}</td>
                                    </tr>
                                    <tr>
                                        <th>Scan PKL</th>
                                        <td>
                                            <a href="{{ asset('storage/' . $pkl->scan_berita_acara_seminar_pkl) }}"
                                                target="_blank">Lihat Scan PKL</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status Validasi</th>
                                        <td>{{ $pkl->status_validasi }}</td>
                                    </tr>
                                </table>
                                <a href="{{ route('mahasiswa.dashboard.akademik.pkl.edit', ['id' => $pkl->id]) }}"
                                    class="btn btn-warning">Edit Entri</a>
                            @elseif($pkl->status_validasi == 'DISETUJUI')
                                <table class="table table-bordered">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h1 class="mb-0">Berkas PKL</h1>
                                    </div>
                                    <hr />
                                    <tr>
                                        <th>Semester</th>
                                        <td>{{ $pkl->semester }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nilai PKL</th>
                                        <td>{{ $pkl->nilai_pkl }}</td>
                                    </tr>
                                    <tr>
                                        <th>Scan PKL</th>
                                        <td>
                                            <a href="{{ asset('storage/' . $pkl->scan_berita_acara_seminar_pkl) }}"
                                                target="_blank">Lihat Scan PKL</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status Validasi</th>
                                        <td>{{ $pkl->status_validasi }}</td>
                                    </tr>
                                </table>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
