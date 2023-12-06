@extends('layouts.templateMahasiswa')

@section('nav')
<nav class="navbar navbar-dark bg-dark">
    <div class="navbar-toggle-btn" id="toggleSidenav">
        <i class="fa fa-bars"></i>
    </div>
    <span class="navbar-brand">Dashboard Mahasiswa</span>
    <form action="/logout" method="post" class="navbar-brand">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
</nav>
@endsection

@section('contents')
<div class="container">
    <div class="mx-auto py-6 sm:px-6 lg:px-8">
        <div class="container px-4 py-5">
            <div class="card px-4 py-2">
                <div class="row gx-4 gy-2 align-items-center">
                    <div class="col-3">
                        <img class="h-12 w-12 rounded-circle bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="foto profile">
                    </div>
                    <div class="col ml-4">
                        <p class="text-sm font-weight-bold text-gray-900">Mahasiswa</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $mahasiswa->nama }}</p>
                        <p class="mt-1 text-xs text-gray-500">{{ $mahasiswa->nim }}</p>
                        <p class="mt-1 text-xs text-gray-500">{{ $mahasiswa->email }}</p>
                        <p class="mt-1 text-xs text-gray-500">Informatika</p>
                    </div>
                </div>
            </div>

            <h2 class="mt-4 text-3xl font-bold text-gray-900 mb-4">Menu</h2>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="card-img-top">
                        <div class="card-body text-center">
                            <a href="{{route('mahasiswa.profile')}}" class="card-title">Profile</a>
                            <p class="card-text text-gray-600">Edit Profile</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-03.jpg" alt="Collection of four insulated travel bottles on wooden shelf." class="card-img-top">
                        <div class="card-body text-center">
                            <a href="{{ route('mahasiswa.dashboard.akademik', ['mahasiswa' => $mahasiswa]) }}" class="card-title">Akademik</a>
                            <p class="card-text text-gray-600">Biodata, IRS, KHS, PKL, Skripsi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection