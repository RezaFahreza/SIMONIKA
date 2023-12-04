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
                <input type="text" name="propinsi" class="form-control" value="{{ $targetMahasiswa->propinsi ?? '' }}" placeholder="Provinsi">
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