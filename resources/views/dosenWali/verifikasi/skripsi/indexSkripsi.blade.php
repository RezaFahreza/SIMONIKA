@extends('layouts.templateDosenWali', ['title' => 'Tampilan Skripsi'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-5">
                <div class="card">
                    <h2 class="text-center mt-3">Daftar Skripsi Mahasiswa Menunggu Validasi</h2>
                    <div class="card-body">
                        <hr />
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Semester</th>
                                    <th>Status Validasi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($skripsiMahasiswa->count() > 0)
                                @foreach ($skripsiMahasiswa as $skripsi)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $skripsi->mahasiswa_id }}</td>
                                    <td class="align-middle">{{ $skripsi->nama }}</td>
                                    <td class="align-middle">{{ $skripsi->semester }}</td>
                                    <td class="align-middle">{{ $skripsi->status_validasi }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('dosenWali.verifikasi.skripsi.show', ['id' => $skripsi->id]) }}" type="button" class="btn btn-link">Detail</a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="7">Skripsi tidak Ditemukan</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection