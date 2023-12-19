@extends('layouts.templateDepartemen', ['title' => 'Rekap Status'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5">
                <h2 class="text-center mt-3 font-bold">Rekap Berdasarkan Status Mahasiswa</h2>
                <div class="card mt-4">
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <tbody>
                                    <tr>
                                        <td rowspan="2" class="align-bottom">Status</td>
                                        <td colspan="8">Angkatan</td>
                                    </tr>
                                    <tr>
                                        <td>2016</td>
                                        <td>2017</td>
                                        <td>2018</td>
                                        <td>2019</td>
                                        <td>2020</td>
                                        <td>2021</td>
                                        <td>2022</td>
                                        <td>2023</td>
                                    </tr>
                                    <tr>
                                        <td>Aktif</td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2016', 'status' => 'Aktif'])}}" class="btn btn-link">{{ $RekapStatus['2016']['Aktif'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2017', 'status' => 'Aktif'])}}" class="btn btn-link">{{ $RekapStatus['2017']['Aktif'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2018', 'status' => 'Aktif'])}}" class="btn btn-link">{{ $RekapStatus['2018']['Aktif'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2019', 'status' => 'Aktif'])}}" class="btn btn-link">{{ $RekapStatus['2019']['Aktif'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2020', 'status' => 'Aktif'])}}" class="btn btn-link">{{ $RekapStatus['2020']['Aktif'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2021', 'status' => 'Aktif'])}}" class="btn btn-link">{{ $RekapStatus['2021']['Aktif'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2022', 'status' => 'Aktif'])}}" class="btn btn-link">{{ $RekapStatus['2022']['Aktif'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2023', 'status' => 'Aktif'])}}" class="btn btn-link">{{ $RekapStatus['2023']['Aktif'] ?? 0}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Cuti</td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2016', 'status' => 'Cuti'])}}" class="btn btn-link">{{ $RekapStatus['2016']['Cuti'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2017', 'status' => 'Cuti'])}}" class="btn btn-link">{{ $RekapStatus['2017']['Cuti'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2018', 'status' => 'Cuti'])}}" class="btn btn-link">{{ $RekapStatus['2018']['Cuti'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2019', 'status' => 'Cuti'])}}" class="btn btn-link">{{ $RekapStatus['2019']['Cuti'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2020', 'status' => 'Cuti'])}}" class="btn btn-link">{{ $RekapStatus['2020']['Cuti'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2021', 'status' => 'Cuti'])}}" class="btn btn-link">{{ $RekapStatus['2021']['Cuti'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2022', 'status' => 'Cuti'])}}" class="btn btn-link">{{ $RekapStatus['2022']['Cuti'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2023', 'status' => 'Cuti'])}}" class="btn btn-link">{{ $RekapStatus['2023']['Cuti'] ?? 0}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Mangkir</td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2016', 'status' => 'Mangkir'])}}" class="btn btn-link">{{ $RekapStatus['2016']['Mangkir'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2017', 'status' => 'Mangkir'])}}" class="btn btn-link">{{ $RekapStatus['2017']['Mangkir'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2018', 'status' => 'Mangkir'])}}" class="btn btn-link">{{ $RekapStatus['2018']['Mangkir'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2019', 'status' => 'Mangkir'])}}" class="btn btn-link">{{ $RekapStatus['2019']['Mangkir'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2020', 'status' => 'Mangkir'])}}" class="btn btn-link">{{ $RekapStatus['2020']['Mangkir'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2021', 'status' => 'Mangkir'])}}" class="btn btn-link">{{ $RekapStatus['2021']['Mangkir'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2022', 'status' => 'Mangkir'])}}" class="btn btn-link">{{ $RekapStatus['2022']['Mangkir'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2023', 'status' => 'Mangkir'])}}" class="btn btn-link">{{ $RekapStatus['2023']['Mangkir'] ?? 0}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>DO</td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2016', 'status' => 'DO'])}}" class="btn btn-link">{{ $RekapStatus['2016']['DO'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2017', 'status' => 'DO'])}}" class="btn btn-link">{{ $RekapStatus['2017']['DO'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2018', 'status' => 'DO'])}}" class="btn btn-link">{{ $RekapStatus['2018']['DO'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2019', 'status' => 'DO'])}}" class="btn btn-link">{{ $RekapStatus['2019']['DO'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2020', 'status' => 'DO'])}}" class="btn btn-link">{{ $RekapStatus['2020']['DO'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2021', 'status' => 'DO'])}}" class="btn btn-link">{{ $RekapStatus['2021']['DO'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2022', 'status' => 'DO'])}}" class="btn btn-link">{{ $RekapStatus['2022']['DO'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2023', 'status' => 'DO'])}}" class="btn btn-link">{{ $RekapStatus['2023']['DO'] ?? 0}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Undur Diri</td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2016', 'status' => 'Undur Diri'])}}" class="btn btn-link">{{ $RekapStatus['2016']['Undur Diri'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2017', 'status' => 'Undur Diri'])}}" class="btn btn-link">{{ $RekapStatus['2017']['Undur Diri'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2018', 'status' => 'Undur Diri'])}}" class="btn btn-link">{{ $RekapStatus['2018']['Undur Diri'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2019', 'status' => 'Undur Diri'])}}" class="btn btn-link">{{ $RekapStatus['2019']['Undur Diri'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2020', 'status' => 'Undur Diri'])}}" class="btn btn-link">{{ $RekapStatus['2020']['Undur Diri'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2021', 'status' => 'Undur Diri'])}}" class="btn btn-link">{{ $RekapStatus['2021']['Undur Diri'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2022', 'status' => 'Undur Diri'])}}" class="btn btn-link">{{ $RekapStatus['2022']['Undur Diri'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2023', 'status' => 'Undur Diri'])}}" class="btn btn-link">{{ $RekapStatus['2023']['Undur Diri'] ?? 0}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Lulus</td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2016', 'status' => 'Lulus'])}}" class="btn btn-link">{{ $RekapStatus['2016']['Lulus'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2017', 'status' => 'Lulus'])}}" class="btn btn-link">{{ $RekapStatus['2017']['Lulus'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2018', 'status' => 'Lulus'])}}" class="btn btn-link">{{ $RekapStatus['2018']['Lulus'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2019', 'status' => 'Lulus'])}}" class="btn btn-link">{{ $RekapStatus['2019']['Lulus'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2020', 'status' => 'Lulus'])}}" class="btn btn-link">{{ $RekapStatus['2020']['Lulus'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2021', 'status' => 'Lulus'])}}" class="btn btn-link">{{ $RekapStatus['2021']['Lulus'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2022', 'status' => 'Lulus'])}}" class="btn btn-link">{{ $RekapStatus['2022']['Lulus'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2023', 'status' => 'Lulus'])}}" class="btn btn-link">{{ $RekapStatus['2023']['Lulus'] ?? 0}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Meninggal Dunia</td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2016', 'status' => 'Meninggal Dunia'])}}" class="btn btn-link">{{ $RekapStatus['2016']['Meninggal Dunia'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2017', 'status' => 'Meninggal Dunia'])}}" class="btn btn-link">{{ $RekapStatus['2017']['Meninggal Dunia'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2018', 'status' => 'Meninggal Dunia'])}}" class="btn btn-link">{{ $RekapStatus['2018']['Meninggal Dunia'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2019', 'status' => 'Meninggal Dunia'])}}" class="btn btn-link">{{ $RekapStatus['2019']['Meninggal Dunia'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2020', 'status' => 'Meninggal Dunia'])}}" class="btn btn-link">{{ $RekapStatus['2020']['Meninggal Dunia'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2021', 'status' => 'Meninggal Dunia'])}}" class="btn btn-link">{{ $RekapStatus['2021']['Meninggal Dunia'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2022', 'status' => 'Meninggal Dunia'])}}" class="btn btn-link">{{ $RekapStatus['2022']['Meninggal Dunia'] ?? 0}}</a></td>
                                        <td><a href="{{ route('departemen.rekap.status.detail', ['angkatan' => '2023', 'status' => 'Meninggal Dunia'])}}" class="btn btn-link">{{ $RekapStatus['2023']['Meninggal Dunia'] ?? 0}}</a></td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="flex justify-end p-3">
                        <a href="/departemen/akademik/rekap/pdfstatus" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" target="_blank">Cetak Semua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection