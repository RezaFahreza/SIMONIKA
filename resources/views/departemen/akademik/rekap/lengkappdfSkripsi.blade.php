<!DOCTYPE html>
<html>

<head>
    <title>PDF Rekap Skripsi Seluruh Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <h2 class="text-center mt-3">Rekap Progress Skripsi Seluruh Mahasiswa</h2>
    <div class="flex justify-center">
        <table class="table text-center w-[100px]">
            <tbody class="w-[100px]">
                <tr>
                    <h2 class="text-center my-3">Angkatan</h2>

                </tr>
                <tr>
                    <td colspan="2">2016</td>
                    <td colspan="2">2017</td>
                    <td colspan="2">2018</td>
                    <td colspan="2">2019</td>
                    <td colspan="2">2020</td>
                    <td colspan="2">2021</td>
                    <td colspan="2">2022</td>
                    <td colspan="2">2023</td>
                </tr>
                <tr>
                    <td>Sudah</td>
                    <td>Belum</td>
                    <td>Sudah</td>
                    <td>Belum</td>
                    <td>Sudah</td>
                    <td>Belum</td>
                    <td>Sudah</td>
                    <td>Belum</td>
                    <td>Sudah</td>
                    <td>Belum</td>
                    <td>Sudah</td>
                    <td>Belum</td>
                    <td>Sudah</td>
                    <td>Belum</td>
                    <td>Sudah</td>
                    <td>Belum</td>
                </tr>
                <tr>
                    <td>{{ $RekapSkripsiPerAngkatan['2016']['jumlah_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2016']['jumlah_belum_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2017']['jumlah_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2017']['jumlah_belum_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2018']['jumlah_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2018']['jumlah_belum_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2019']['jumlah_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2019']['jumlah_belum_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2020']['jumlah_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2020']['jumlah_belum_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2021']['jumlah_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2021']['jumlah_belum_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2022']['jumlah_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2022']['jumlah_belum_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2023']['jumlah_ambil'] ?? 0 }}
                    </td>
                    <td>{{ $RekapSkripsiPerAngkatan['2023']['jumlah_belum_ambil'] ?? 0 }}
                    </td>
                </tr>
        </table>
    </div>
</body>

</html>
