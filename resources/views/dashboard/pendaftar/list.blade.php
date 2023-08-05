@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <h1 class="h3">Data Pendaftar {{ $lowongan->perusahaan }}</h1>
        <a href="/dashboard/pendaftar/" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
        <a href="/dashboard/pendaftar/print-pdf/{{ $lowongan->slug }}" type="button" class="btn btn-danger mb-3 float-end"><i class="bi bi-filetype-pdf"></i> Print Pdf</a>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready( function () {
        $('#table_id').DataTable();
    } );
    </script>

@endsection

