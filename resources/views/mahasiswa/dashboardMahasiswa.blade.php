@extends('layouts.templateMahasiswa', ['title' => 'Dashboard'])

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
                                    <img src="{{ URL::asset('storage/' . $mahasiswa->foto_mahasiswa) }}" alt="Foto Mahasiswa"
                                        class="w-full md:w-2/3 mx-auto md:mx-0">
                                </div>
                                <div class="md:flex md:items-center">
                                    <table class="table mt-4 md:mx-auto">
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
                                                <td>Angkatan:</td>
                                                <td>{{ $mahasiswa->angkatan }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td>{{ $mahasiswa->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Dosen Wali:</td>
                                                <td>{{ $dosenWali->nama }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="mt-4 text-3xl font-bold text-gray-900 mb-4">Progress Akademik</h2>
                    <div class="card mt-2">
                        <div class="card-body">
                            <h2 class="mt-4 text-3xl font-bold text-center text-black-500 mb-4">Semester</h2>
                            <div class="container">
                                <div class="flex justify-between flex-wrap">
                                    {{-- Semester 1 --}}
                                    @if (isset($irsMahasiswa[0]) && isset($khsMahasiswa[0]))
                                        <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 1]) }}"
                                            type="button"
                                            class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">1</a>
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">1</a>
                                    @endif

                                    {{-- Semester 2 --}}
                                    @if (isset($irsMahasiswa[1]) && isset($khsMahasiswa[1]))
                                        <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 2]) }}"
                                            type="button"
                                            class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">2</a>
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">2</a>
                                    @endif

                                    {{-- Semester 3 --}}
                                    @if (isset($irsMahasiswa[2]) && isset($khsMahasiswa[2]))
                                        <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 3]) }}"
                                            type="button"
                                            class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">3</a>
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">3</a>
                                    @endif

                                    {{-- Semester 4 --}}
                                    @if (isset($irsMahasiswa[3]) && isset($khsMahasiswa[3]))
                                        <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 4]) }}"
                                            type="button"
                                            class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">4</a>
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">4</a>
                                    @endif

                                    {{-- Semester 5 --}}
                                    @if (isset($irsMahasiswa[4]) && isset($khsMahasiswa[4]))
                                        <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 5]) }}"
                                            type="button"
                                            class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">5</a>
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">5</a>
                                    @endif

                                    {{-- Semester 6 --}}
                                    @if (isset($irsMahasiswa[5]) && isset($khsMahasiswa[5]))
                                        @if (isset($pkl))
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 6]) }}"
                                                type="button"
                                                class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2">6</a>
                                        @else
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 6]) }}"
                                                type="button"
                                                class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">6</a>
                                        @endif
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">6</a>
                                    @endif


                                    {{-- Semester 7 --}}
                                    @if (isset($irsMahasiswa[6]) && isset($khsMahasiswa[6]))
                                        @if (isset($pkl) && $pkl->semester == '7')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 7]) }}"
                                                type="button"
                                                class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2">7</a>
                                        @elseif (isset($skripsi) && $skripsi->semester == '7')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 7]) }}"
                                                type="button"
                                                class="flex-item bg-green-500 text-white px-4 py-2 rounded-md mr-2 mb-2">7</a>
                                        @else
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 7]) }}"
                                                type="button"
                                                class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">7</a>
                                        @endif
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">7</a>
                                    @endif

                                    {{-- Semester 8 --}}
                                    @if (isset($irsMahasiswa[7]) && isset($khsMahasiswa[7]))
                                        @if (isset($pkl) && $pkl->semester == '8')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 8]) }}"
                                                type="button"
                                                class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2">8</a>
                                        @elseif (isset($skripsi) && $skripsi->semester == '8')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 8]) }}"
                                                type="button"
                                                class="flex-item bg-green-500 text-white px-4 py-2 rounded-md mr-2 mb-2">8</a>
                                        @else
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 8]) }}"
                                                type="button"
                                                class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">8</a>
                                        @endif
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">8</a>
                                    @endif

                                    {{-- Semester 9 --}}
                                    @if (isset($irsMahasiswa[8]) && isset($khsMahasiswa[8]))
                                        @if (isset($pkl) && $pkl->semester == '9')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 9]) }}"
                                                type="button"
                                                class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2">9</a>
                                        @elseif (isset($skripsi) && $skripsi->semester == '9')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 9]) }}"
                                                type="button"
                                                class="flex-item bg-green-500 text-white px-4 py-2 rounded-md mr-2 mb-2">9</a>
                                        @else
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 9]) }}"
                                                type="button"
                                                class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">9</a>
                                        @endif
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">9</a>
                                    @endif

                                    {{-- semester 10 --}}
                                    @if (isset($irsMahasiswa[9]) && isset($khsMahasiswa[9]))
                                        @if (isset($pkl) && $pkl->semester == '10')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 10]) }}"
                                                type="button"
                                                class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2">10</a>
                                        @elseif (isset($skripsi) && $skripsi->semester == '10')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 10]) }}"
                                                type="button"
                                                class="flex-item bg-green-500 text-white px-4 py-2 rounded-md mr-2 mb-2">10</a>
                                        @else
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 10]) }}"
                                                type="button"
                                                class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">10</a>
                                        @endif
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">10</a>
                                    @endif

                                    {{-- semester 11 --}}
                                    @if (isset($irsMahasiswa[10]) && isset($khsMahasiswa[10]))
                                        @if (isset($pkl) && $pkl->semester == '11')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 11]) }}"
                                                type="button"
                                                class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2">11</a>
                                        @elseif (isset($skripsi) && $skripsi->semester == '11')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 11]) }}"
                                                type="button"
                                                class="flex-item bg-green-500 text-white px-4 py-2 rounded-md mr-2 mb-2">11</a>
                                        @else
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 11]) }}"
                                                type="button"
                                                class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">11</a>
                                        @endif
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">11</a>
                                    @endif

                                    {{-- semester 12 --}}
                                    @if (isset($irsMahasiswa[11]) && isset($khsMahasiswa[11]))
                                        @if (isset($pkl) && $pkl->semester == '12')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 12]) }}"
                                                type="button"
                                                class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2">12</a>
                                        @elseif (isset($skripsi) && $skripsi->semester == '12')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 12]) }}"
                                                type="button"
                                                class="flex-item bg-green-500 text-white px-4 py-2 rounded-md mr-2 mb-2">12</a>
                                        @else
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 12]) }}"
                                                type="button"
                                                class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">12</a>
                                        @endif
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">12</a>
                                    @endif

                                    {{-- semester 13 --}}
                                    @if (isset($irsMahasiswa[12]) && isset($khsMahasiswa[12]))
                                        @if (isset($pkl) && $pkl->semester == '13')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 13]) }}"
                                                type="button"
                                                class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2">13</a>
                                        @elseif (isset($skripsi) && $skripsi->semester == '13')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 13]) }}"
                                                type="button"
                                                class="flex-item bg-green-500 text-white px-4 py-2 rounded-md mr-2 mb-2">13</a>
                                        @else
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 13]) }}"
                                                type="button"
                                                class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">13</a>
                                        @endif
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">13</a>
                                    @endif

                                    {{-- semester 14 --}}
                                    @if (isset($irsMahasiswa[13]) && isset($khsMahasiswa[13]))
                                        @if (isset($pkl) && $pkl->semester == '14')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 14]) }}"
                                                type="button"
                                                class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2">14</a>
                                        @elseif (isset($skripsi) && $skripsi->semester == '14')
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 14]) }}"
                                                type="button"
                                                class="flex-item bg-green-500 text-white px-4 py-2 rounded-md mr-2 mb-2">14</a>
                                        @else
                                            <a href="{{ route('mahasiswa.dashboard.show.irs', ['semester' => 14]) }}"
                                                type="button"
                                                class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2">14</a>
                                        @endif
                                    @else
                                        <a type="button"
                                            class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2">14</a>
                                    @endif

                                </div>
                                <div class="container p-4">
                                    <div class="mb-3">Keterangan</div>

                                    <!-- Boxes with text for legend -->
                                    <div class="flex items-center mb-2">
                                        <div class="w-4 h-4 mr-2 rounded-full bg-red-600"></div>
                                        <p class="text">Belum diisikan (IRS dan KHS) atau tidak digunakan</p>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <div class="w-4 h-4 mr-2 rounded-full bg-blue-500"></div>
                                        <p class="text">Sudah diisikan (IRS dan KHS)</p>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <div class="w-4 h-4 mr-2 rounded-full bg-yellow-300"></div>
                                        <p class="text">Sudah Lulus PKL (IRS, KHS, dan PKL)</p>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 mr-2 rounded-full bg-green-500"></div>
                                        <p class="text">Sudah Lulus Skripsi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="mt-4 text-3xl font-bold text-gray-900 mb-4">Menu</h2>

                    <div class="card p-4">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 px-4 py-4">
                            <div class="col">
                                <div class="card">
                                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-01.jpg"
                                        alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                                        class="card-img-top">
                                    <div class="card-body text-center">
                                        <a href="{{ route('mahasiswa.profile') }}" class="card-title">Profile</a>
                                        <p class="card-text text-gray-600">Edit Profile</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card">
                                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-02-edition-03.jpg"
                                        alt="Collection of four insulated travel bottles on wooden shelf."
                                        class="card-img-top">
                                    <div class="card-body text-center">
                                        <a href="{{ route('mahasiswa.dashboard.akademik', ['mahasiswa' => $mahasiswa]) }}"
                                            class="card-title">Akademik</a>
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
