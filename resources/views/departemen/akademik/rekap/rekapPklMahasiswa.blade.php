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
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">45</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">87</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">45</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">87</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">45</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">87</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">45</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">87</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">45</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">87</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">45</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">87</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">45</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">87</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">45</a></td>
                                        <td class="text-center"><a href="/departemen/akademik/rekap/pdfpkl" class="btn btn-link" target="_blank">87</a></td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="flex justify-end p-3">
                        <a href="/departemen/akademik/rekap/pdfpkl" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" target="_blank">Cetak Semua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection