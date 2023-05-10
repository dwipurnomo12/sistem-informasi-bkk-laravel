<!DOCTYPE html>
<html>
<head>
	<title>Kartu Peserta Ujian</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
		}
		h1, h2 {
			margin: 0;
			padding: 0;
			text-align: center;
		}
		h1 {
			font-size: 20px;
			margin-bottom: 10px;
		}
		h2 {
			font-size: 16px;
			margin-bottom: 5px;
		}
		.container {
			border: 2px solid #ccc;
			padding: 20px;
			width: 400px;
			margin: 0 auto;
		}
		.row {
			display: flex;
			margin-bottom: 10px;
		}
		.col-6 {
			flex: 0 0 50%;
			max-width: 50%;
		}
		.label {
			font-weight: bold;
			flex: 0 0 30%;
			max-width: 30%;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>BKK SMK N Purworejo</h1>
        <h3 style="text-align: center">Kartu Pendaftaran {{ $lowongan->perusahaan }}</h3>
		<hr>
		<div class="row">
			<div class="col-6 label">Kode Pendaftaran:</div>
			<div class="col-6">{{ $pendaftar->kode_pendaftaran  }}</div>
		</div>
		<div class="row">
			<div class="col-6 label">Nama Peserta:</div>
			<div class="col-6">{{ $pendaftar->nama }}</div>
		</div>
		<div class="row">
			<div class="col-6 label">Jurusan :</div>
			<div class="col-6">{{ $pendaftar->jurusan }}</div>
		</div>
		<div class="row">
			<div class="col-6 label">Asal Sekolah :</div>
			<div class="col-6">{{ $pendaftar->asal_sekolah }}</div>
		</div>
		<div class="row">
			<div class="col-6 label">Jenis Kelamin :</div>
			<div class="col-6">{{ $pendaftar->jenis_kelamin }}</div>
		</div>

		<hr>
		<h2>Peraturan BKK</h2>
		<ul>
			<li>Kartu ini wajib dibawa saat melakukan daftar ulang atau pelaksanaan seleksi</li>
		</ul>
	</div>
</body>
</html>
