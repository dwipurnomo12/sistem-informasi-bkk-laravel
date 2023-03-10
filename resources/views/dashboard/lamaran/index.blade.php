@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <h1 class="h3">Data lamaran Anda</h1>
        <div class="card">
            <div class="card-body">
                <strong>Tekan Tombol</strong> &nbsp; <button class="btn btn-success"><i class="bi bi-printer"></i></button> &nbsp; <strong>Untuk Mencetak Kartu Peserta</strong> 
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table id="table_id" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Perusahaan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lamaran as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->lowongan->perusahaan }}</td> 
                                            <td>
                                                <a href="/dashboard/lamaran/cetak/{{ $list->lowongan->slug }}" target="_blank" class="btn btn-success"><i class="bi bi-printer"></i></a>
                                                <a href="/dashboard/lamaran/edit/{{ $list->lowongan->slug }}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                                <form id="{{ $list->id }}" action="/dashboard/lamaran/{{ $list->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="btn btn-danger swal-confirm" data-form="{{ $list->id }}"><i class="bi bi-trash-fill"></i></div>
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

