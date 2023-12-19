<!DOCTYPE html>
<html>

<head>
    <title>PDF Rekap Status</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <div class="text-center mt-5">
            <h4 class="text-lg font-bold">PDF Rekap Status</h4>
            <h4 class="text-lg font-regular">Angkatan: {{ $angkatan }}</h4>
            <h4 class="text-lg font-regular">Status Kemahasiswaan: {{ $status }}</h4>
        </div>
        <table class='table-auto w-full border-collapse border border-gray-300 mt-4'>
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">NIM</th>
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">Angkatan</th>
                    <th class="border border-gray-300 px-4 py-2">Jalur Masuk</th>
                </tr>
            </thead>
            <tbody>
                @if ($MahasiswaStatus->count() > 0)
                    @foreach ($MahasiswaStatus as $mahasiswa)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->nim }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->nama }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->angkatan }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->jalur_masuk }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

</body>

</html>
