@extends('layouts.main')

@section('contents')
    <div class="container mt-5">

        <div class="card">
            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="irs-tab" data-toggle="tab" href="#irs">IRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="khs-tab" data-toggle="tab" href="#khs">KHS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="pkl-tab" data-toggle="tab" href="#pkl">PKL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="skripsi-tab" data-toggle="tab" href="#skripsi">Skripsi</a>
                </li>
            </ul>
            <h4 class="text-center mt-3">PKL</h4>
            <div class="card-body">
                <div class="row">
                    {{-- kalau status = "Lulus" --}}
                    <div class="col-md-8">
                        <h3>Risqy</h3>
                        <h3>24060121100000</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Berkas PKL:</td>
                                    <td>PKL.pdf</td>
                                </tr>
                                <tr>
                                    <td>Nilai:</td>
                                    <td>A</td>
                                </tr>
                                <!-- Tambahkan elemen data PKL sesuai kebutuhan -->
                                <tr>
                                    <td>Status PKL:</td>
                                    <td>Lulus</td>
                                </tr>
                                <!-- Tambahkan elemen data validasi PKL sesuai kebutuhan -->

                            </tbody>
                        </table>
                        <button class="btn btn-success">Approve</button>
                        <button class="btn btn-danger">Tolak</button>
                    </div>

                    {{-- kalau status = "sedang ambil" --}}
                    {{-- <div class="col-md-8">
                        <h3>Risqy</h3>
                        <h3>24060121100000</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Berkas PKL:</td>
                                    <td>ProgresPKL.pdf</td>
                                </tr>
                                
                                <!-- Tambahkan elemen data PKL sesuai kebutuhan -->
                                <tr>
                                    <td>Status PKL:</td>
                                    <td>Sedang Ambil</td>
                                </tr>
                                <!-- Tambahkan elemen data validasi PKL sesuai kebutuhan -->

                            </tbody>
                        </table>
                        <button class="btn btn-success">Verifikasi</button>
                        <button class="btn btn-danger">Tolak</button>
                    </div> --}}

                    {{-- kalau status = "belum ambil" --}}
                    {{-- <div class="col text-center">
                        <p>Mahasiswa belum mengambil PKL</p>
                    </div> --}}
                </div>
                
                
            </div>
        </div>
    </div>
@endsection
