@extends('layouts.templateMahasiswa', ['title' => 'Profile'])

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
                            <div class="col-md-8">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Nama:</td>
                                            <td>{{ $mahasiswa->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>NIM:</td>
                                            <td>{{ $mahasiswa->nim }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat:</td>
                                            <td>{{ $mahasiswa->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kab/Kota:</td>
                                            <td>{{ $mahasiswa->kab_kota }}</td>
                                        </tr>
                                        <tr>
                                            <td>Propinsi:</td>
                                            <td>{{ $mahasiswa->propinsi }}</td>
                                        </tr>
                                        <tr>
                                            <td>Angkatan:</td>
                                            <td>{{ $mahasiswa->angkatan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jalur Masuk:</td>
                                            <td>{{ $mahasiswa->jalur_masuk }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{ $mahasiswa->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Handphone:</td>
                                            <td>{{ $mahasiswa->handphone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status:</td>
                                            <td>{{ $mahasiswa->status }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-12 text-right">
                                    <a href="{{route('mahasiswa.profile.edit')}}" class="btn btn-primary" style="float: right">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection