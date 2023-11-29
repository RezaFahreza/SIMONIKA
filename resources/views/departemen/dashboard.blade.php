@extends('layouts.main')

@section('contents')

    <head>
        <title>Dashboard Dosen Wali</title>
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
            <span class="navbar-brand">Dashboard</span>
            <form action="/logout" method="post" class="navbar-brand">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </nav>

        <div class="sidenav" id="mySidenav">

            <h2 style="color: #fff; text-align: center; padding: 15px;">Departemen</h2>
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
                <div class="container">
                    <h3 class="text-center mt-3">Dashboard Departemen</h3>
                    <div class="mx-auto py-6 sm:px-6 lg:px-8">
                        <div class="container px-4 py-5">
                            <div class="card px-4 py-2">
                                <div class="row gx-4 gy-2 align-items-center">
                                    <div class="col-3">
                                        <img class="h-12 w-12 rounded-circle bg-gray-50"
                                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="foto profile">
                                    </div>
                                    <div class="col ml-4">
                                        <p class="text-sm font-semibold text-gray-900">Darril</p>
                                        <p class="mt-1 text-xs text-gray-500">darril@gmail.com</p>
                                        <p class="text-sm font-weight-bold text-gray-900">Departemen</p>
                                        <p class="mt-1 text-xs text-gray-500">Informatika</p>
                                    </div>
                                </div>
                            </div>

                            <h2 class="mt-4 text-3xl font-bold text-gray-900 mb-4">Menu</h2>

                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                <div class="col">
                                    <div class="card">
                                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg"
                                            alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                                            class="card-img-top">
                                        <div class="card-body text-center">
                                            <a href="#" class="card-title">Profile</a>
                                            <p class="card-text text-gray-600">Edit Profile</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg"
                                            alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant."
                                            class="card-img-top">
                                        <div class="card-body text-center">
                                            <a href="{{route('departemen.akademik')}}" class="card-title">Akademik</a>
                                            <p class="card-text text-gray-600">IRS, PKL, PKL, Skripsi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-03.jpg"
                                            alt="Collection of four insulated travel bottles on wooden shelf."
                                            class="card-img-top">
                                        <div class="card-body text-center">
                                            <a href="#" class="card-title">Verifikasi Progress Studi</a>
                                            <p class="card-text text-gray-600">Verifikasi Progress Studi Mahasiswa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="akademik" class="feature-content">

            </div>

            <div id="reports" class="feature-content">

            </div>

            <div id="settings" class="feature-content">


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
@endsection
