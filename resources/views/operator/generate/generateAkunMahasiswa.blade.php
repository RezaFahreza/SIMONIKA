@extends('layouts.templateOperator', ['title' => 'Generate Akun Oleh'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-4">
                <div class="card p-4">
                    <form action="{{ route('store.user.mahasiswa') }}" method="post">
                        @csrf
                        <h3 class="text-center my-2">Entry Data Mahasiswa</h3>
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
                        <div class="form-group mt-4">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Generate Akun Mahasiswa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container px-4">
                <div class="card p-4">
                    <h3 class="text-center mb-3">Entry File CSV</h3>
                    <form action="{{ route('store.user.mahasiswa.excel') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group border-2">
                            <label for="formFile" class="form-label"></label>
                            <input class="form-control" type="file" id="input_excel" name="input_excel">
                        </div>
                        <div class="form-group col-md-12 text-right">
                            <button type="submit" class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection