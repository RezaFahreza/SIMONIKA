@extends('layouts.templateMahasiswa', ['title' => 'Entry IRS'])

@section('contents')
<main>
    <div class="mx-auto py-6 sm:px-6 lg:px-8">
        <div class="container px-4 py-5 mt-5">
            <div class="card text">
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
                            <div class=" card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h1 class="mb-0">Tambah Entry IRS</h1>
                                </div>
                                <br>
                                @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                                @endif
                                <form action="{{ route('mahasiswa.dashboard.akademik.irs.store', ['mahasiswa' => $mahasiswa]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="semester_aktif">Semester Aktif</label>
                                        <select name="semester_aktif" id="semester_aktif" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-dark rounded-lg bg-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @for ($i = 1; $i <= 14; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_sks_diambil">Jumlah SKS Diambil</label>
                                        <input type="text" name="jumlah_sks_diambil" class="form-control border border-dark rounded-lg" value="{{ old('jumlah_sks_diambil') }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="scan_irs" class="form-label">Scan IRS</label>
                                        <input class="form-control" type="file" name="scan_irs">
                                    </div>
                                    <button type="submit" class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                                    <a href="{{ route('mahasiswa.dashboard.akademik.irs', ['mahasiswa' => $mahasiswa]) }}" class="btn btn-danger">Batal</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection