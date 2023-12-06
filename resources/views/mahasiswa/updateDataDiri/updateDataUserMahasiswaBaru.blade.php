@extends('layouts.main')

@section('contents')
<main>
    <div class="container">
        <h2>Selamat Datang User Mahasiswa Baru!</h2>
        <h2>Lengkapi data-data dibawah ini untuk bisa menggunakan SIMONIKA!</h2>

        <form action="{{ route('mahasiswa.firstUpdate', ['nim' => $targetMahasiswa->nim]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ $targetMahasiswa->nim }}" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $targetMahasiswa->nama }}">
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
                <label for="propinsi">Provinsi</label>
                <select class="form-control" id="propinsi" name="propinsi" class="form-control" value="{{ $targetMahasiswa->propinsi ?? '' }}" placeholder="Provinsi">
                    <option value="">Pilih Propinsi</option>
                    <option value="Aceh">Aceh</option>
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
                <input type="text" name="angkatan" class="form-control" value="{{ $targetMahasiswa->angkatan }}" readonly>
            </div>
            <div class="form-group">
                <label for="propinsi">Jalur Masuk</label>
                <input type="text" name="jalur_masuk" class="form-control" value="{{ $targetMahasiswa->jalur_masuk }}" readonly>
            </div>
            <div class="form-group">
                <label for="dosenWali">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $targetMahasiswa->email ?? '' }}" placeholder="xxxxxx@students.undip.ac.id">
            </div>
            <div class="form-group">
                <label for="propinsi">Nomor Handphone</label>
                <input type="text" name="nomor_handphone" class="form-control" value="{{ $targetMahasiswa->handphone ?? '' }}" placeholder="08xxxxxxxxxx">
            </div>
            {{-- <div class="form-group">
                <label for="status_keaktifan">Status Keaktifan</label>
                <select name="status_keaktifan" class="form-control">
                    <option value="Aktif" @if ($targetMahasiswa->status == 'Aktif') selected @endif>Aktif</option>
                    <option value="Cuti" @if ($targetMahasiswa->status == 'Cuti') selected @endif>Cuti</option>
                    <option value="Mangkir" @if ($targetMahasiswa->status == 'Mangkir') selected @endif>Mangkir</option>
                    <option value="DO" @if ($targetMahasiswa->status == 'DO') selected @endif>DO</option>
                    <option value="Undur Diri" @if ($targetMahasiswa->status == 'Undur Diri') selected @endif>Undur Diri</option>
                    <option value="Lulus" @if ($targetMahasiswa->status == 'Lulus') selected @endif>Lulus</option>
                    <option value="Meninggal Dunia" @if ($targetMahasiswa->status == 'Meninggal Dunia') selected @endif>Meninggal Dunia</option>
                </select>
            </div> --}}
            <div class="form-group">
                <label for="dosenWali">Dosen Wali</label>
                <input type="text" name="dosenWali" class="form-control" value="{{ $targetMahasiswa->nama_dosen }}" readonly>
            </div>
            <div class="form-group">
                <label for="foto_mahasiswa">Unggah Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update Data Mahasiswa</button>
        </form>
    </div>
</main>
@endsection