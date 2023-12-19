@extends('layouts.templateDosenWali', ['title' => 'Tampilan IRS'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-5">
                <div class="card">
                    <h2 class="text-center mt-3">Daftar IRS Mahasiswa Menunggu Validasi</h2>
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
                                @if ($irsMahasiswa->count() > 0)
                                @foreach ($irsMahasiswa as $irs)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $irs->mahasiswa_id }}</td>
                                    <td class="align-middle">{{ $irs->nama }}</td>
                                    <td class="align-middle">{{ $irs->semester_aktif }}</td>
                                    <td class="align-middle">{{ $irs->status_validasi }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('dosenWali.verifikasi.irs.show', ['id' => $irs->id]) }}" type="button" class="btn btn-link">Detail</a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="7">IRS tidak Ditemukan</td>
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