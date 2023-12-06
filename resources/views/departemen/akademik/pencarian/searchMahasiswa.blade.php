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
        <span class="navbar-brand">Search Mahasiswa</span>
        <form action="/logout" method="post" class="navbar-brand">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </nav>

    <aside>
        <div class="sidenav" id="mySidenav">
            <h2 style="color: #fff; text-align: center; padding: 15px;">Dosen Wali</h2>
            <a href="{{ route('dosenWali.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('dosenWali.akademik.index') }}"><i class="fa fa-user"></i>
                Akademik</a>
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
            <div id="akademik" class="feature-content">
                <div class="container mt-5">
                    <h2 class="text-center mb-4">Pencarian Progress Studi Mahasiswa</h2>
                    @csrf
                    <form action="" method="get">
                        <div class="form-group">
                            <input type="search" class="form-control" id="search-input" name="search-input" placeholder="Masukkan NIM atau Nama">
                        </div>

                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    <!-- Hasil pencarian akan ditampilkan di sini -->
                    <div class="mt-4">
                        <h3 class="text-center">Mahasiswa Perwalian</h3>
                        <table class="text-center table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th class="align-middle">NIM</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Angkatan</th>
                                    <th class="align-middle">Progress Studi</th>
                                </tr>
                            </thead>
                            <tbody id="search-results">
                                @if ($mahasiswaDepartemen->count() > 0)
                                @foreach ($mahasiswaDepartemen as $mahasiswa)
                                <tr>
                                    <td class="align-middle">{{ $mahasiswa->nim }}</td>
                                    <td class="align-middle">{{ $mahasiswa->nama }}</td>
                                    <td class="align-middle">{{ $mahasiswa->angkatan }}</td>
                                    <td class="align-middle"><a href="{{ route('departemen.akademik.profile', ['nim' => $mahasiswa->nim]) }}">Lihat
                                            Progress</a></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Tampilkan konten Dashboard secara otomatis saat halaman dimuat
        window.onload = function() {
            showFeature('akademik');
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-input').on('input', function(e) {

                let keyword = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '{{route("departemen.akademik.search")}}',
                    data: {
                        keyword: keyword
                    },
                    success: function(response) {
                        displayResults(response.results);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            function displayResults(results) {
                let resultContainer = $('#search-results');
                resultContainer.empty();

                if (results.length > 0) {
                    for (let i = 0; i < results.length; i++) {
                        let iteration = resultContainer.find('tr').eq(i).data('iteration');
                        resultContainer.append(`
                                <tr>
                                    <td class="align-middle">${results[i].nim}</td>
                                    <td class="align-middle">${results[i].nama}</td>
                                    <td class="align-middle">${results[i].angkatan}</td>
                                    <td class="align-middle"><a href="{{ route('departemen.akademik.profile', ['nim' => $mahasiswa->nim]) }}">Lihat Progress</a></td>
                                </tr>
                            `);
                    }
                } else {
                    resultContainer.append(`<tr><td class="align-middle" colspan="4">Tidak ada hasil</td></tr>`);
                }
            }

        });
    </script>

</body>
@endsection