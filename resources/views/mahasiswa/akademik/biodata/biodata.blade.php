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
        <span class="navbar-brand">Biodata Mahasiswa</span>
        <form action="/logout" method="post" class="navbar-brand">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </nav>

    <aside>
        <div class="sidenav" id="mySidenav">
            <h2 style="color: #fff; text-align: center; padding: 15px;">Dashboard Mahasiswa</h2>
            <a href="{{ route('mahasiswa.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('mahasiswa.profile') }}"><i class="fa fa-user-circle-o"></i>
                Profile</a>
            <a href="#"><i class="fa fa-user"></i>
                Akademik</a>
            <ul>
                <li>
                    <a href="{{ route('mahasiswa.dashboard.akademik') }}"><i class="fa fa-dashboard"></i> Biodata</a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.dashboard.akademik.irs') }}"><i class="fa fa-user"></i>
                        IRS</a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.dashboard.akademik.khs') }}"><i class="fa fa-user"></i>
                        KHS</a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.dashboard.akademik.pkl') }}"><i class="fa fa-user"></i>
                        PKL</a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.dashboard.akademik.skripsi') }}"><i class="fa fa-user"></i>
                        Skripsi</a>
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="content" id="content">
            <div id="biodata" class="feature-content">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik') }}">Biodata Akademik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.irs') }}">IRS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.khs') }}">KHS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.pkl') }}">PKL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.skripsi') }}">Skripsi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="container mt-5">
                            <div class="card">
                                <h2 class="text-center mt-5">Biodata Mahasiswa</h2>
                                <div class="card-body mt-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ URL::asset('images/image1.jpg') }}" alt="Foto Mahasiswa" class="img-fluid">

                                        </div>
                                        <div class="col-md-8">
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

                    </div>
                </div>
            </div>
        </div>
    </main>

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