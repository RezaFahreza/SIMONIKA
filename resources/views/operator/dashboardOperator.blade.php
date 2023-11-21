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
            <a href="javascript:void(0);" onclick="showFeature('dashboard')"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('generate.user.mahasiswa') }}"><i class="fa fa-user"></i> Generate Akun</a>

        </div>

        <div class="content" id="content">
            <div id="dashboard" class="feature-content">
                <div class="container mt-5">
                    <div class="row">
                        <!-- Flexbox 1 -->
                        <div class="col-md-4">
                            <div class="d-flex flex-column align-items-center border p-3">
                                <img src="{{ URL::asset('images/image1.jpg') }}" alt="Avatar"
                                    class="img-fluid rounded-circle" style="width: 150px;">
                                <div class="border p-3 mt-3">
                                    <p class="mb-0"><strong>Nama:</strong> John Doe</p>
                                    <p class="mb-0"><strong>NIM:</strong> 123456</p>
                                    <p class="mb-0"><strong>Email:</strong> john.doe@example.com</p>
                                </div>
                            </div>
                        </div>

                        <!-- Flexbox 2 -->
                        <div class="col-md-8">
                            <div class="d-flex flex-column border p-3">
                                <!-- Box 1 -->
                                <div class="bg-primary text-white p-3 mb-3">
                                    <h4>Profile</h4>
                                </div>

                                <!-- Box 2 -->
                                <div class="bg-secondary text-white p-3 mb-3">
                                    <h4>Akademik</h4>
                                </div>

                                <!-- Box 3 -->
                                <div class="bg-info text-white p-3">
                                    <h4>Generate Akun</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="generate" class="feature-content">
                <a href="{{ route('generate.user.mahasiswa') }}" class="btn btn-success mr-2">Generate Akun
                        Mahasiswa</a>
            </div>

            <div id="reports" class="feature-content">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title text-center">Upload Data Mahasiswa</h2>

                                    <form action="process-upload.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="file">Pilih File CSV:</label>
                                            <input type="file" class="form-control-file" id="file" name="file">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Upload</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
