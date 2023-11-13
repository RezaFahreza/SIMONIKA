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
                            <h1 class="mb-3">Edit pkl</h1>
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form
                                action="{{ route('dosenWali.verifikasi.pkl.update', ['id' => $pkl->id]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <div class="form-group mb-3">
                                        <label for="semester" class="form-label">Semester</label>
                                        <input type="text" name="semester" class="form-control"
                                            value="{{ $pkl->semester }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nilai_pkl" class="form-label">Nilai PKL</label>
                                        <input type="text" name="nilai_pkl" class="form-control"
                                            value="{{ $pkl->nilai_pkl }}">
                                    </div>
                                    <label for="scan_berita_acara_seminar_pkl" class="form-label">Scan Berita Acara</label>
                                    @if ($pkl->scan_berita_acara_seminar_pkl)
                                        <br>
                                        <a href="{{ asset('storage/' . $pkl->scan_berita_acara_seminar_pkl) }}"
                                            target="_blank">Lihat Scan Berita Acara
                                            Sebelumnya</a>
                                    @endif
                                    <input class="form-control" type="file" name="scan_berita_acara_seminar_pkl">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('dosenWali.verifikasi.pkl.show', ['id' => $pkl->id]) }}"
                                    class="btn btn-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
