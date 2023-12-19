@extends('layouts.templateMahasiswa', ['title' => 'PKL'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-5">
                <div class="card text">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.irs') }}">IRS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.khs') }}">KHS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.pkl') }}">PKL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.skripsi') }}">Skripsi</a>
                            </li>

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
                                        <h1 class="mb-3">Unggah Berkas PKL</h1>
                                    </div>
                                    <hr />
                                    <form action="{{ route('mahasiswa.dashboard.akademik.pkl.storeBerkas', ['id' => $pkl->id]) }}" method="post" enctype="multipart/form-data" class="mt-3">
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
                                            <label for="nilai_pkl" class="form-label">Nilai PKL</label>
                                            <input type="text" name="nilai_pkl" class="form-control" value="">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="scan_berita_acara_seminar_pkl" class="form-label">Scan Berita
                                                Acara</label>
                                            <input class="form-control" type="file" name="scan_berita_acara_seminar_pkl">
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                                        </div>
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
                                                <a href="{{ asset('storage/' . $pkl->scan_berita_acara_seminar_pkl) }}" target="_blank">Lihat Scan PKL</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status Validasi</th>
                                            <td>{{ $pkl->status_validasi }}</td>
                                        </tr>
                                    </table>
                                    <a href="{{ route('mahasiswa.dashboard.akademik.pkl.edit', ['id' => $pkl->id]) }}" class="btn btn-warning">Edit Entri</a>
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
                                                <a href="{{ asset('storage/' . $pkl->scan_berita_acara_seminar_pkl) }}" target="_blank">Lihat Scan PKL</a>
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
            </div>
        </div>
    </div>
</main>
@endsection