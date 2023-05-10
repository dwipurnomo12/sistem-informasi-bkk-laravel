@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <h1 class="h3">Semua Lowongan</h1>
        <a href="/dashboard/lowongan/create" type="button" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Posting Baru</a>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table id="table_id" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Perusahaan</th>
                                        <th>Posisi</th>
                                        <th>Batas Waktu</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lowongans as $lowongan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $lowongan->judul }}</td>
                                            <td>{{ $lowongan->perusahaan }}</td>
                                            <td>{{ $lowongan->posisi }}</td>
                                            <td>{{ $lowongan->batas_waktu }}</td>
                                            <td>
                                                <a href="/dashboard/lowongan/{{ $lowongan->slug }}" class="btn btn-success mb-2"><i class="bi bi-eye-fill"></i></a>
                                                <a href="/dashboard/lowongan/{{ $lowongan->slug }}/edit" class="btn btn-warning  mb-2"><i class="bi bi-pencil-fill"></i></a>
                                                <form id="{{ $lowongan->slug }}" action="/dashboard/lowongan/{{ $lowongan->slug }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="btn btn-danger mb-2 swal-confirm" data-form="{{ $lowongan->slug }}"><i class="bi bi-trash-fill"></i></div>
                                                </form>
                                            </td>
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

