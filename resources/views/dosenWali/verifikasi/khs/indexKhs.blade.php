@extends('layouts.main')

@section('contents')
    <div class="container mt-5">
        <a href="{{ route('dosenWali.dashboard') }}" class="btn btn-primary">Kembali Ke
                    Dashboard</a>
        <div class="card">
            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link" id="irs-tab" data-toggle="tab" href="{{route('dosenWali.verifikasi.irs')}}">IRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="khs-tab" data-toggle="tab" href="{{route('dosenWali.verifikasi.khs')}}">KHS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pkl-tab" data-toggle="tab" href="{{route('dosenWali.verifikasi.pkl')}}">PKL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="skripsi-tab" data-toggle="tab" href="{{route('dosenWali.verifikasi.skripsi')}}">Skripsi</a>
                </li>
            </ul>
            <h2 class="text-center">Daftar KHS Mahasiswa</h2>
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
                                            <a href="{{route('dosenWali.verifikasi.khs.show',['id'=>$khs->id])}}"
                                                type="button" class="btn btn-link">Detail</a>
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
@endsection
