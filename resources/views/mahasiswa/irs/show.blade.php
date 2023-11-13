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
                    <a class="nav-link active" aria-current="true""
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
                        <h1 class="mb-3">Detail IRS</h1>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>Semester Aktif</th>
                                <td>{{ $irs->semester_aktif }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah SKS Diambil</th>
                                <td>{{ $irs->jumlah_sks_diambil }}</td>
                            </tr>
                            <tr>
                                <th>Scan IRS</th>
                                <td>
                                    <a href="{{ asset('storage/' . $irs->scan_irs) }}" target="_blank">Lihat Scan IRS</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Status Validasi</th>
                                <td>{{ $irs->status_validasi }}</td>
                            </tr>
                        </table>

                        @if ($irs->status_validasi == 'PENDING')
                            <a href="{{ route('mahasiswa.dashboard.akademik.irs.edit', ['id' => $irs->id]) }}"
                                class="btn btn-warning">Edit Entri</a>
                        @endif
                        <a href="{{ route('mahasiswa.dashboard.akademik.irs') }}"
                            class="btn btn-danger">Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
