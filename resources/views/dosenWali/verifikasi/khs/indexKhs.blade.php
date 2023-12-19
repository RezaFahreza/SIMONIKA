@extends('layouts.templateDosenWali', ['title' => 'Tampilan KHS'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-5">
                <div class="card">
                    <h2 class="text-center mt-3">Daftar KHS Mahasiswa Menunggu Validasi</h2>
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
                                    <th>Semester Aktif</th>
                                    <th>Status Validasi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($khsMahasiswa->count() > 0)
                                @foreach ($khsMahasiswa as $khs)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $khs->mahasiswa_id }}</td>
                                    <td class="align-middle">{{ $khs->nama }}</td>
                                    <td class="align-middle">{{ $khs->semester_aktif }}</td>
                                    <td class="align-middle">{{ $khs->status_validasi }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('dosenWali.verifikasi.khs.show', ['id' => $khs->id]) }}" type="button" class="btn btn-link">Detail</a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="7">KHS tidak Ditemukan</td>
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