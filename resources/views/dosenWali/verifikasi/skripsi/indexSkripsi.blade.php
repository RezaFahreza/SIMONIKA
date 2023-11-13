@extends('layouts.main')

@section('contents')
    <div class="container mt-5">
        <a href="{{ route('dosenWali.dashboard') }}" class="btn btn-primary">Kembali Ke
                    Dashboard</a>
        <div class="card">
            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link" id="irs-tab" data-toggle="tab" href="{{route('dosenWali.verifikasi.irs',['dosenWali' => $dosenWali])}}">IRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="khs-tab" data-toggle="tab" href="{{route('dosenWali.verifikasi.khs',['dosenWali' => $dosenWali])}}">KHS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pkl-tab" data-toggle="tab" href="{{route('dosenWali.verifikasi.pkl',['dosenWali' => $dosenWali])}}">PKL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="skripsi-tab" data-toggle="tab" href="{{route('dosenWali.verifikasi.skripsi',['dosenWali' => $dosenWali])}}">Skripsi</a>
                </li>
            </ul>
            <h2 class="text-center">Daftar Skripsi Mahasiswa</h2>
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
                                            <a href="{{ route('dosenWali.verifikasi.skripsi.show',['id' => $skripsi->id]) }}"
                                                type="button" class="btn btn-link">Detail</a>
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
@endsection
