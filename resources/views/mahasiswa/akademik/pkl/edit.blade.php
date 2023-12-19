@extends('layouts.templateMahasiswa', ['title' => 'Edit PKL'])

@section('contents')
<main>

    <div class="mx-auto py-6 sm:px-6 lg:px-8">
        <div class="container px-4 py-5 mt-5">
            <div class="card text">
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
                                    <h1 class="mb-0">Unggah Ulang Berkas PKL</h1>
                                </div>
                                <hr />
                                <form action="{{ route('mahasiswa.dashboard.akademik.pkl.update', ['id' => $pkl->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <div class="form-group mb-3">
                                            <label for="semester" class="form-label">Semester</label>
                                            <input type="text" name="semester" class="form-control" value="{{ $pkl->semester }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="nilai_pkl" class="form-label">Nilai PKL</label>
                                            <input type="text" name="nilai_pkl" class="form-control" value="{{ $pkl->nilai_pkl }}">
                                        </div>
                                        <label for="scan_berita_acara_seminar_pkl" class="form-label">Scan Berita Acara</label>
                                        @if ($pkl->scan_berita_acara_seminar_pkl)
                                        <br>
                                        <a href="{{ asset('storage/' . $pkl->scan_berita_acara_seminar_pkl) }}" target="_blank">Lihat Scan Berita Acara
                                            Sebelumnya</a>
                                        @endif
                                        <input class="form-control" type="file" name="scan_berita_acara_seminar_pkl">
                                    </div>
                                    <button type="submit" class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                                    <a href="{{ route('mahasiswa.dashboard.akademik.pkl') }}" class="btn btn-danger">Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection