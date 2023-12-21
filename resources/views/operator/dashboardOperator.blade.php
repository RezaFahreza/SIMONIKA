@extends('layouts.templateOperator', ['title'=>'Dashboard'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5">
                <h2 class="mt-4 text-3xl font-bold text-gray-900 mb-4">Profile</h2>
                <div class="card">
                        <div class="card-body">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:flex md:items-center">
                                    <img src="{{ URL::asset('images/image1.jpg') }}" alt="Foto Departemen"
                                        class="md:w-1/4 mx-auto md:mx-0">
                                </div>
                                <div class="md:flex md:items-center">
                                    <table class="table mt-4 md:mx-auto">
                                        <tbody>
                                            <tr>
                                                <td>Nama:</td>
                                                <td>{{ $operator->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td>NIP:</td>
                                                <td>{{ $operator->nip }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td>{{ $operator->email }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                <h2 class="mt-4 text-3xl font-bold text-gray-900 mb-4">Menu</h2>

                <div class="card p-4">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        <div class="col">
                            <div class="card">
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="card-img-top">
                                <div class="card-body text-center">
                                    <a href="{{ route('operator.profile') }}" class="card-title">Profile</a>
                                    <p class="card-text text-gray-600">Edit Profile</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-02.jpg" alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant." class="card-img-top">
                                <div class="card-body text-center">
                                    <a href="{{ route('generate.user.mahasiswa') }}" class="card-title">Akademik</a>
                                    <p class="card-text text-gray-600">Generate Akun</p>
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