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

            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 800px;
                margin: 50px auto;
                background-color: #fff;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                color: #333;
            }

            form {
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-bottom: 5px;
                color: #333;
            }

            input {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
                box-sizing: border-box;
            }

            button {
                background-color: #4caf50;
                color: #fff;
                padding: 10px;
                border: none;
                cursor: pointer;
            }

            button:hover {
                background-color: #45a049;
            }

            #searchResults {
                margin-top: 20px;
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

         
            <div class="container mt-5">
                <h2 class="text-center mb-4">Pencarian Progress Studi Mahasiswa</h2>
                <form action="search.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM atau Nama">
                    </div>

                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>

                <!-- Hasil pencarian akan ditampilkan di sini -->
                <div class="mt-4">
                    <h3 class="text-center">Hasil Pencarian</h3>
                    <table class="text-center table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Semester</th>
                                <th>Progress Studi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Tambahkan data hasil pencarian di sini -->
                            <tr>
                                <td>24060121130021</td>
                                <td>Rizky Akhmad Fahreza</td>
                                <td>5</td>
                                <td><a href="progress.php">Lihat Progress</a></td>
                            </tr>
                            <!-- Tambahkan baris lain sesuai hasil pencarian -->
                        </tbody>
                    </table>
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
@endsection