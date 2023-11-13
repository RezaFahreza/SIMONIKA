@extends('layouts.main')

@section('contents')
    <div class="card text">
        <div class="card-header">
            <table class="table">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <td>{{ $dosenWali->nip }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $dosenWali->nama }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $dosenWali->email }} </td>
                    </tr>
                </thead>
                <a href="{{ route('dosenWali.dashboard') }}" class="btn btn-primary">Kembali Ke
                    Dashboard</a>
            </table>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <h2>Mahasiswa Perwalian</h2>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Angkatan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswaPerwalian as $mahasiswa)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $mahasiswa->nim }}</td>
                            <td class="align-middle">{{ $mahasiswa->nama }}</td>
                            <td class="align-middle">{{ $mahasiswa->angkatan }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('dosenWali.dashboard.akademik.perwalian',['dosenWali'=>$dosenWali, 'id'=>$mahasiswa->nim])}}"
                                        type="button" class="btn btn-link">Detail</a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
