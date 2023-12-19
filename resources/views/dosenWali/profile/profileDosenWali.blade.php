@extends('layouts.templateDosenWali', ['title' => 'Profile'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ URL::asset('images/image4.jpeg') }}" alt="Foto Mahasiswa" class="img-fluid">

                            </div>
                            <div class="col-md-8">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Nama:</td>
                                            <td>{{$dosenWali->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td>NIP:</td>
                                            <td>{{$dosenWali->nip}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{$dosenWali->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Handphone:</td>
                                            <td>{{$dosenWali->handphone}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-12 text-right mt-44">
                                    <a href="{{route('dosenWali.profile.edit')}}" class="btn btn-primary" style="float: right">Edit</a>
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