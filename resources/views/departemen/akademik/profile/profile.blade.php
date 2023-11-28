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
                                    <td>NIM:</td>
                                    <td>123456</td>
                                </tr>
                                <tr>
                                    <td>Alamat:</td>
                                    <td>Jl. Contoh Alamat No. 123</td>
                                </tr>
                                <tr>
                                    <td>Kab/Kota:</td>
                                    <td>Contoh Kota</td>
                                </tr>
                                <tr>
                                    <td>Propinsi:</td>
                                    <td>Contoh Propinsi</td>
                                </tr>
                                <tr>
                                    <td>Angkatan:</td>
                                    <td>2020</td>
                                </tr>
                                <tr>
                                    <td>Jalur Masuk:</td>
                                    <td>SNMPTN</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>mahasiswa@email.com</td>
                                </tr>
                                <tr>
                                    <td>Handphone:</td>
                                    <td>081234567890</td>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td>Aktif</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
