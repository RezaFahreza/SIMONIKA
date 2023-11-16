@extends('layouts.main')

@section('contents')

    <head>
        <title>Dashboard Operator</title>
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
            <span class="navbar-brand">Operator</span>
            <form action="/logout" method="post" class="navbar-brand">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
        </nav>

        <div class="sidenav" id="mySidenav">
            <h2 style="color: #fff; text-align: center; padding: 15px;">Admin Dashboard</h2>
            <a href="{{ route('operator.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="javascript:void(0);" onclick="showFeature('generate')"><i class="fa fa-user"></i> Generate Akun</a>

        </div>

        <div class="content" id="content">
            <div id="dashboard" class="feature-content">
                
            </div>

            <div id="generate" class="feature-content">
                <div class="container">
                    <form action="{{ route('store.user.mahasiswa') }}" method="post">
                        @csrf
                        <h3>Entry Data Mahasiswa</h3>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" class="form-control" placeholder="NIM Mahasiswa" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" required>
                        </div>
                        <div class="form-group">
                            <label for="angkatan">Angkatan Mahasiswa</label>
                            <input type="text" name="angkatan" class="form-control" placeholder="Angkatan" required>
                        </div>
                        <div class="form-group">
                            <label for="jalur_masuk">Jalur Masuk</label>
                            <select name="jalur_masuk" class="form-control" required>
                                <option value="">Pilih Jalur Masuk</option>
                                <option value="SNMPTN">SNMPTN</option>
                                <option value="SBMPTN">SBMPTN</option>
                                <option value="MANDIRI">MANDIRI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dosenWali">Dosen Wali</label>
                            <select name="dosenWali" class="form-control" required>
                                <option value="">Pilih Dosen Wali</option>
                                @foreach ($dosenWaliList as $dosenWali)
                                    <option value="{{ $dosenWali->nip }}">{{ $dosenWali->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Generate Akun Mahasiswa</button>
                    </form>
                </div>
            </div>

            <script>
                // Tampilkan konten Dashboard secara otomatis saat halaman dimuat
                window.onload = function() {
                    showFeature('generate');
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
