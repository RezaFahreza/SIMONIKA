@extends('layouts.templateMahasiswa', ['title' => 'Edit Skripsi'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-5">
                <div class="card text">
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
                                <select name="semester" id="semester" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-dark rounded-lg bg-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @for ($i = 1; $i <= 14; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
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
                            <button type="submit" class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                            <a href="{{ route('mahasiswa.dashboard.akademik.skripsi') }}" class="btn btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection