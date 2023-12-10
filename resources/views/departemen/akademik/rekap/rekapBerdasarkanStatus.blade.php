@extends('layouts.templateDepartemen', ['title' => 'Rekap Status'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5">
                <div class="card p-4">
                    <h2 class="text-center mb-4">Rekap Mahasiswa</h2>
                    <div class="box" style="background-color: black; width: auto; height: 2px"></div>
                    <form id="filterForm" action="#" method="get">
                        <div class="form-group">
                            <label class="mt-3" for="angkatan">Angkatan</label>
                            <select name="angkatan" class="form-control" required>
                                <option value="">Angkatan</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>

                            <label class="mt-3" for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">Status</option>
                                <option value="2016">Aktif</option>
                                <option value="2017">Cuti</option>
                            </select>
                        </div>
                        <div class="flex justify-end p-3">
                            <button class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-20" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container px-4">
                <div class="card p-4">
                    <h2 class="text-center">List Mahasiswa</h2>
                    <div class="table-container mt-4">
                        <div class="table-responsive">
                            <div class="box" style="background-color: black; width: auto; height: 2px"></div>
                            <table id="mahasiswaTable" class="table">
                                <tbody id="mahasiswaTableBody">
                                    <tr>
                                        <td class="text-center">No</td>
                                        <td class="text-center">Nim</td>
                                        <td class="text-center">Nama</td>
                                        <td class="text-center">Angkatan</td>
                                        <td class="text-center">Status</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">24060121140153</td>
                                        <td class="text-center">Fikri Prasetya Nurhidayat</td>
                                        <td class="text-center">2021</td>
                                        <td class="text-center">Aktif</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">24060121140159</td>
                                        <td class="text-center">Zaeri Haikal Rabbani</td>
                                        <td class="text-center">2021</td>
                                        <td class="text-center">Aktif</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">24060121140131</td>
                                        <td class="text-center">M Raihan Ridho Khoslarudwarifar</td>
                                        <td class="text-center">2021</td>
                                        <td class="text-center">Aktif</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">24060121140151</td>
                                        <td class="text-center">Derva Anargya Ghaly</td>
                                        <td class="text-center">2021</td>
                                        <td class="text-center">Aktif</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">24060121140099</td>
                                        <td class="text-center">Satria Bintang Adyatma Putra</td>
                                        <td class="text-center">2021</td>
                                        <td class="text-center">Cuti</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td class="text-center">24060121140173</td>
                                        <td class="text-center">Puti Dhiya Salsabila Rahman</td>
                                        <td class="text-center">2021</td>
                                        <td class="text-center">Cuti</td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="flex justify-end p-3">
                        <button class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-20" type="submit">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection