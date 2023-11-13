@extends('layouts.main')

@section('contents')
<div class="container">
    <form action="{{route('store.user.mahasiswa')}}" method="post">
        @csrf
        <h3>Entry Data Mahasiswa</h3>
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
            <input type="text" name="angkatan" class="form-control" placeholder="Angkatan" required>
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
                @foreach($dosenWaliList as $dosenWali)
                    <option value="{{ $dosenWali->nip }}">{{ $dosenWali->nama }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Generate Akun Mahasiswa</button>
    </form>
</div>
@endsection
