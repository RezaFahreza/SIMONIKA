@extends('layouts.main')

@section('contents')

    <head>
        <title>Akademik Mahasiswa</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            /* Atur gaya kustom di sini */
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
            <span class="navbar-brand">Akademik Mahasiswa</span>
            <form action="/logout" method="post" class="navbar-brand">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </nav>

        <div class="sidenav" id="mySidenav">

            <h2 style="color: #fff; text-align: center; padding: 15px;">Mahasiswa</h2>
            <a href=""><i class="fa fa-dashboard"></i> Biodata</a>
            <a href=""><i class="fa fa-user"></i> IRS</a>
            <a href=""><i class="fa fa-user"></i>KHS</a>
            <a href=""><i class="fa fa-user"></i> PKL</a>
            <a href=""><i class="fa fa-user"></i> Skripsi</a>
                
        </div>

            <div class="container mt-5">
                <div class="card">
                    <h2 class="text-center mt-3 mb-3">Daftar Mahasiswa yang Belum Lulus PKL</h2>
                    <div class="table-container mt-4">
                        <div class="table-responsive">
                        <div class="box" style="background-color: black; width: auto; height: 2px"></div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-center">No</td>
                                    <td class="text-center">Nim</td>
                                    <td class="text-center">Nama</td>
                                    <td class="text-center">Angkatan</td>
                                    <td class="text-center">Nilai</td>
                                </tr>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">24060121140153</td>
                                    <td class="text-center">Fikri Prasetya Nurhidayat</td>
                                    <td class="text-center">2020</td>
                                    <td class="text-center">50</td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3" type="submit" style="float: right">Cetak</button>
                            

            <div id="irs" class="feature-content">
                
            </div>

            <div id="khs" class="feature-content">
            </div>

            <div id="pkl" class="feature-content">
            </div>

            <div id="skripsi" class="feature-content">
            </div>

            <script>
                // Tampilkan konten Dashboard secara otomatis saat halaman dimuat
                window.onload = function() {
                    showFeature('biodata');
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
@endsection
