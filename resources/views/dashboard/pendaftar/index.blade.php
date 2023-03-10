@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <h1 class="h3">Daftar Perusahaan</h1>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table id="table_id" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Perusahaan</th>
                                        <th>Lihat Pendaftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lowongans as $lowongan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('storage/'. $lowongan->gambar) }}" alt="gambar-perusahaan" style="width: 250px"; height="200px"></td>
                                            <td>{{ $lowongan->perusahaan }}</td>
                                            <td>
                                                <a href="/dashboard/pendaftar/{{ $lowongan->slug }}" class="btn btn-success"><i class="bi bi-eye-fill"></i></a>
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

