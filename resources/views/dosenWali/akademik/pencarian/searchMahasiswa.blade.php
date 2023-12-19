@extends('layouts.templateDosenWali', ['title' => 'Search'])

@section('contents')

<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5">
                <h2 class="mt-4 text-3xl font-bold text-gray-900 mb-4">Pencarian Progress Studi Mahasiswa</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="get">
                            @csrf
                            <div class="form-group">
                                <input type="search" class="form-control" id="search-input" name="search-input" placeholder="Masukkan NIM atau Nama">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Hasil pencarian akan ditampilkan di sini -->
                <div class="card mt-4">
                    <h3 class="text-center mt-4">Mahasiswa Perwalian</h3>
                    <table class="text-center table table-striped mt-3">
                        <thead>
                            <tr>
                                <th class="align-middle">NIM</th>
                                <th class="align-middle">Nama</th>
                                <th class="align-middle">Angkatan</th>
                                <th class="align-middle">Progress Studi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <td>abc</td>

                            <td>def</td>

                            <td>aa</td>

                            <td><a href="/dosenwali/akademik/detailSemester">Lihat Progress</a></td>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection