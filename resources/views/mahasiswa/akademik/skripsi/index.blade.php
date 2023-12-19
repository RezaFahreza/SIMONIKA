@extends('layouts.templateMahasiswa', ['title' => 'Skripsi'])

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
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.pkl') }}">PKL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.skripsi') }}">Skripsi</a>
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
                                    @if ($skripsi->status == 'belum ambil')
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h1 class="mb-3">Unggah Berkas Skripsi</h1>
                                    </div>
                                    <hr />
                                    <form action="{{ route('mahasiswa.dashboard.akademik.skripsi.storeBerkas', ['id' => $skripsi->id]) }}" method="post" enctype="multipart/form-data" class="mt-3">
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
                                            <label for="nilai_skripsi" class="form-label">Nilai skripsi</label>
                                            <input type="text" name="nilai_skripsi" class="form-control" value="">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="tanggal_lulus_sidang" class="form-label">Tanggal Lulus
                                                Sidang</label>
                                            <input type="date" name="tanggal_lulus_sidang" class="form-control" value="">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="lama_studi_semester" class="form-label">Lama Studi
                                                Semester</label>
                                            <input type="text" name="lama_studi_semester" class="form-control" value="">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="scan_berita_acara_sidang_skripsi" class="form-label">Scan
                                                Berita Acara
                                                skripsi</label>
                                            <input class="form-control" type="file" name="scan_berita_acara_sidang_skripsi">
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                                        </div>
                                    </form>
                                    @elseif ($skripsi->status == 'lulus')
                                    @if ($skripsi->status_validasi == 'PENDING')
                                    <table class="table table-bordered">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h1 class="mb-0">Berkas skripsi</h1>
                                        </div>
                                        <hr />
                                        <tr>
                                            <th>Semester</th>
                                            <td>{{ $skripsi->semester }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nilai skripsi</th>
                                            <td>{{ $skripsi->nilai_skripsi }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lulus Sidang</th>
                                            <td>{{ $skripsi->tanggal_lulus_sidang }}</td>
                                        </tr>
                                        <tr>
                                            <th>Lama Studi Semester</th>
                                            <td>{{ $skripsi->lama_studi_semester }}</td>
                                        </tr>
                                        <tr>
                                            <th>Scan skripsi</th>
                                            <td>
                                                <a href="{{ asset('storage/' . $skripsi->scan_berita_acara_sidang_skripsi) }}" target="_blank">Lihat Scan skripsi</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status Validasi</th>
                                            <td>{{ $skripsi->status_validasi }}</td>
                                        </tr>
                                    </table>
                                    <a href="{{ route('mahasiswa.dashboard.akademik.skripsi.edit', ['id' => $skripsi->id]) }}" class="btn btn-warning">Edit Entri</a>
                                    @elseif($skripsi->status_validasi == 'DISETUJUI')
                                    <table class="table table-bordered">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h1 class="mb-0">Berkas skripsi</h1>
                                        </div>
                                        <hr />
                                        <tr>
                                            <th>Semester</th>
                                            <td>{{ $skripsi->semester }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nilai skripsi</th>
                                            <td>{{ $skripsi->nilai_skripsi }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lulus Sidang</th>
                                            <td>{{ $skripsi->tanggal_lulus_sidang }}</td>
                                        </tr>
                                        <tr>
                                            <th>Lama Studi Semester</th>
                                            <td>{{ $skripsi->lama_studi_semester }}</td>
                                        </tr>
                                        <tr>
                                            <th>Scan skripsi</th>
                                            <td>
                                                <a href="{{ asset('storage/' . $skripsi->scan_berita_acara_sidang_skripsi) }}" target="_blank">Lihat Scan skripsi</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status Validasi</th>
                                            <td>{{ $skripsi->status_validasi }}</td>
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