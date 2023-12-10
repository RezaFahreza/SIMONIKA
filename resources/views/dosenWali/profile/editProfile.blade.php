@extends('layouts.templateDosenWali', ['title' => 'Edit Profile'])

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
                                    <div class="form-group">
                                        <label for="nama">Nama:</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $dosenWali->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">NIP:</label>
                                        <input type="text" class="form-control" id="nip" name="nip" value="{{ $dosenWali->nip }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $dosenWali->email }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="handphone">Handphone:</label>
                                        <input type="text" class="form-control" id="handphone" name="handphone" value="{{ $dosenWali->handphone }}">
                                    </div>
                                    <div class="form-group row mt-4">
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