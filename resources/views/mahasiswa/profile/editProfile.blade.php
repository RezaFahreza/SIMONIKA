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
        <span class="navbar-brand">Edit Profile Mahasiswa</span>
        <form action="/logout" method="post" class="navbar-brand">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </nav>

    <aside>
        <div class="sidenav" id="mySidenav">
            <h2 style="color: #fff; text-align: center; padding: 15px;">Mahasiswa</h2>
            <a href="{{ route('mahasiswa.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('mahasiswa.profile') }}"><i class="fa fa-user-circle-o"></i>
                Profile</a>
            <a href="#"><i class="fa fa-user"></i>
                Akademik</a>
            <ul>
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
            <div id="dashboard" class="feature-content">
                <div class="container mt-5">
                    <div class="card">
                        <h2 class="text-center mt-3">Edit Profile Mahasiswa</h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('images/image1.jpg') }}" alt="Foto Mahasiswa" class="img-fluid">
                                </div>
                                <!-- Inside the div with class="col-md-8" -->
                                <div class="col-md-8">
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" class="form-control" value="{{ $targetMahasiswa->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nim">NIM</label>
                                            <input type="text" name="nim" class="form-control" value="{{ $targetMahasiswa->nim }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="{{ $targetMahasiswa->alamat ?? '' }}" placeholder="Alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="kab_kota">Kabupaten/Kota</label>
                                            <input type="text" name="kab_kota" class="form-control" value="{{ $targetMahasiswa->kab_kota ?? '' }}" placeholder="Kabupaten/Kota">
                                        </div>
                                        <div class="form-group">
                                            <label for="propinsi">Propinsi:</label>
                                            <select class="form-control" id="propinsi" name="propinsi" class="form-control" value="{{ $targetMahasiswa->propinsi ?? '' }}" placeholder="Provinsi">
                                                <option value="">Pilih Propinsi</option>
                                                <option value=" Aceh">Aceh</option>
                                                <option value="Sumatera Utara">Sumatera Utara</option>
                                                <option value="Sumatera Barat">Sumatera Barat</option>
                                                <option value="Riau">Riau</option>
                                                <option value="Jambi">Jambi</option>
                                                <option value="Sumatera Selatan">Sumatera Selatan</option>
                                                <option value="Bengkulu">Bengkulu</option>
                                                <option value="Lampung">Lampung</option>
                                                <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                                                <option value="Kepulauan Riau">Kepulauan Riau</option>
                                                <option value="DKI Jakarta">DKI Jakarta</option>
                                                <option value="Jawa Barat">Jawa Barat</option>
                                                <option value="Jawa Tengah">Jawa Tengah</option>
                                                <option value="DI Yogyakarta">DI Yogyakarta</option>
                                                <option value="Jawa Timur">Jawa Timur</option>
                                                <option value="Banten">Banten</option>
                                                <option value="Bali">Bali</option>
                                                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                                <option value="Kalimantan Barat">Kalimantan Barat</option>
                                                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                                <option value="Kalimantan Timur">Kalimantan Timur</option>
                                                <option value="Kalimantan Utara">Kalimantan Utara</option>
                                                <option value="Sulawesi Utara">Sulawesi Utara</option>
                                                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                                <option value="Sulawesi Barat">Sulawesi Barat</option>
                                                <option value="Gorontalo">Gorontalo</option>
                                                <option value="Maluku">Maluku</option>
                                                <option value="Maluku Utara">Maluku Utara</option>
                                                <option value="Papua Barat">Papua Barat</option>
                                                <option value="Papua">Papua</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="angkatan">Angkatan</label>
                                            <input type="text" name="angkatan" class="form-control" value="{{ $targetMahasiswa->angkatan }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="propinsi">Jalur Masuk</label>
                                            <input type="text" name="jalur_masuk" class="form-control" value="{{ $targetMahasiswa->jalur_masuk }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="dosenWali">Email</label>
                                            <input type="text" name="email" class="form-control" value="{{ $targetMahasiswa->email ?? '' }}" placeholder="xxxxxx@students.undip.ac.id" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="propinsi">Nomor Handphone</label>
                                            <input type="text" name="nomor_handphone" class="form-control" value="{{ $targetMahasiswa->handphone ?? '' }}" placeholder="08xxxxxxxxxx">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select class="form-control" id="status" name="status" disabled>
                                                <option value="Aktif" selected>Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
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