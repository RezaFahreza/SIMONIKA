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
    </style>
</head>

<body>
@yield('nav')
    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    <aside>
        <div class="sidenav" id="mySidenav">
            <h2 style="color: #fff; text-align: center; padding: 15px;">Departemen</h2>
            <a href="{{ route('departemen.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('departemen.profile') }}"><i class="fa fa-user-circle-o"></i>
                Profile</a>
            <a href="#"><i class="fa fa-user"></i>
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
            <div id="dashboard" class="feature-content">
                @yield('contents')
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