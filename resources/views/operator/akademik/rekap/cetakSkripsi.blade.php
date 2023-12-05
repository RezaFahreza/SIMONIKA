<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="my-5">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Cetak Rekap Skripsi Mahasiswa</h5>
    </center>

    <div class="container mt-3">
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>24060</td>
                    <td>Rizqy</td>
                    <td>rizqy@gmail.com</td>
                    <td>Tembalang</td>
                    <td>081234567890</td>
                    <td>Sudah</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>