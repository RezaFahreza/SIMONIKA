@extends('layouts.main')

@section('contents')
<div class="container mt-5">
    <div class="card">
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="irs-tab" data-toggle="tab" href="#irs">IRS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="khs-tab" data-toggle="tab" href="#khs">KHS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pkl-tab" data-toggle="tab" href="#pkl">PKL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="skripsi-tab" data-toggle="tab" href="#skripsi">Skripsi</a>
            </li>
        </ul>
        <h2 class="text-center">Profil Mahasiswa</h2>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ URL::asset('images/image1.jpg') }}" alt="Foto Mahasiswa" class="img-fluid">

                </div>
                <div class="col-md-8">
                    <h3>Risqy</h3>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama:</td>
                                <td>{{ $mahasiswa->nama }}</td>
                            </tr>
                            <tr>
                                <td>NIM:</td>
                                <td>{{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr>
                                <td>Alamat:</td>
                                <td>{{ $mahasiswa->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Kab/Kota:</td>
                                <td>{{ $mahasiswa->kab_kota }}</td>
                            </tr>
                            <tr>
                                <td>Propinsi:</td>
                                <td>{{ $mahasiswa->propinsi }}</td>
                            </tr>
                            <tr>
                                <td>Angkatan:</td>
                                <td>{{ $mahasiswa->angkatan }}</td>
                            </tr>
                            <tr>
                                <td>Jalur Masuk:</td>
                                <td>{{ $mahasiswa->jalur_masuk }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $mahasiswa->email }}</td>
                            </tr>
                            <tr>
                                <td>Handphone:</td>
                                <td>{{ $mahasiswa->handphone }}</td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td>{{ $mahasiswa->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection