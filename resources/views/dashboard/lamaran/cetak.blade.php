<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu</title>
    <style>
        .container {
            border: 1px solid black;
            height: 550px;
            width: 450px;
            text-align: center;
            margin: auto;
        }

        .column {
            float: left;
            text-align: center;
            width: 33.33%;
        }

        /* Clear floats after the columns */
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
        }

        p {
            margin-top: 15px;
        }

        .foto-peserta {
            float: right;
        }

        .column2 {
            margin-bottom: 20px;
            float: left;
            text-align: center;
            width: 50%;
        }

        .kotak-pendaftaran {
            border: 1px solid black;
            width: 60px; 
            height: 60px; 
            margin-left: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
			padding: 20px;
        }

        .kotak-pendaftaran h4 {
            margin: 0;
            padding: 5px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <img src="data:image/png;base64,{{ $logoBKK }}" alt="Logo Instansi" style="width:100px; margin-top: 40px;" height="60px">
            </div>
            <div class="column">
                <h2>BKK SMK KORPRI MAJALENGKA</h2>
            </div>
            <div class="column">
                <img src="data:image/png;base64,{{ $logoSekolah }}" alt="Logo Instansi" style="width:100px; margin-top: 20px;" height="95px">
            </div>
        </div>
        <hr style="width: 85%; text-align: center;">

        <h3 style="text-align: center">Kartu Pendaftaran {{ $lowongan->perusahaan }}</h3>

        <div class="row">
            <div class="column2">
                <div class="kotak-pendaftaran">
                    <h4>
                        Kode Pendaftaran <br>
                        {{ $pendaftar->kode_pendaftaran }}
                    </h4>
                </div>
            </div>
            <div class="column2">
                <img src="data:image/png;base64,{{ $fotoPeserta }}" alt="Foto Peserta" style="width:100px; height:100px;">
            </div>
        </div>
    
        <table>
            <tr>
                <td><b>Nama</b></td>
                <td>:</td>
                <td>{{ $pendaftar->nama }}</td>
            </tr>
            <tr>
                <td><b>Jurusan</b></td>
                <td>:</td>
                <td>{{ $pendaftar->jurusan }}</td>
            </tr>
            <tr>
                <td><b>Asal Sekolah</b></td>
                <td>:</td>
                <td>{{ $pendaftar->asal_sekolah }}</td>
            </tr>
            <tr>
                <td><b>Jenis Kelamin</b></td>
                <td>:</td>
                <td>{{ $pendaftar->jenis_kelamin }}</td>
            </tr>
        </table>

        <p style="margin-top: 40px">Kartu ini wajib dibawa saat melakukan daftar ulang <br> atau pelaksanaan seleksi</p>
    </div>
    
</body>
</html>
