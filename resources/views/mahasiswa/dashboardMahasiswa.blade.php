@extends('layouts.main')

@section('contents')
    <div class="container">
        <h2>Selamat Datang Mahasiswa</h2>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
            <a href="{{route('mahasiswa.dashboard.akademik',['mahasiswa'=>$mahasiswa])}}" class="btn btn-primary">Akademik</a>
        </form>
        <h3>Data Mahasiswa</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>
                        @if ($mahasiswa->foto_mahasiswa)
                            <img src="{{ asset('storage/'.$mahasiswa->foto_mahasiswa) }}" alt="{{ $mahasiswa->nama }}" width="100">
                        @else
                            <p>Tidak ada foto</p>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
