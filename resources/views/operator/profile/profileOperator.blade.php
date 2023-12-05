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
        <span class="navbar-brand">Profile Operator</span>
        <form action="/logout" method="post" class="navbar-brand">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </nav>

    <aside>
        <div class="sidenav" id="mySidenav">
            <h2 style="color: #fff; text-align: center; padding: 15px;">Operator</h2>
            <a href="{{ route('operator.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('operator.profile') }}"><i class="fa fa-user-circle-o"></i>
                Profile</a>
            <a href="{{ route('generate.user.mahasiswa') }}"><i class="fa fa-id-card"></i>
                Generate Akun Mahasiswa</a>
            <a href="#"><i class="fa fa-graduation-cap"></i>
                Akademik</a>
            <ul>
                <li>
                    <a href="#"><i class="fa fa-file-text"></i>
                        Rekap PKL Mahasiswa</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-file-text"></i>
                        Rekap Skripsi Mahasiswa</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-file-text"></i>
                        Rekap Status Mahasiswa</a>
                </li>
            </ul>
            <a href="#"><i class="fa fa-check"></i>
                Verifikasi Progress Studi</a>
            <ul>
                <li>
                    <a href="#"><i class="fa fa-file-text"></i>
                        IRS</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-file-text"></i>
                        KHS</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-file-text"></i>
                        PKL</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-file-text"></i>
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
                        <h2 class="text-center mt-3">Profile Operator</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('images/image1.jpg') }}" alt="Foto Mahasiswa" class="img-fluid">

                                </div>
                                <div class="col-md-8">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Nama:</td>
                                                <td>Risqy</td>
                                            </tr>
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
                    <button class="btn btn-primary" type="submit" style="float: right">Edit</button>
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