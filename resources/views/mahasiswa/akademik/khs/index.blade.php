@extends('layouts.templateMahasiswa', ['title' => 'KHS'])

@section('contents')
<main>
    <div class="container">
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <div class="container px-4 py-5 mt-5">
                <div class="card text">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.irs') }}">IRS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.khs') }}">KHS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.pkl') }}">PKL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="true" href="{{ route('mahasiswa.dashboard.akademik.skripsi') }}">Skripsi</a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Nama: {{ $mahasiswa->nama }}</h3>
                                            <p>NIM: {{ $mahasiswa->nim }}</p>
                                            <!-- Tambahkan data biodata lainnya di sini -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h1 class="mb-0">KHS</h1>
                                        <a href="{{ route('mahasiswa.dashboard.akademik.khs.create') }}" class="btn btn-primary">+ Tambah Entry KHS</a>
                                    </div>
                                    <hr />
                                    @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                    @endif
                                    <table class="table table-hover">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Semester Aktif</th>
                                                <th>Jumlah SKS Semester</th>
                                                <th>SKS_Kumulatif</th>
                                                <th>IP Semester</th>
                                                <th>IP Kumulatif</th>
                                                <th>Status Validasi</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($khsMahasiswa->count() > 0)
                                            @foreach ($khsMahasiswa as $khs)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">{{ $khs->semester_aktif }}</td>
                                                <td class="align-middle">{{ $khs->jumlah_sks_semester }}</td>
                                                <td class="align-middle">{{ $khs->sks_kumulatif}}</td>
                                                <td class="align-middle">{{ $khs->ip_semester }}</td>
                                                <td class="align-middle">{{ $khs->ip_kumulatif }}</td>
                                                <td class="align-middle">{{ $khs->status_validasi }}</td>
                                                <td class="align-middle">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ route('mahasiswa.dashboard.akademik.khs.show', ['id' => $khs->id]) }}" type="button" class="btn btn-link">Detail</a>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td class="text-center" colspan="8">KHS tidak Ditemukan</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection