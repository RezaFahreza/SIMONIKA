@extends('layouts.templateDosenWali', ['title' => 'Edit KHS'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-5">
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
                        <h1 class="mb-3">Edit KHS</h1>
                        <form action="{{ route('dosenWali.verifikasi.khs.update', ['id' => $khs->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="semester_aktif">Semester Aktif</label>
                                <input type="text" name="semester_aktif" class="form-control" value="{{ $khs->semester_aktif }}">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_sks_semester">Jumlah SKS semester</label>
                                <input type="text" name="jumlah_sks_semester" class="form-control" value="{{ $khs->jumlah_sks_semester }}">
                            </div>
                            <div class="form-group">
                                <label for="sks_kumulatif">SKS Kumulatif</label>
                                <input type="text" name="sks_kumulatif" class="form-control" value="{{ $khs->sks_kumulatif }}">
                            </div>
                            <div class="form-group">
                                <label for="ip_semester">IP Semester</label>
                                <input type="text" name="ip_semester" class="form-control" value="{{ $khs->ip_semester }}">
                            </div>
                            <div class="form-group">
                                <label for="ip_kumulatif">IP Kumulatif</label>
                                <input type="text" name="ip_kumulatif" class="form-control" value="{{ $khs->ip_kumulatif }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="scan_khs" class="form-label">Scan khs</label>
                                @if ($khs->scan_khs)
                                <br>
                                <a href="{{ asset('storage/' . $khs->scan_khs) }}" target="_blank">Lihat Scan khs
                                    Sebelumnya</a>
                                @endif
                                <input class="form-control" type="file" name="scan_khs">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('dosenWali.verifikasi.khs.show', ['id' => $khs->id, 'mahasiswa_id' => $khs->mahasiswa_id]) }}" class="btn btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection