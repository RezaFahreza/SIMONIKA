@extends('layouts.templateDepartemen', ['title' => 'Profile'])

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
                                            <td>{{$departemen->nama_departemen}}</td>
                                        </tr>
                                        <tr>
                                            <td>NIP:</td>
                                            <td>{{$departemen->kode_departemen}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{$departemen->email}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-12 text-right mt-44">
                                    <a href="{{ route('departemen.profile.edit') }}" class="btn btn-primary">Edit</a>
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