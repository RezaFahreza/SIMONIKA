@extends('layouts.templateDepartemen', ['title' => 'Search'])

@section('contents')

<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5">
                <h2 class="mt-4 text-3xl font-bold text-gray-900 mb-4">Pencarian Progress Studi Mahasiswa</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="get">
                            @csrf
                            <div class="form-group">
                                <input type="search" class="form-control" id="search-input" name="search-input" placeholder="Masukkan NIM atau Nama">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg px-2 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Hasil pencarian akan ditampilkan di sini -->
                <div class="card mt-4">
                    <h3 class="text-center mt-4">Mahasiswa Departemen</h3>
                    <table class="text-center table table-striped mt-3">
                        <thead>
                            <tr>
                                <th class="align-middle">NIM</th>
                                <th class="align-middle">Nama</th>
                                <th class="align-middle">Angkatan</th>
                                <th class="align-middle">Progress Studi</th>
                            </tr>
                        </thead>
                        <tbody id="search-results">
                                @if ($mahasiswaDepartemen->count() > 0)
                                    @foreach ($mahasiswaDepartemen as $mahasiswa)
                                        <tr>
                                            <td class="align-middle">{{ $mahasiswa->nim }}</td>
                                            <td class="align-middle">{{ $mahasiswa->nama }}</td>
                                            <td class="align-middle">{{ $mahasiswa->angkatan }}</td>
                                            <td class="align-middle"><a
                                                    href="{{ route('departemen.akademik.profile', ['nim' => $mahasiswa->nim]) }}">Lihat
                                                    Progress</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
            $(document).ready(function() {
                $('#search-input').on('input', function(e) {

                    let keyword = $(this).val();

                    $.ajax({
                        type: 'GET',
                        url: '{{ route('departemen.akademik.search') }}',
                        data: {
                            keyword: keyword
                        },
                        success: function(response) {
                            displayResults(response.results);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });

                function displayResults(results) {
                    let resultContainer = $('#search-results');
                    resultContainer.empty();

                    if (results.length > 0) {
                        for (let i = 0; i < results.length; i++) {
                            // let iteration = resultContainer.find('tr').eq(i).data('iteration');
                            resultContainer.append(`
                                <tr>
                                    <td class="align-middle">${results[i].nim}</td>
                                    <td class="align-middle">${results[i].nama}</td>
                                    <td class="align-middle">${results[i].angkatan}</td>
                                    <td class="align-middle"><a href="{{ route('departemen.akademik.profile', ['nim' => $mahasiswa->nim]) }}">Lihat Progress</a></td>
                                </tr>
                            `);
                        }
                    } else {
                        resultContainer.append(`<tr><td class="align-middle" colspan="4">Tidak ada hasil</td></tr>`);
                    }
                }
            });
        </script>

@endsection