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
                            <h1 class="mb-3">Edit SKripsi</h1>
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('dosenWali.verifikasi.skripsi.update', ['id' => $skripsi->id]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="text" name="semester" class="form-control"
                                        value="{{ $skripsi->semester }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nilai_skripsi" class="form-label">Nilai Skripsi</label>
                                    <input type="text" name="nilai_skripsi" class="form-control"
                                        value="{{ $skripsi->nilai_skripsi }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tanggal_lulus_sidang" class="form-label">Tanggal Lulus Sidang</label>
                                    <input type="date" name="tanggal_lulus_sidang" class="form-control"
                                        value="{{ $skripsi->tanggal_lulus_sidang }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="lama_studi_semester" class="form-label">Lama Studi (dalam semester)</label>
                                    <input type="text" name="lama_studi_semester" class="form-control"
                                        value="{{ $skripsi->lama_studi_semester }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="scan_berita_acara_sidang_skripsi" class="form-label">Scan Berita
                                        Acara</label>
                                    @if ($skripsi->scan_berita_acara_sidang_skripsi)
                                        <br>
                                        <a href="{{ asset('storage/' . $skripsi->scan_berita_acara_sidang_skripsi) }}"
                                            target="_blank">Lihat Scan Berita Acara
                                            Sebelumnya</a>
                                    @endif
                                    {{-- <input class="form-control" type="file" name="scan_berita_acara_sidang_skripsi"> --}}
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('dosenWali.verifikasi.skripsi.show', ['id' => $skripsi->id]) }}"
                                    class="btn btn-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
