@extends('layouts.templateMahasiswa', ['title' => 'Edit Profile'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-5">
                <div class="card">
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
                                        <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{ $mahasiswa->alamat ?? '' }}" placeholder="Alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="kab_kota">Kabupaten/Kota</label>
                                        <input type="text" name="kab_kota" class="form-control" value="{{ $mahasiswa->kab_kota ?? '' }}" placeholder="Kabupaten/Kota">
                                    </div>
                                    <div class="form-group">
                                        <label for="propinsi">Propinsi:</label>
                                        <select class="form-control" id="propinsi" name="propinsi" class="form-control" value="{{ $mahasiswa->propinsi ?? '' }}" placeholder="Provinsi">
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
                                        <input type="text" name="angkatan" class="form-control" value="{{ $mahasiswa->angkatan }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="propinsi">Jalur Masuk</label>
                                        <input type="text" name="jalur_masuk" class="form-control" value="{{ $mahasiswa->jalur_masuk }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="dosenWali">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ $mahasiswa->email ?? '' }}" placeholder="xxxxxx@students.undip.ac.id" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="propinsi">Nomor Handphone</label>
                                        <input type="text" name="nomor_handphone" class="form-control" value="{{ $mahasiswa->handphone ?? '' }}" placeholder="08xxxxxxxxxx">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select class="form-control" id="status" name="status" disabled>
                                            <option value="Aktif" selected>Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
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
@endsection