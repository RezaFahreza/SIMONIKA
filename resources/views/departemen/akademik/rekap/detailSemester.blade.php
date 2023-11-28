@extends('layouts.main')

@section('contents')

    <head>
        <title>Flexbox Layout</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .flex-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                margin-top: 20px;
                gap: 10px;
            }

            .flex-item {
                width: calc(20% - 20px);
                height: 80px;
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 18px;
                font-weight: bold;
            }

            img{
                width: 200px;
                height: 200px;
            }

            .box-with-text {
                display: flex;
                
            }

            .box {
                
                width: 20px;
                height: 20px;
                background-color: #3498db;
            }

            .text {
                margin-left: 10px;
                font-size: 18px;
                color: #333;
            }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="container mt-4">
                    <h2 class="text-center mb-3">Progress Perkembangan Studi Mahasiswa Informatika</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{URL::asset('images/image1.jpg')}}" alt="Foto Mahasiswa" class="img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <table class="table mt-4">
                                        <tbody>
                                            <tr>
                                                <td>Nama:</td>
                                                <td>Rizky Akhmad Fahreza</td>
                                            </tr>
                                            <tr>
                                                <td>NIM:</td>
                                                <td>24060121130021</td>
                                            </tr>
                                            <tr>
                                                <td>Angkatan:</td>
                                                <td>2021</td>
                                            </tr>
                                            <tr>
                                                <td>Dosen Wali:</td>
                                                <td>Darrel Arsa Putranto</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
            <div class="flex-container">
                <div type="button" class="flex-item btn btn-primary" data-toggle="modal" style="background-color:steelblue">1</div>
                <div class="flex-item" style="background-color:steelblue">2</div>
                <div class="flex-item" style="background-color:steelblue">3</div>
                <div class="flex-item" style="background-color:steelblue">4</div>
                <div class="flex-item" style="background-color:steelblue">5</div>
                <div class="flex-item" style="background-color:gold">6</div>
                <div class="flex-item" style="background-color:steelblue">7</div>
                <div class="flex-item" style="background-color:green">8</div>
                <div class="flex-item" style="background-color:red">9</div>
                <div class="flex-item" style="background-color:red">10</div>
                <div class="flex-item" style="background-color:red">11</div>
                <div class="flex-item" style="background-color:red">12</div>
                <div class="flex-item" style="background-color:red">13</div>
                <div class="flex-item" style="background-color:red">14</div>
                <div class="flex-item" style="background-color:black"></div>
            </div>
        </div>
    
                <div class="container mt-5">
                <div class="card">
                    <div class="container">
                    <div class="mb-3">
                        Keterangan</div>
                    
                    <div class="box-with-text">
                        <div class="box" style="background-color: red"></div>
                        <p class="text">Belum diisikan (IRS dan KHS) atau tidak digunakan</p>
                    </div>
                    <div class="box-with-text">
                        <div class="box" style="background-color: steelblue"></div>
                        <p class="text">Sudah diisikan (IRS dan KHS)</p>
                    </div>
                    <div class="box-with-text">
                        <div class="box" style="background-color: gold"></div>
                        <p class="text">Sudah Lulus PKL (IRS, KHS, dan PKL)</p>
                    </div>
                    <div class="box-with-text">
                        <div class="box" style="background-color: green"></div>
                        <p class="text">Sudah Lulus Skripsi</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </body>
</html>
