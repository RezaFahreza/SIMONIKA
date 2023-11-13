@extends('layouts.main')

@section('contents')
    <div class="container">
        <h2>Selamat Datang Dosen Wali</h2>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
            <a href="{{ route('dosenWali.dashboard.akademik', ['dosenWali' => $dosenWali]) }}"
                class="btn btn-primary">Akademik</a>
            <a href="{{ route('dosenWali.verifikasi.irs') }}"
                class="btn btn-primary">Verifikasi Progress Studi</a>
        </form>
        <h3>Data Dosen</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $dosenWali->nip }}</td>
                    <td>{{ $dosenWali->nama }}</td>
                    <td>{{ $dosenWali->email }} </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
