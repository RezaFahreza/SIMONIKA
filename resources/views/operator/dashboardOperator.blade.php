@extends('layouts.main')

@section('contents')
    <div class="container">
        <h2>Selamat Datang Operator</h2>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
            <a href="{{route('generate.user.mahasiswa') }}" class="btn btn-success">Generate Akun Mahasiswa</a>
        </form>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
