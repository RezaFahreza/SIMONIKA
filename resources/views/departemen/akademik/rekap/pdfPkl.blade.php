<!DOCTYPE html>
<html>

<head>
    <title>PDF Rekap PKL</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <div class="text-center mt-5">
            <h4 class="text-lg font-bold">PDF Rekap PKL</h4>
            <h4 class="text-lg font-regular">Angkatan: {{ $angkatan }}</h4>
            @if ($status == 'lulus')
                <h4 class="text-lg font-regular">Status PKL: Sudah Ambil PKL</h4>
            @else
                <h4 class="text-lg font-regular">Status PKL: Belum Ambil PKL</h4>
            @endif
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
                @php $i=1 @endphp
                @foreach ($MahasiswaPKL as $mahasiswa)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $i++ }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->nim }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->nama }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->angkatan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $mahasiswa->nilai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
