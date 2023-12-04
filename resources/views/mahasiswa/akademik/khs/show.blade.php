@extends('layouts.main')

@section('contents')
<div class="card text">
    <nav>
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik') }}">Biodata
                        Akademik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true"" href=" {{ route('mahasiswa.dashboard.akademik.irs') }}">IRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="true""
                        href=" {{ route('mahasiswa.dashboard.akademik.khs') }}">KHS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="true"" href=" {{ route('mahasiswa.dashboard.akademik.pkl') }}">PKL</a>
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
                        <h1 class="mb-3">Detail KHS</h1>
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>Semester Aktif</th>
                                <td>{{ $khs->semester_aktif }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah SKS Semester</th>
                                <td>{{ $khs->jumlah_sks_semester }}</td>
                            </tr>
                            <tr>
                                <th>SKS Kumulatif</th>
                                <td>{{ $khs->sks_kumulatif }}</td>
                            </tr>
                            <tr>
                                <th>IP Semester</th>
                                <td>{{ $khs->ip_semester }}</td>
                            </tr>
                            <tr>
                                <th>IP Kumulatif</th>
                                <td>{{ $khs->ip_kumulatif }}</td>
                            </tr>
                            <tr>
                                <th>Scan KHS</th>
                                <td>
                                    <a href="{{ asset('storage/' . $khs->scan_khs) }}" target="_blank">Lihat Scan KHS</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Status Validasi</th>
                                <td>{{ $khs->status_validasi }}</td>
                            </tr>
                        </table>
                        @if ($khs->status_validasi == 'PENDING')
                        <a href="{{ route('mahasiswa.dashboard.akademik.khs.edit', ['id' => $khs->id]) }}" class="btn btn-warning">Edit Entri</a>
                        @elseif ($khs->status_validasi == 'DITOLAK')
                        <a href="{{ route('mahasiswa.dashboard.akademik.khs.edit', ['id' => $khs->id]) }}" class="btn btn-warning">Upload Ulang Entri</a>
                        @endif
                        <a href="{{ route('mahasiswa.dashboard.akademik.khs') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection