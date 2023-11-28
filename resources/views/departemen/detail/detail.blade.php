@extends('layouts.main')

@section('contents')
<div class="container mt-5">
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
                <div class="tab-content" id="myTabsContent">
                    <div class="tab-pane fade show active" id="profile">
                        <!-- <h2 class="mt-5">Profil Mahasiswa</h2> -->
                        <div class="container mt-5">
                            <h2>Profil Mahasiswa</h2>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{URL::asset('images/image1.jpg')}}" alt="Foto Mahasiswa" class="img-fluid">
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

                    </div>
                    <div class="tab-pane fade" id="irs">

                        <div class="container mt-5">
                            <h4>Verifikasi IRS</h4>

                            <!-- Tabel IRS -->
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Semester</th>
                                        <th>Jumlah SKS</th>
                                        <th>File IRS</th>
                                        <th>Status Validasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Semester 1</td>
                                        <td>20</td>
                                        <td><a href="irs_file.pdf" target="_blank">IRS.pdf</a></td>
                                        <td>Belum divalidasi</td>
                                        <td>
                                            <button class="btn btn-success">Approve</button>
                                            <button class="btn btn-danger">Tolak</button>
                                        </td>
                                    </tr>
                                    <!-- Tambahkan baris lainnya sesuai data IRS yang perlu divalidasi -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="khs">

                        <div class="container mt-5">
                            <h4>Verifikasi KHS</h4>

                            <!-- Tabel KHS -->
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Semester</th>
                                        <th>Jumlah SKS</th>
                                        <th>File KHS</th>
                                        <th>Status Validasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Semester 1</td>
                                        <td>20</td>
                                        <td><a href="khs_file.pdf" target="_blank">KHS.pdf</a></td>
                                        <td>Belum divalidasi</td>
                                        <td>
                                            <button class="btn btn-success">Approve</button>
                                            <button class="btn btn-danger">Tolak</button>
                                        </td>
                                    </tr>
                                    <!-- Tambahkan baris lainnya sesuai data IRS yang perlu divalidasi -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pkl">


                        <div class="container mt-5">
                            <h4>Verifikasi PKL</h4>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- <div class="col-md-4">
                                            <img src="{{URL::asset('images/image1.jpg')}}" alt="Foto Mahasiswa" class="img-fluid">
                                        </div> -->
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="skripsi">
                        <div class="container mt-5">
                            <h4>Verifikasi Skripsi</h4>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- <div class="col-md-4">
                                            <img src="{{URL::asset('images/image1.jpg')}}" alt="Foto Mahasiswa" class="img-fluid">
                                        </div> -->
                                        <div class="col-md-8">
                                            <h3>Risqy</h3>
                                            <h3>24060121100000</h3>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Berkas Skripsi:</td>
                                                        <td>Skripsi.pdf</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nilai:</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <!-- Tambahkan elemen data Skripsi sesuai kebutuhan -->
                                                    <tr>
                                                        <td>Status Skripsi:</td>
                                                        <td>Lulus</td>
                                                    </tr>
                                                    <!-- Tambahkan elemen data validasi Skripsi sesuai kebutuhan -->

                                                </tbody>
                                            </table>
                                            <button class="btn btn-success">Approve</button>
                                            <button class="btn btn-danger">Tolak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script>
                $('#myTabs a').on('click', function(e) {
                    e.preventDefault()
                    $(this).tab('show')
                })
            </script>
@endsection