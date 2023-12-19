@extends('layouts.templateDosenWali', ['title' => 'Tampilan PKL'])

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
                                    <h1 class="mb-3">Detail pkl</h1>
                                    @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                    @endif
                                    <table class="table table-bordered">
                                        </tr>
                                        <th>Status </th>
                                        <td>{{ $pkl->status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Semester</th>
                                            <td>{{ $pkl->semester }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nilai PKL</th>
                                            <td>{{ $pkl->nilai_pkl }}</td>
                                        <tr>
                                            <th>Scan pkl</th>
                                            <td>
                                                <a href="{{ asset('storage/' . $pkl->scan_berita_acara_seminar_pkl) }}" target="_blank">Lihat Scan
                                                    pkl</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status Validasi</th>
                                            <td>{{ $pkl->status_validasi }}</td>
                                        </tr>
                                    </table>
                                    @if ($pkl->status_validasi == 'PENDING')
                                    <form action="{{ route('dosenWali.verifikasi.pkl.validate', ['id' => $pkl->id]) }}" , method="POST">
                                        @csrf
                                        @method('PUT')
                                        <a href="{{ route('dosenWali.verifikasi.pkl.edit', ['id' => $pkl->id]) }}" class="btn btn-warning">Edit Entri</a>
                                        <button type="submit" class="btn btn-success">Validasi Entri</button>
                                        @endif
                                    </form>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ route('dosenWali.verifikasi.pkl') }}" class="btn btn-danger">Kembali</a>

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