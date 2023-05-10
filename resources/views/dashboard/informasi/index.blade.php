@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <h1 class="h3">Semua Informasi</h1>
        <a href="/dashboard/informasi/create" type="button" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Posting Baru</a>
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
                                        <th>Deskripsi</th>
                                        <th>File</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informasis as $informasi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $informasi->judul }}</td>
                                            <td>{{ $informasi->excerpt }}</td>
                                            <td><a href="{{ asset('storage/' .$informasi->file) }}">{{ basename($informasi->file) }}</a></td>
                                            <td>
                                                <a href="/dashboard/informasi/{{ $informasi->slug }}" class="btn btn-success mb-2"><i class="bi bi-eye-fill"></i></a>
                                                <a href="/dashboard/informasi/{{ $informasi->slug }}/edit" class="btn btn-warning mb-2"><i class="bi bi-pencil-fill"></i></a>
                                                <form id="{{ $informasi->slug }}" action="/dashboard/informasi/{{ $informasi->slug }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="btn btn-danger mb-2 swal-confirm" data-form="{{ $informasi->slug }}"><i class="bi bi-trash-fill"></i></div>
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

