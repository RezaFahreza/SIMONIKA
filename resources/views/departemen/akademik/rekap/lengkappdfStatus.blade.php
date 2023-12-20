<!DOCTYPE html>
<html>

<head>
    <title>PDF Rekap Status Seluruh Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container">
        <h2 class="text-center mt-3 font-bold">Rekap Berdasarkan Status Seluruh Mahasiswa</h2>
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
                                <td>{{ $RekapStatus['2016']['Aktif'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2017']['Aktif'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2018']['Aktif'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2019']['Aktif'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2020']['Aktif'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2021']['Aktif'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2022']['Aktif'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2023']['Aktif'] ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Cuti</td>
                                <td>{{ $RekapStatus['2016']['Cuti'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2017']['Cuti'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2018']['Cuti'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2019']['Cuti'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2020']['Cuti'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2021']['Cuti'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2022']['Cuti'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2023']['Cuti'] ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Mangkir</td>
                                <td>{{ $RekapStatus['2016']['Mangkir'] ?? 0 }}
                                </td>
                                <td>{{ $RekapStatus['2017']['Mangkir'] ?? 0 }}
                                </td>
                                <td>{{ $RekapStatus['2018']['Mangkir'] ?? 0 }}
                                </td>
                                <td>{{ $RekapStatus['2019']['Mangkir'] ?? 0 }}
                                </td>
                                <td>{{ $RekapStatus['2020']['Mangkir'] ?? 0 }}
                                </td>
                                <td>{{ $RekapStatus['2021']['Mangkir'] ?? 0 }}
                                </td>
                                <td>{{ $RekapStatus['2022']['Mangkir'] ?? 0 }}
                                </td>
                                <td>{{ $RekapStatus['2023']['Mangkir'] ?? 0 }}
                                </td>
                            </tr>
                            <tr>
                                <td>DO</td>
                                <td>{{ $RekapStatus['2016']['DO'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2017']['DO'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2018']['DO'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2019']['DO'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2020']['DO'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2021']['DO'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2022']['DO'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2023']['DO'] ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Undur Diri</td>
                                <td>{{ $RekapStatus['2016']['Undur Diri'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2017']['Undur Diri'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2018']['Undur Diri'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2019']['Undur Diri'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2020']['Undur Diri'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2021']['Undur Diri'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2022']['Undur Diri'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2023']['Undur Diri'] ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Lulus</td>
                                <td>{{ $RekapStatus['2016']['Lulus'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2017']['Lulus'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2018']['Lulus'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2019']['Lulus'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2020']['Lulus'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2021']['Lulus'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2022']['Lulus'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2023']['Lulus'] ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td>Meninggal Dunia</td>
                                <td>{{ $RekapStatus['2016']['Meninggal Dunia'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2017']['Meninggal Dunia'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2018']['Meninggal Dunia'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2019']['Meninggal Dunia'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2020']['Meninggal Dunia'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2021']['Meninggal Dunia'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2022']['Meninggal Dunia'] ?? 0 }}</td>
                                <td>{{ $RekapStatus['2023']['Meninggal Dunia'] ?? 0 }}</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
