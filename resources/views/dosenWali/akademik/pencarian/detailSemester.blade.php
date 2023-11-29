@extends('layouts.main')

@section('contents')

    <head>
        <title>Flexbox Layout</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .sidenav {
                height: 100%;
                width: 250px;
                position: fixed;
                z-index: 1;
                top: 0;
                left: -250px;
                /* Semula sidenav tersembunyi */
                background-color: #333;
                padding-top: 20px;
                transition: left 0.3s;
            }

            .sidenav a {
                padding: 10px 15px;
                text-align: left;
                text-decoration: none;
                font-size: 16px;
                color: white;
                display: block;
            }

            .sidenav a:hover {
                background-color: #555;
            }

            .sidenav a:active {
                border: 1px solid;
                background-color: #000;
            }

            .content {
                margin-left: 0;
                padding: 20px;
                transition: margin-left 0.3s;
            }

            .sidenav.active {
                left: 0;
                /* Menampilkan sidenav saat active */
            }

            .content.active {
                margin-left: 250px;
                /* Geser konten saat active */
            }

            .navbar-toggler {
                color: #fff;
            }

            .navbar-toggle-btn {
                padding: 5px 15px;
                font-size: 24px;
                color: white;
                cursor: pointer;
                z-index: 2;
            }

            .navbar.active {
                margin-left: 250px;
                transition: margin-left 0.3s;
            }

            .navbar-brand {
                font-weight: 600;
            }

            .flex-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                margin-top: 20px;
                gap: 10px;
            }

            .flex-item {
                width: calc(20% - 20px);
                height: 80px;
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 18px;
                font-weight: bold;
            }

            img {
                width: 200px;
                height: 200px;
            }

            .box-with-text {
                display: flex;

            }

            .box {

                width: 20px;
                height: 20px;
                background-color: #3498db;
            }

            .text {
                margin-left: 10px;
                font-size: 18px;
                color: #333;
            }
        </style>
    </head>

    <body>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <nav class="navbar navbar-dark bg-dark">
            <div class="navbar-toggle-btn" id="toggleSidenav">
                <i class="fa fa-bars"></i>
            </div>
            <span class="navbar-brand">Dashboard</span>
            <form action="/logout" method="post" class="navbar-brand">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </nav>

        <div class="sidenav" id="mySidenav">

            <h2 style="color: #fff; text-align: center; padding: 15px;">Dosen Wali</h2>
            <a href="{{ route('dosenWali.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('dosenWali.akademik.index') }}"><i class="fa fa-user"></i>
                Akademik</a>
                <ul>
                    <li>
                        <a href="{{ route('dosenWali.verifikasi.irs') }}"><i class="fa fa-user"></i>
                            Rekap PKL Mahasiswa</a>
                    </li>
                    <li>
                        <a href="{{ route('dosenWali.verifikasi.khs') }}"><i class="fa fa-user"></i>
                            Rekap Skripsi Mahasiswa</a>
                    </li>
                    <li>
                        <a href="{{ route('dosenWali.verifikasi.pkl') }}"><i class="fa fa-user"></i>
                            Rekap Status Mahasiswa</a>
                    </li>
                </ul>
            <a href="{{ route('dosenWali.verifikasi.irs') }}"><i class="fa fa-user"></i>
                Verifikasi Progress Studi</a>
            <ul>
                <li>
                    <a href="{{ route('dosenWali.verifikasi.irs') }}"><i class="fa fa-user"></i>
                        IRS</a>
                </li>
                <li>
                    <a href="{{ route('dosenWali.verifikasi.khs') }}"><i class="fa fa-user"></i>
                        KHS</a>
                </li>
                <li>
                    <a href="{{ route('dosenWali.verifikasi.pkl') }}"><i class="fa fa-user"></i>
                        PKL</a>
                </li>
                <li>
                    <a href="{{ route('dosenWali.verifikasi.skripsi') }}"><i class="fa fa-user"></i>
                        Skripsi</a>
                </li>
            </ul>
        </div>

        <div class="content" id="content">
            <div id="dashboard" class="feature-content">
                <div class="container mt-5">
                    <div class="card">
                        <div class="container mt-4">
                            <h2 class="text-center mb-3">Progress Perkembangan Studi Mahasiswa Informatika</h2>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ URL::asset('images/image1.jpg') }}" alt="Foto Mahasiswa"
                                                class="img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                            <table class="table mt-4">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama:</td>
                                                        <td>Rizky Akhmad Fahreza</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIM:</td>
                                                        <td>24060121130021</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Angkatan:</td>
                                                        <td>2021</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dosen Wali:</td>
                                                        <td>Darrel Arsa Putranto</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="flex-container">
                                <div class="flex-item" style="background-color:steelblue">1</div>
                                <div class="flex-item" style="background-color:steelblue">2</div>
                                <div class="flex-item" style="background-color:steelblue">3</div>
                                <div class="flex-item" style="background-color:steelblue">4</div>
                                <div class="flex-item" style="background-color:steelblue">5</div>
                                <div class="flex-item" style="background-color:gold">6</div>
                                <div class="flex-item" style="background-color:steelblue">7</div>
                                <div class="flex-item" style="background-color:green">8</div>
                                <div class="flex-item" style="background-color:red">9</div>
                                <div class="flex-item" style="background-color:red">10</div>
                                <div class="flex-item" style="background-color:red">11</div>
                                <div class="flex-item" style="background-color:red">12</div>
                                <div class="flex-item" style="background-color:red">13</div>
                                <div class="flex-item" style="background-color:red">14</div>
                                <div class="flex-item" style="background-color:black"></div>
                            </div> --}}

                            {{-- yang bener --}}
                            <div class="flex-container">
                                <a href="#" class="flex-item" style="background-color:steelblue">1</a>
                                <a href="#" class="flex-item" style="background-color:steelblue">2</a>
                                <a href="#" class="flex-item" style="background-color:steelblue">3</a>
                                <a href="#" class="flex-item" style="background-color:steelblue">4</a>
                                <a href="#" class="flex-item" style="background-color:steelblue">5</a>
                                <a href="#" class="flex-item" style="background-color:gold">6</a>
                                <a href="#" class="flex-item" style="background-color:steelblue">7</a>
                                <a href="#" class="flex-item" style="background-color:green">8</a>
                                <a href="#" class="flex-item" style="background-color:red">9</a>
                                <a href="#" class="flex-item" style="background-color:red">10</a>
                                <a href="#" class="flex-item" style="background-color:red">11</a>
                                <a href="#" class="flex-item" style="background-color:red">12</a>
                                <a href="#" class="flex-item" style="background-color:red">13</a>
                                <a href="#" class="flex-item" style="background-color:red">14</a>
                                <a href="#" class="flex-item" style="background-color:black"></a>
                            </div>

                            <div class="container mt-5">
                                <div class="card">
                                    <div class="container">
                                        <div class="mb-3">
                                            Keterangan</div>

                                        <div class="box-with-text">
                                            <div class="box" style="background-color: red"></div>
                                            <p class="text">Belum diisikan (IRS dan KHS) atau tidak digunakan</p>
                                        </div>
                                        <div class="box-with-text">
                                            <div class="box" style="background-color: steelblue"></div>
                                            <p class="text">Sudah diisikan (IRS dan KHS)</p>
                                        </div>
                                        <div class="box-with-text">
                                            <div class="box" style="background-color: gold"></div>
                                            <p class="text">Sudah Lulus PKL (IRS, KHS, dan PKL)</p>
                                        </div>
                                        <div class="box-with-text">
                                            <div class="box" style="background-color: green"></div>
                                            <p class="text">Sudah Lulus Skripsi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Tampilkan konten Dashboard secara otomatis saat halaman dimuat
            window.onload = function() {
                showFeature('dashboard');
            };

            document.getElementById('toggleSidenav').addEventListener('click', function() {
                document.getElementById('mySidenav').classList.toggle('active');
                document.getElementsByClassName('content')[0].classList.toggle('active');
                document.getElementsByClassName('navbar')[0].classList.toggle('active');
            });

            function showFeature(feature) {
                const featureContents = document.querySelectorAll('.feature-content');
                featureContents.forEach(content => {
                    content.style.display = 'none';
                });

                const contentToShow = document.getElementById(feature);
                contentToShow.style.display = 'block';
            }
        </script>

    </body>

    </html>
