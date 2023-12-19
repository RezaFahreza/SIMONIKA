@extends('layouts.templateDepartemen', ['title' => 'Detail Skripsi'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5">
                <div class="card mt-4">
                    <div class="container mx-auto p-4">
                        <div class="text-center mt-5">
                            <h4 class="text-lg font-bold">Detail Rekap Skripsi</h4>
                        </div>
                        <div class="mt-4">
                            <a href="/pegawai/cetak_pdf" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" target="_blank">Cetak PDF</a>
                        </div>
                        <table class='table-auto w-full border-collapse border border-gray-300 mt-4'>
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2">No</th>
                                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                                    <th class="border border-gray-300 px-4 py-2">Email</th>
                                    <th class="border border-gray-300 px-4 py-2">Alamat</th>
                                    <th class="border border-gray-300 px-4 py-2">Telepon</th>
                                    <th class="border border-gray-300 px-4 py-2">Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                <td class="border border-gray-300 px-4 py-2">{{ $i++ }}</td>
                                <td class="border border-gray-300 px-4 py-2">jakskuy</td>
                                <td class="border border-gray-300 px-4 py-2">abc@gmail.com</td>
                                <td class="border border-gray-300 px-4 py-2">Tangerang</td>
                                <td class="border border-gray-300 px-4 py-2">08123456789</td>
                                <td class="border border-gray-300 px-4 py-2">Mahasiswa</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection