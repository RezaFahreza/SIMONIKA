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

</body>

</html>