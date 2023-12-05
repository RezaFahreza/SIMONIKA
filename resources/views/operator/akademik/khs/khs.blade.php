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

        @media (max-width: 768px) {
            table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }

            table th,
            table td {
                padding: 0.75rem;
                text-align: center;
            }
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
        <span class="navbar-brand">KHS Mahasiswa</span>
        <form action="/logout" method="post" class="navbar-brand">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </nav>

    <aside>
        <div class="sidenav" id="mySidenav">
            <h2 style="color: #fff; text-align: center; padding: 15px;">Operator</h2>
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
    </aside>

    <main>
        <div class="content" id="content">
            <div id="dashboard" class="feature-content">
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
                                <a class="nav-link active" id="khs-tab" data-toggle="tab" href="#khs">KHS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pkl-tab" data-toggle="tab" href="#pkl">PKL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="skripsi-tab" data-toggle="tab" href="#skripsi">Skripsi</a>
                            </li>
                        </ul>
                        <h4 class="text-center mt-3">KHS</h4>
                        <div class="card-body">
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
                </div>
            </div>
        </div>
    </main>

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