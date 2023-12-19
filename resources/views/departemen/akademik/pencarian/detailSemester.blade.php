@extends('layouts.templateDepartemen', ['title' => 'Detail Semester'])
@extends('departemen.akademik.pencarian.detailIrsMahasiswa')
@extends('departemen.akademik.pencarian.detailKhsMahasiswa')
@extends('departemen.akademik.pencarian.detailPklMahasiswa')
@extends('departemen.akademik.pencarian.detailSkripsiMahasiswa')

@section('contents')
<main class="container">
    <div class="mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-5">
            <div class="card p-4 ">
                <div class="container">
                    <h2 class="text-center mb-3 font-semibold">Progress Perkembangan Studi Mahasiswa Informatika</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:flex md:items-center">
                                    <img src="{{ asset('images/image1.jpg') }}" alt="Foto Mahasiswa" class="w-full md:w-2/3 mx-auto md:mx-0">
                                </div>
                                <div class="md:flex md:items-center">
                                    <table class="table mt-4 md:mx-auto">
                                        <tbody>
                                            <tr>
                                                <td>Nama:</td>
                                                <td>Rizky Akhmad Fahreza</td>
                                            </tr>
                                            <tr>
                                                <td>NIM:</td>
                                                <td>24060121130021</td>
                                            </tr>
                                            <tr>
                                                <td>Angkatan:</td>
                                                <td>2021</td>
                                            </tr>
                                            <tr>
                                                <td>Dosen Wali:</td>
                                                <td>Darrel Arsa Putranto</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="container">
                                <div class="flex justify-between flex-wrap">
                                    <div type="button" class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-irs" data-modal-toggle="default-irs">1</div>
                                    <div type="button" class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-khs" data-modal-toggle="default-khs">2</div>
                                    <div type="button" class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">3</div>
                                    <div type="button" class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">4</div>
                                    <div type="button" class="flex-item bg-blue-500 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">5</div>
                                    <div type="button" class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">6</div>
                                    <div type="button" class="flex-item bg-yellow-300 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">7</div>
                                    <div type="button" class="flex-item bg-green-500 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">8</div>
                                    <div type="button" class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">9</div>
                                    <div type="button" class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">10</div>
                                    <div type="button" class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">11</div>
                                    <div type="button" class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">12</div>
                                    <div type="button" class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">13</div>
                                    <div type="button" class="flex-item bg-red-600 text-white px-4 py-2 rounded-md mr-2 mb-2" data-modal-target="default-modal" data-modal-toggle="default-modal">14</div>
                                    <div type="button" class="flex-item bg-dark text-white px-4 py-2 rounded-md mr-2 mb-2"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-3">
                    <div class="card">
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
        </div>
    </div>
</main>
@endsection