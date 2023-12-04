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

        .upload_dropZone {
            color: #0f3c4b;
            background-color: var(--colorPrimaryPale, #c8dadf);
            outline: 2px dashed var(--colorPrimaryHalf, #c1ddef);
            outline-offset: -12px;
            transition:
                outline-offset 0.2s ease-out,
                outline-color 0.3s ease-in-out,
                background-color 0.2s ease-out;
        }

        .upload_dropZone.highlight {
            outline-offset: -4px;
            outline-color: var(--colorPrimaryNormal, #0576bd);
            background-color: var(--colorPrimaryEighth, #c8dadf);
        }

        .upload_svg {
            fill: var(--colorPrimaryNormal, #0576bd);
        }

        .btn-upload {
            color: #fff;
            background-color: var(--colorPrimaryNormal);
        }

        .btn-upload:hover,
        .btn-upload:focus {
            color: #fff;
            background-color: var(--colorPrimaryGlare);
        }

        .upload_img {
            width: calc(33.333% - (2rem / 3));
            object-fit: contain;
        }

        :root {
            --colorPrimaryNormal: #00b3bb;
            --colorPrimaryDark: #00979f;
            --colorPrimaryGlare: #00cdd7;
            --colorPrimaryHalf: #80d9dd;
            --colorPrimaryQuarter: #bfecee;
            --colorPrimaryEighth: #dff5f7;
            --colorPrimaryPale: #f3f5f7;
            --colorPrimarySeparator: #f3f5f7;
            --colorPrimaryOutline: #dff5f7;
            --colorButtonNormal: #00b3bb;
            --colorButtonHover: #00cdd7;
            --colorLinkNormal: #00979f;
            --colorLinkHover: #00cdd7;
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
        <span class="navbar-brand">Generate Akun Mahasiswa</span>
        <form action="/logout" method="post" class="navbar-brand">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </nav>

    <aside>
        <div class="sidenav" id="mySidenav">
            <h2 style="color: #fff; text-align: center; padding: 15px;">Operator</h2>
            <a href="{{ route('dosenWali.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('dosenWali.verifikasi.irs') }}"><i class="fa fa-search"></i>
                Generate Akun Mahasiswa</a>
            <a href="{{ route('dosenWali.verifikasi.irs') }}"><i class="fa fa-search"></i>
                Pencarian Mahasiswa</a>
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
        </div>
    </aside>

    <main>
        <div class="content" id="content">
            <div id="generate" class="feature-content">
                <div class="container">
                    <div class="card">
                        <form action="{{ route('store.user.mahasiswa') }}" method="post">
                            @csrf
                            <h3 class="text-center mt-3">Entry Data Mahasiswa</h3>
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

                            <button type="submit" class="btn btn-primary float-end mr-3">Generate Akun Mahasiswa</button>
                        </form>
                    </div>
                </div>

                <div class="container mt-5">
                    <div class="card">
                        <h3 class="text-center mt-3">Entry File CSV</h3>
                        <form action="{{ route('store.user.mahasiswa.excel') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="form-group mt-3">
                                <fieldset class="upload_dropZone text-center mb-3 p-4">

                                    <legend class="visually-hidden">CSV uploader</legend>
                                    <legend class="visually-hidden">CSV uploader</legend>

                                    <svg class="upload_svg" width="60" height="60" aria-hidden="true">
                                        <use href="#icon-imageUpload"></use>
                                    </svg>

                                    <p class="small my-2">Drag &amp; Drop File CSV
                                        <br><i>or</i>
                                    </p>
                                    <p class="small my-2">Drag &amp; Drop File CSV
                                        <br><i>or</i>
                                    </p>

                                    <input id="upload_csv" data-post-name="csv"
                                    <input id="upload_csv" data-post-name="csv"
                                        data-post-url="https://someplace.com/image/uploads/backgrounds/"
                                        class="position-absolute invisible" type="file" multiple accept=".csv" />
                                        class="position-absolute invisible" type="file" multiple accept=".csv" />

                                    <label class="btn btn-upload mb-3" for="upload_CSV">Choose file(s)</label>
                                    <label class="btn btn-upload mb-3" for="upload_CSV">Choose file(s)</label>

                                    <div class="upload_csv d-flex flex-wrap justify-content-center gap-3 mb-0"></div>

                                </fieldset>

                                <svg style="display:none">
                                    <defs>
                                          <symbol id="icon-imageUpload" clip-rule="evenodd" viewBox="0 0 96 96">
                                                <path
                                               
                                                d="M47 6a21 21 0 0 0-12.3 3.8c-2.7 2.1-4.4 5-4.7 7.1-5.8 1.2-10.3 5.6-10.3 10.6 0 6 5.8 11 13 11h12.6V22.7l-7.1 6.8c-.4.3-.9.5-1.4.5-1 0-2-.8-2-1.7 0-.4.3-.9.6-1.2l10.3-8.8c.3-.4.8-.6 1.3-.6.6 0 1 .2 1.4.6l10.2 8.8c.4.3.6.8.6 1.2 0 1-.9 1.7-2 1.7-.5 0-1-.2-1.3-.5l-7.2-6.8v15.6h14.4c6.1 0 11.2-4.1 11.2-9.4 0-5-4-8.8-9.5-9.4C63.8 11.8 56 5.8 47 6Zm-1.7 42.7V38.4h3.4v10.3c0 .8-.7 1.5-1.7 1.5s-1.7-.7-1.7-1.5Z M27 49c-4 0-7 2-7 6v29c0 3 3 6 6 6h42c3 0 6-3 6-6V55c0-4-3-6-7-6H28Zm41 3c1 0 3 1 3 3v19l-13-6a2 2 0 0 0-2 0L44 79l-10-5a2 2 0 0 0-2 0l-9 7V55c0-2 2-3 4-3h41Z M40 62c0 2-2 4-5 4s-5-2-5-4 2-4 5-4 5 2 5 4Z"  />
                                          </symbol>
                                    </defs>
                                </svg>
                            </div> --}}
                            <div class="mb-3">
                                <label for="formFile" class="form-label"></label>
                                <input class="form-control" type="file" id="input_excel" name="input_excel">
                            </div>
                            <button type="submit" class="btn btn-primary float-end mr-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

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