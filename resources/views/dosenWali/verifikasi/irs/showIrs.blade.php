@extends('layouts.main')

@section('contents')
    <div class="container mt-5">
        <div class="card">
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
                                        <a href="{{ asset('storage/' . $irs->scan_irs) }}" target="_blank">Lihat Scan
                                            IRS</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status Validasi</th>
                                    <td>{{ $irs->status_validasi }}</td>
                                </tr>
                            </table>
                            @if ($irs->status_validasi == 'PENDING')
                            <form action="{{ route('dosenWali.verifikasi.irs.validate', ['id' => $irs->id]) }}",
                                method="POST">
                                @csrf
                                @method('PUT')
                                <a href="{{ route('dosenWali.verifikasi.irs.edit', ['id' => $irs->id]) }}"
                                    class="btn btn-warning">Edit Entri</a>
                                <button type="submit" class="btn btn-success">Validasi Entri</button>
                                @endif
                            </form>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('dosenWali.verifikasi.irs') }}" class="btn btn-danger">Kembali</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
