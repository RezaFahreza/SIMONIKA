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
                                    <form action="{{ route('mahasiswa.profile.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $mahasiswa->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nim">NIM</label>
                                            <input type="text" name="nim" class="form-control"
                                                value="{{ $mahasiswa->nim }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control"
                                                value="{{ $mahasiswa->alamat ?? '' }}" placeholder="Alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="kab_kota">Kabupaten/Kota</label>
                                            <input type="text" name="kab_kota" class="form-control"
                                                value="{{ $mahasiswa->kab_kota ?? '' }}" placeholder="Kabupaten/Kota">
                                        </div>
                                        <div class="form-group">
                                            <label for="propinsi">Propinsi:</label>
                                            <select class="form-control" id="propinsi" name="propinsi">
                                                <option value="" @if (empty($mahasiswa->propinsi)) selected @endif>
                                                    Pilih Propinsi</option>
                                                <option value="Aceh" @if ($mahasiswa->propinsi == 'Aceh') selected @endif>
                                                    Aceh</option>
                                                <option value="Sumatera Utara"
                                                    @if ($mahasiswa->propinsi == 'Sumatera Utara') selected @endif>Sumatera Utara
                                                </option>
                                                <option value="Sumatera Barat"
                                                    @if ($mahasiswa->propinsi == 'Sumatera Barat') selected @endif>Sumatera Barat
                                                </option>
                                                <option value="Riau" @if ($mahasiswa->propinsi == 'Riau') selected @endif>
                                                    Riau</option>
                                                <option value="Jambi" @if ($mahasiswa->propinsi == 'Jambi') selected @endif>
                                                    Jambi</option>
                                                <option value="Sumatera Selatan"
                                                    @if ($mahasiswa->propinsi == 'Sumatera Selatan') selected @endif>Sumatera Selatan
                                                </option>
                                                <option value="Bengkulu" @if ($mahasiswa->propinsi == 'Bengkulu') selected @endif>
                                                    Bengkulu</option>
                                                <option value="Lampung" @if ($mahasiswa->propinsi == 'Lampung') selected @endif>
                                                    Lampung</option>
                                                <option value="Kepulauan Bangka Belitung"
                                                    @if ($mahasiswa->propinsi == 'Kepulauan Bangka Belitung') selected @endif>Kepulauan Bangka
                                                    Belitung</option>
                                                <option value="Kepulauan Riau"
                                                    @if ($mahasiswa->propinsi == 'Kepulauan Riau') selected @endif>Kepulauan Riau
                                                </option>
                                                <option value="DKI Jakarta"
                                                    @if ($mahasiswa->propinsi == 'DKI Jakarta') selected @endif>DKI Jakarta</option>
                                                <option value="Jawa Barat"
                                                    @if ($mahasiswa->propinsi == 'Jawa Barat') selected @endif>Jawa Barat</option>
                                                <option value="Jawa Tengah"
                                                    @if ($mahasiswa->propinsi == 'Jawa Tengah') selected @endif>Jawa Tengah</option>
                                                <option value="DI Yogyakarta"
                                                    @if ($mahasiswa->propinsi == 'DI Yogyakarta') selected @endif>DI Yogyakarta
                                                </option>
                                                <option value="Jawa Timur"
                                                    @if ($mahasiswa->propinsi == 'Jawa Timur') selected @endif>Jawa Timur</option>
                                                <option value="Banten" @if ($mahasiswa->propinsi == 'Banten') selected @endif>
                                                    Banten</option>
                                                <option value="Bali" @if ($mahasiswa->propinsi == 'Bali') selected @endif>
                                                    Bali</option>
                                                <option value="Nusa Tenggara Barat"
                                                    @if ($mahasiswa->propinsi == 'Nusa Tenggara Barat') selected @endif>Nusa Tenggara Barat
                                                </option>
                                                <option value="Nusa Tenggara Timur"
                                                    @if ($mahasiswa->propinsi == 'Nusa Tenggara Timur') selected @endif>Nusa Tenggara Timur
                                                </option>
                                                <option value="Kalimantan Barat"
                                                    @if ($mahasiswa->propinsi == 'Kalimantan Barat') selected @endif>Kalimantan Barat
                                                </option>
                                                <option value="Kalimantan Tengah"
                                                    @if ($mahasiswa->propinsi == 'Kalimantan Tengah') selected @endif>Kalimantan Tengah
                                                </option>
                                                <option value="Kalimantan Selatan"
                                                    @if ($mahasiswa->propinsi == 'Kalimantan Selatan') selected @endif>Kalimantan Selatan
                                                </option>
                                                <option value="Kalimantan Timur"
                                                    @if ($mahasiswa->propinsi == 'Kalimantan Timur') selected @endif>Kalimantan Timur
                                                </option>
                                                <option value="Kalimantan Utara"
                                                    @if ($mahasiswa->propinsi == 'Kalimantan Utara') selected @endif>Kalimantan Utara
                                                </option>
                                                <option value="Sulawesi Utara"
                                                    @if ($mahasiswa->propinsi == 'Sulawesi Utara') selected @endif>Sulawesi Utara
                                                </option>
                                                <option value="Sulawesi Tengah"
                                                    @if ($mahasiswa->propinsi == 'Sulawesi Tengah') selected @endif>Sulawesi Tengah
                                                </option>
                                                <option value="Sulawesi Selatan"
                                                    @if ($mahasiswa->propinsi == 'Sulawesi Selatan') selected @endif>Sulawesi Selatan
                                                </option>
                                                <option value="Sulawesi Barat"
                                                    @if ($mahasiswa->propinsi == 'Sulawesi Barat') selected @endif>Sulawesi Barat
                                                </option>
                                                <option value="Gorontalo"
                                                    @if ($mahasiswa->propinsi == 'Gorontalo') selected @endif>Gorontalo</option>
                                                <option value="Maluku" @if ($mahasiswa->propinsi == 'Maluku') selected @endif>
                                                    Maluku</option>
                                                <option value="Maluku Utara"
                                                    @if ($mahasiswa->propinsi == 'Maluku Utara') selected @endif>Maluku Utara
                                                </option>
                                                <option value="Papua Barat"
                                                    @if ($mahasiswa->propinsi == 'Papua Barat') selected @endif>Papua Barat</option>
                                                <option value="Papua" @if ($mahasiswa->propinsi == 'Papua') selected @endif>
                                                    Papua</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="angkatan">Angkatan</label>
                                            <input type="text" name="angkatan" class="form-control"
                                                value="{{ $mahasiswa->angkatan }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="propinsi">Jalur Masuk</label>
                                            <input type="text" name="jalur_masuk" class="form-control"
                                                value="{{ $mahasiswa->jalur_masuk }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="dosenWali">Email</label>
                                            <input type="text" name="email" class="form-control"
                                                value="{{ $mahasiswa->email ?? '' }}"
                                                placeholder="xxxxxx@students.undip.ac.id">
                                        </div>
                                        <div class="form-group">
                                            <label for="propinsi">Nomor Handphone</label>
                                            <input type="text" name="nomor_handphone" class="form-control"
                                                value="{{ $mahasiswa->handphone ?? '' }}" placeholder="08xxxxxxxxxx">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <input type="text" name="status" class="form-control"
                                                value="{{ $mahasiswa->status ?? '' }}" readonly>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <div class="col-md-12 text-right">
                                                <button type="submit"
                                                    class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
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
