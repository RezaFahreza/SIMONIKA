@extends('layouts.templateDepartemen', ['title' => 'Rekap PKL'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5">
                <div class="card">
                    <h2 class="text-center mt-3">Rekap Progress PKL Mahasiswa</h2>
                    <div class="table-container mt-4">
                        <div class="table-responsive">
                            <div class="box" style="background-color: black; width: auto; height: 2px"></div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <h2 class="text-center my-3">Angkatan</h2>
                                        <div class="box" style="background-color: black; width: auto; height: 2px"></div>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center">2016</td>
                                        <td colspan="2" class="text-center">2017</td>
                                        <td colspan="2" class="text-center">2018</td>
                                        <td colspan="2" class="text-center">2019</td>
                                        <td colspan="2" class="text-center">2020</td>
                                        <td colspan="2" class="text-center">2021</td>
                                        <td colspan="2" class="text-center">2022</td>
                                        <td colspan="2" class="text-center">2023</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Sudah</td>
                                        <td class="text-center">Belum</td>
                                        <td class="text-center">Sudah</td>
                                        <td class="text-center">Belum</td>
                                        <td class="text-center">Sudah</td>
                                        <td class="text-center">Belum</td>
                                        <td class="text-center">Sudah</td>
                                        <td class="text-center">Belum</td>
                                        <td class="text-center">Sudah</td>
                                        <td class="text-center">Belum</td>
                                        <td class="text-center">Sudah</td>
                                        <td class="text-center">Belum</td>
                                        <td class="text-center">Sudah</td>
                                        <td class="text-center">Belum</td>
                                        <td class="text-center">Sudah</td>
                                        <td class="text-center">Belum</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2016', 'status' => 'lulus'])}}" class="btn btn-link" >{{$RekapPklPerAngkatan['2016']['jumlah_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2016', 'status' => 'belum ambil'])}}" class="btn btn-link">{{$RekapPklPerAngkatan['2016']['jumlah_belum_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2017', 'status' => 'lulus'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2017']['jumlah_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2017', 'status' => 'belum ambil'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2017']['jumlah_belum_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2018', 'status' => 'lulus'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2018']['jumlah_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2018', 'status' => 'belum ambil'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2018']['jumlah_belum_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2019', 'status' => 'lulus'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2019']['jumlah_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2019', 'status' => 'belum ambil'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2019']['jumlah_belum_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2020', 'status' => 'lulus'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2020']['jumlah_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2020', 'status' => 'belum ambil'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2020']['jumlah_belum_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2021', 'status' => 'lulus'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2021']['jumlah_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2021', 'status' => 'belum ambil'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2021']['jumlah_belum_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2022', 'status' => 'lulus'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2022']['jumlah_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2022', 'status' => 'belum ambil'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2022']['jumlah_belum_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2023', 'status' => 'lulus'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2023']['jumlah_ambil'] ?? 0}}</a></td>
                                        <td class="text-center"><a href="{{route ("departemen.rekap.pkl.detail", ['angkatan' => '2023', 'status' => 'belum ambil'])}}" class="btn btn-link" class="btn btn-link">{{$RekapPklPerAngkatan['2023']['jumlah_belum_ambil'] ?? 0}}</a></td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="flex justify-end p-3">
                        <a href="{{route('departemen.rekap.pkl.cetak')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" target="_blank">Cetak Semua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection