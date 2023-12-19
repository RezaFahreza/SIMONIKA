@extends('layouts.templateDosenWali', ['title' => 'Tampilan KHS'])

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
                                            <th>Jumlah SKS Diambil</th>
                                            <td>{{ $khs->jumlah_sks_semester }}</td>
                                        </tr>
                                        <th>SKS Kumulatif</th>
                                        <td>{{ $khs->sks_kumulatif }}</td>
                                        </tr>
                                        <th>IP Semester</th>
                                        <td>{{ $khs->ip_semester }}</td>
                                        </tr>
                                        <th>IP Kumulatif</th>
                                        <td>{{ $khs->ip_kumulatif }}</td>
                                        </tr>
                                        <tr>
                                            <th>Scan khs</th>
                                            <td>
                                                <a href="{{ asset('storage/' . $khs->scan_khs) }}" target="_blank">Lihat Scan
                                                    khs</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status Validasi</th>
                                            <td>{{ $khs->status_validasi }}</td>
                                        </tr>
                                    </table>
                                    @if ($khs->status_validasi == 'PENDING')
                                    <form action="{{ route('dosenWali.verifikasi.khs.validate', ['id' => $khs->id]) }}" , method="POST">
                                        @csrf
                                        @method('PUT')
                                        <a href="{{ route('dosenWali.verifikasi.khs.edit', ['id' => $khs->id]) }}" class="btn btn-warning">Edit Entri</a>
                                        <button type="submit" class="btn btn-success">Validasi Entri</button>
                                        @endif
                                    </form>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ route('dosenWali.verifikasi.khs') }}" class="btn btn-danger">Kembali</a>

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