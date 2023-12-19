@extends('layouts.templateDosenWali', ['title' => 'Tampilan Skripsi'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-5">
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
                                    <h1 class="mb-3">Detail Skripsi</h1>
                                    @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                    @endif
                                    <table class="table table-bordered">
                                        </tr>
                                        <th>Status </th>
                                        <td>{{ $skripsi->status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Semester</th>
                                            <td>{{ $skripsi->semester }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nilai skripsi</th>
                                            <td>{{ $skripsi->nilai_skripsi }}</td>
                                        <tr>
                                        <tr>
                                            <th>Tanggal Lulus Sidang</th>
                                            <td>{{ $skripsi->tanggal_lulus_sidang }}</td>
                                        <tr>
                                        <tr>
                                            <th>Lama Studi Semester</th>
                                            <td>{{ $skripsi->lama_studi_semester }}</td>
                                        <tr>
                                            <th>Scan skripsi</th>
                                            <td>
                                                <a href="{{ asset('storage/' . $skripsi->scan_berita_acara_sidang_skripsi) }}" target="_blank">Lihat Scan
                                                    skripsi</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status Validasi</th>
                                            <td>{{ $skripsi->status_validasi }}</td>
                                        </tr>
                                    </table>
                                    @if ($skripsi->status_validasi == 'PENDING')
                                    <form action="{{ route('dosenWali.verifikasi.skripsi.validate', ['id' => $skripsi->id]) }}" , method="POST">
                                        @csrf
                                        @method('PUT')
                                        <a href="{{ route('dosenWali.verifikasi.skripsi.edit', ['id' => $skripsi->id]) }}" class="btn btn-warning">Edit Entri</a>
                                        <button type="submit" class="btn btn-success">Validasi Entri</button>
                                        @endif
                                    </form>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ route('dosenWali.verifikasi.skripsi') }}" class="btn btn-danger">Kembali</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection