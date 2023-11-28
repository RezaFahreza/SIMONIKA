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
        <nav class="navbar navbar-dark bg-dark">
            <div class="navbar-toggle-btn" id="toggleSidenav">
                <i class="fa fa-bars"></i>
            </div>
            <span class="navbar-brand">IRS Mahasiswa</span>
            <form action="/logout" method="post" class="navbar-brand">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </nav>

        <div class="sidenav" id="mySidenav">

            <h2 style="color: #fff; text-align: center; padding: 15px;">Mahasiswa</h2>
            <a href="{{ route('mahasiswa.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('mahasiswa.dashboard.akademik', ['mahasiswa' => $mahasiswa]) }}"><i class="fa fa-user"></i>
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

        <div class="content" id="content">

            <div id="biodata" class="feature-content">
                
            </div>

            <div id="irs" class="feature-content">
                <div class="card text">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true"
                                    href="{{ route('mahasiswa.dashboard.akademik') }}">Biodata Akademik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true"
                                    href="{{ route('mahasiswa.dashboard.akademik.irs') }}">IRS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true"
                                    href="{{ route('mahasiswa.dashboard.akademik.khs') }}">KHS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true"
                                    href="{{ route('mahasiswa.dashboard.akademik.pkl') }}">PKL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true"
                                    href="{{ route('mahasiswa.dashboard.akademik.skripsi') }}">Skripsi</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Nama: {{ $mahasiswa->nama }}</h3>
                                            <p>NIM: {{ $mahasiswa->nim }}</p>
                                            <!-- Tambahkan data biodata lainnya di sini -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h1 class="mb-0">IRS</h1>
                                        <a href="{{ route('mahasiswa.dashboard.akademik.irs.create') }}"
                                            class="btn btn-primary">+ Tambah Entry IRS</a>
                                    </div>
                                    <hr />
                                    @if (Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <table class="table table-hover">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Semester Aktif</th>
                                                <th>Jumlah SKS Diambil</th>
                                                <th>Status Validasi</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($irsMahasiswa->count() > 0)
                                                @foreach ($irsMahasiswa as $irs)
                                                    <tr>
                                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                                        <td class="align-middle">{{ $irs->semester_aktif }}</td>
                                                        <td class="align-middle">{{ $irs->jumlah_sks_diambil }}</td>
                                                        <td class="align-middle">{{ $irs->status_validasi }}</td>
                                                        <td class="align-middle">
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{ route('mahasiswa.dashboard.akademik.irs.show', ['id' => $irs->id]) }}"
                                                                    type="button" class="btn btn-link">Detail</a>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="5">IRS tidak Ditemukan</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    showFeature('irs');
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
