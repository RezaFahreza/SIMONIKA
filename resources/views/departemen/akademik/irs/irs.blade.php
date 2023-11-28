@extends('layouts.main')

@section('contents')
    <div class="container mt-5">
        <div class="card">
            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="irs-tab" data-toggle="tab" href="#irs">IRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="khs-tab" data-toggle="tab" href="#khs">KHS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pkl-tab" data-toggle="tab" href="#pkl">PKL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="skripsi-tab" data-toggle="tab" href="#skripsi">Skripsi</a>
                </li>
            </ul>
            <h4 class="text-center mt-3">IRS</h4>
            <div class="card-body">
                <!-- Tabel IRS -->
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Semester</th>
                            <th>Jumlah SKS</th>
                            <th>File IRS</th>
                            <th>Status Validasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Semester 1</td>
                            <td>20</td>
                            <td><a href="irs_file.pdf" target="_blank">IRS.pdf</a></td>
                            <td>Belum divalidasi</td>
                            <td>
                                <button class="btn btn-success">Approve</button>
                                <button class="btn btn-danger">Tolak</button>
                            </td>
                        </tr>
                        <!-- Tambahkan baris lainnya sesuai data IRS yang perlu divalidasi -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
