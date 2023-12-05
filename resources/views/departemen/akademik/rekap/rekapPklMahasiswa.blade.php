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
        <span class="navbar-brand">Rekap PKL Mahasiswa</span>
        <form action="/logout" method="post" class="navbar-brand">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </nav>

    <aside>
        <div class="sidenav" id="mySidenav">
            <h2 style="color: #fff; text-align: center; padding: 15px;">Departemen</h2>
            <a href="{{ route('departemen.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('departemen.profile') }}"><i class="fa fa-user-circle-o"></i>
                Profile</a>
            <a href="{{ route('departemen.akademik') }}"><i class="fa fa-user"></i>
                Akademik</a>
            <ul>
                <li>
                    <a href="{{ route('departemen.akademik.search') }}"><i class="fa fa-user"></i>
                        Pencarian Mahasiswa</a>
                </li>
                <li>
                    <a href="{{ route('departemen.rekap.pkl') }}"><i class="fa fa-user"></i>
                        Rekap PKL Mahasiswa</a>
                </li>
                <li>
                    <a href="{{ route('departemen.rekap.skripsi') }}"><i class="fa fa-user"></i>
                        Rekap Skripsi Mahasiswa</a>
                </li>
                <li>
                    <a href="{{ route('departemen.rekap.status') }}"><i class="fa fa-user"></i>
                        Rekap Status Mahasiswa</a>
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="content" id="content">
            <div id="biodata" class="feature-content">
                <div class="container mt-5">
                    <div class="card">
                        <h2 class="text-center mt-3 mb-3">Rekap Progress PKL Mahasiswa</h2>
                        <div class="table-container mt-4">
                            <div class="table-responsive">
                                <div class="box" style="background-color: black; width: auto; height: 2px"></div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <h2 class="text-center mb-3">Angkatan</h2>
                                            <div class="box" style="background-color: black; width: auto; height: 2px"></div>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center">2016</td>
                                            <td colspan="2" class="text-center">2017</td>
                                            <td colspan="2" class="text-center">2018</td>
                                            <td colspan="2" class="text-center">2019</td>
                                            <td colspan="2" class="text-center">2020</td>
                                            <td colspan="2" class="text-center">2021</td>
                                            <td colspan="2" class="text-center">2022</td>
                                            <td colspan="2" class="text-center">2023</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Sudah</td>
                                            <td class="text-center">Belum</td>
                                            <td class="text-center">Sudah</td>
                                            <td class="text-center">Belum</td>
                                            <td class="text-center">Sudah</td>
                                            <td class="text-center">Belum</td>
                                            <td class="text-center">Sudah</td>
                                            <td class="text-center">Belum</td>
                                            <td class="text-center">Sudah</td>
                                            <td class="text-center">Belum</td>
                                            <td class="text-center">Sudah</td>
                                            <td class="text-center">Belum</td>
                                            <td class="text-center">Sudah</td>
                                            <td class="text-center">Belum</td>
                                            <td class="text-center">Sudah</td>
                                            <td class="text-center">Belum</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><a class="btn btn-link">45</a></td>
                                            <td class="text-center"><a class="btn btn-link">87</a></td>
                                            <td class="text-center"><a class="btn btn-link">45</a></td>
                                            <td class="text-center"><a class="btn btn-link">87</a></td>
                                            <td class="text-center"><a class="btn btn-link">45</a></td>
                                            <td class="text-center"><a class="btn btn-link">87</a></td>
                                            <td class="text-center"><a class="btn btn-link">45</a></td>
                                            <td class="text-center"><a class="btn btn-link">87</a></td>
                                            <td class="text-center"><a class="btn btn-link">45</a></td>
                                            <td class="text-center"><a class="btn btn-link">87</a></td>
                                            <td class="text-center"><a class="btn btn-link">45</a></td>
                                            <td class="text-center"><a class="btn btn-link">87</a></td>
                                            <td class="text-center"><a class="btn btn-link">45</a></td>
                                            <td class="text-center"><a class="btn btn-link">87</a></td>
                                            <td class="text-center"><a class="btn btn-link">45</a></td>
                                            <td class="text-center"><a class="btn btn-link">87</a></td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mt-3" type="submit" style="float: right">Cetak</button>
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