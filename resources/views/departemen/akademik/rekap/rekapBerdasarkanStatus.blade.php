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
            <span class="navbar-brand">Rekap Berdasarkan Status Mahasiswa</span>
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
                            <h2 class="text-center mb-4 mt-4">Rekap Mahasiswa</h2>
                            <div class="box" style="background-color: black; width: auto; height: 2px"></div>
                            <form id="filterForm" action="{{ route('departemen.rekap.status.filter')}}" method="get">
                                <div class="form-group">
                                    <label class="mt-3" for="angkatan">Angkatan</label>
                                    <select name="angkatan" class="form-control" required>
                                        <option value="">Angkatan</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>

                                    <label class="mt-3" for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">Status</option>
                                        <option value="2016">Aktif</option>
                                        <option value="2017">Cuti</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary" style="float: right">Cari</button>
                            </form>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="card">
                            <h2 class="text-center mt-3 mb-3">List Mahasiswa</h2>
                            <div class="table-container mt-4">
                                <div class="table-responsive">
                                    <div class="box" style="background-color: black; width: auto; height: 2px"></div>
                                    <table  id="mahasiswaTable" class="table">
                                        <tbody  id="mahasiswaTableBody">
                                            <tr>
                                                <td class="text-center">No</td>
                                                <td class="text-center">Nim</td>
                                                <td class="text-center">Nama</td>
                                                <td class="text-center">Angkatan</td>
                                                <td class="text-center">Status</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-center">24060121140153</td>
                                                <td class="text-center">Fikri Prasetya Nurhidayat</td>
                                                <td class="text-center">2021</td>
                                                <td class="text-center">Aktif</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-center">24060121140159</td>
                                                <td class="text-center">Zaeri Haikal Rabbani</td>
                                                <td class="text-center">2021</td>
                                                <td class="text-center">Aktif</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="text-center">24060121140131</td>
                                                <td class="text-center">M Raihan Ridho Khoslarudwarifar</td>
                                                <td class="text-center">2021</td>
                                                <td class="text-center">Aktif</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td class="text-center">24060121140151</td>
                                                <td class="text-center">Derva Anargya Ghaly</td>
                                                <td class="text-center">2021</td>
                                                <td class="text-center">Aktif</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td class="text-center">24060121140099</td>
                                                <td class="text-center">Satria Bintang Adyatma Putra</td>
                                                <td class="text-center">2021</td>
                                                <td class="text-center">Cuti</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">6</td>
                                                <td class="text-center">24060121140173</td>
                                                <td class="text-center">Puti Dhiya Salsabila Rahman</td>
                                                <td class="text-center">2021</td>
                                                <td class="text-center">Cuti</td>
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

            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('filterForm').addEventListener('submit', function(event) {
                    event.preventDefault();

                    const angkatan = document.getElementById('angkatan').value;
                    const status = document.getElementById('status').value;

                    // Make an Ajax request to the filter route
                    axios.get(`/departemen/rekap/status-filter?angkatan=${angkatan}&status=${status}`)
                        .then(response => {
                            // Update the table with the filtered data
                            updateTable(response.data);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });

                function updateTable(data) {
                    // Update the table content with the filtered data
                    // You can customize this part based on your data structure
                    const tableBody = document.getElementById('mahasiswaTableBody');
                    tableBody.innerHTML = '';

                    data.forEach((item, index) => {
                        const row = `
                    <tr>
                        <td class="text-center">${index + 1}</td>
                        <td class="text-center">${item.nim}</td>
                        <td class="text-center">${item.nama}</td>
                        <td class="text-center">${item.angkatan}</td>
                        <td class="text-center">${item.status}</td>
                    </tr>
                `;
                        tableBody.innerHTML += row;
                    });
                }
            });
        </script>

    </body>
@endsection
