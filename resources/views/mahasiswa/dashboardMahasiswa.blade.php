@extends('layouts.templateMahasiswa', ['title' => 'Dashboard'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5">
                <h2 class="mt-4 text-3xl font-bold text-gray-900 mb-4">Profile</h2>
                <div class="card py-2">
                    <div class="row gy-2 ml-4 align-items-center">
                        <div class="col-1.5">
                            <img class="h-20 w-20 rounded-circle bg-gray-50 ml-4" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="foto profile">
                        </div>
                        <div class="card ml-4">
                            <div class="col md:text-justify">
                                <p class="text-sm font-weight-bold text-gray-900">Mahasiswa</p>
                                <p class="mt-1 text-xs text-gray-500">Nama :{{$mahasiswa->nama}}</p>
                                <p class="mt-1 text-xs text-gray-500">NIM :{{$mahasiswa->nim}}</p>
                                <p class="mt-1 text-xs text-gray-500">Email :{{$mahasiswa->email}}</p>
                                <p class="text-sm font-weight-bold text-gray-900">Informatika</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="mt-4 text-3xl font-bold text-gray-900 mb-4">Menu</h2>

                <div class="card p-4">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 px-4 py-4">
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
                                    <p class="card-text text-gray-600">IRS, KHS, PKL, Skripsi</p>
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