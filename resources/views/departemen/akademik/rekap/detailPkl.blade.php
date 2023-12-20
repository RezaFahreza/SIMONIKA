@extends('layouts.templateDepartemen', ['title' => 'Detail PKL'])

@section('contents')
    <main>
        <div class="container">
            <div class="mx-auto py-6 sm:px-6 lg:px-8">
                <div class="container px-4 py-5">
                    <div class="card mt-4">
                        <div class="container mx-auto p-4">
                            <div class="text-center mt-5">
                                <h4 class="text-lg font-bold">Detail Rekap PKL</h4>
                                <h4 class="text-lg font-regular">Angkatan: {{$angkatan}}</h4>
                                @if ($status == 'lulus')
                                    <h4 class="text-lg font-regular">Status PKL: Sudah Ambil PKL</h4>
                                @else
                                    <h4 class="text-lg font-regular">Status PKL: Belum Ambil PKL</h4>
                                @endif
                            </div>
                            <div class="mt-4">
                                <a href="{{route('departemen.rekap.pkl.cetak.detail',['angkatan' => $angkatan, 'status'=> $status])}}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    target="_blank">Cetak PDF</a>
                            </div>
                            <table class='table-auto w-full border-collapse border border-gray-300 mt-4'>
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2">No</th>
                                        <th class="border border-gray-300 px-4 py-2">NIM</th>
                                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                                        <th class="border border-gray-300 px-4 py-2">Angkatan</th>
                                        <th class="border border-gray-300 px-4 py-2">Nilai PKL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($MahasiswaPKL->count() > 0)
                                        @foreach ($MahasiswaPKL as $mahasiswa)
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->nim}}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->nama}}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->angkatan}}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->nilai}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex justify-end p-3">
                        <a href="{{ route('departemen.rekap.pkl') }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
