<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pendaftar</title>
    <style>
        .container {
            text-align: center;
            margin: auto;
        }

        .column {
            float: left;
            text-align: center;
            width: 33.33%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        table {
            margin: auto;
            width: 80%;
        }

        tr {
            text-align: left;
        }

        table, th, td {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th, td {
            padding: 5px;
        }

        th{
            background-color: gainsboro;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <img src="data:image/png;base64,{{ $logoBKK }}" alt="Logo Instansi" style="width:100px; margin-top: 10px;" height="60px">
            </div>
            <div class="column">
                <h2>BKK SMK KORPRI MAJALENGKA</h2>
            </div>
            <div class="column">
                <img src="data:image/png;base64,{{ $logoSekolah }}" alt="Logo Instansi" style="width:100px; " height="95px">
            </div>
        </div>
        <p>Jl. Raya Tonjong - Pinangraja Km. 1, Cicenang, Kec. Cigasong, <br> Kabupaten Majalengka, Jawa Barat 45476</p>
        <hr style="width: 85%; text-align: center;">
        <h4 style="text-align: center;">Data Pendaftar {{ $lowongan->perusahaan }}</h4>
    
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode Pendaftaran</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Sekolah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lowongan->pendaftars as $list)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $list->nama }}</td>
                        <td>{{ $list->kode_pendaftaran }}</td>
                        <td>{{ $list->jurusan }}</td>
                        <td>{{ $list->jenis_kelamin }}</td>
                        <td>{{ $list->asal_sekolah }}</td>
                    </tr>  
                @endforeach                     
            </tbody>
        </table>
    </div>
</body>
</html>