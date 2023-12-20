@extends('layouts.templateDepartemen', ['title' => 'Detail Skripsi'])

@section('contents')
    <main>
        <div class="container">
            <div class="mx-auto py-6 sm:px-6 lg:px-8">
                <div class="mt-5">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Detail Skripsi
                            </h3>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="card text-center">
                                <div class="card-header">
                                    <ul class="flex justify-center">
                                        @if (isset($pkl))
                                            <li class="mr-6">
                                                <a class="text-blue-500 hover:text-blue-700"
                                                    href="{{ route('departemen.akademik.profile.show.irs', compact('nim', 'semester')) }}">IRS</a>
                                            </li>
                                            <li class="mr-6">
                                                <a class="text-blue-500 hover:text-blue-700"
                                                    href="{{ route('departemen.akademik.profile.show.khs', compact('nim', 'semester')) }}">KHS</a>
                                            </li>
                                            <li class="mr-6">
                                                <a class="text-blue-500 hover:text-blue-700"
                                                    href="{{ route('departemen.akademik.profile.show.pkl', compact('nim', 'semester')) }}">PKL</a>
                                            </li>
                                        @elseif (isset($skripsi))
                                            <li class="mr-6">
                                                <a class="text-blue-500 hover:text-blue-700"
                                                    href="{{ route('departemen.akademik.profile.show.irs', compact('nim', 'semester')) }}">IRS</a>
                                            </li>
                                            <li class="mr-6">
                                                <a class="text-blue-500 hover:text-blue-700"
                                                    href="{{ route('departemen.akademik.profile.show.khs', compact('nim', 'semester')) }}">KHS</a>
                                            </li>
                                            <li>
                                                <a class="text-blue-500 hover:text-blue-700"
                                                    href="{{ route('departemen.akademik.profile.show.skripsi', compact('nim', 'semester')) }}">Skripsi</a>
                                            </li>
                                        @else
                                            <li class="mr-6">
                                                <a class="text-blue-500 hover:text-blue-700"
                                                    href="{{ route('departemen.akademik.profile.show.irs', compact('nim', 'semester')) }}">IRS</a>
                                            </li>
                                            <li class="mr-6">
                                                <a class="text-blue-500 hover:text-blue-700"
                                                    href="{{ route('departemen.akademik.profile.show.khs', compact('nim', 'semester')) }}">KHS</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h2 class="text-center mb-3">Semester {{$semester}}</h2>
                                    <table class="mx-auto">
                                        <tr>
                                            <td class="text-left">Nilai Skripsi</td>
                                            <td class="text-right">: {{ $skripsi->nilai_skripsi }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Tanggal Lulus Sidang</td>
                                            <td class="text-right">: {{ $skripsi->tanggal_lulus_sidang }}</td>
                                        </tr>
                                    </table>
                                    <div class="text-center text-blue-500 hover:text-blue-700 mt-3">
                                        <a href="{{ asset('storage/' . $skripsi->scan_berita_acara_sidang_skripsi) }}"
                                            target="_blank">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('departemen.akademik.profile', compact('nim')) }}" type="button"
                                class="flex-item bg-red-600 text-white px-2 py-2 rounded-md mr-2 mb-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
