@extends('layouts.templateOperator', ['title' => 'Profile'])

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
                                            <td>{{$operator->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td>NIP:</td>
                                            <td>{{$operator->nip}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{$operator->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Handphone:</td>
                                            <td>{{$operator->handphone}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-12 text-right mt-40">
                                    <a href="{{ route('operator.profile.edit') }}" class="btn btn-primary" style="float: right">Edit</a>
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