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
                                        <th>Posisi</th>
                                        <th>Batas Waktu</th>
                                        <th>Daftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lowongans as $lowongan)
                                    @php
                                        $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lowongan->batas_waktu);
                                        $diff = $end_date->diff(\Carbon\Carbon::now());
                                    @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('storage/'. $lowongan->gambar) }}" alt="gambar-perusahaan" style="width: 250px"; height="200px"></td>
                                            <td>{{ $lowongan->perusahaan }}</td>
                                            <td>{{ $lowongan->posisi }}</td>
                                            <td>{{ $lowongan->batas_waktu }}</td>
                                            <td>
                                                {{-- Mengecek apakah user yang sedang login sudah mendaftar di lowongan ini atau belum --}}
                                                @if($lowongan->pendaftars->contains('user_id', Auth::id()))
                                                    <button type="button" class="btn btn-danger"><i class="bi bi-x-square"> </i>Anda sudah mendaftar</button>
                                                @else
                                                    @if($diff->days > 0)
                                                        <a href="/dashboard/lowongan-tersedia/daftar/{{ $lowongan->slug }}" class="btn btn-success"><i class="bi bi-person-plus"></i></a>
                                                    @else
                                                        <button type="button" class="btn btn-danger"><i class="bi bi-x-square"> </i>Pendaftaran Telah Berakhir</button>
                                                    @endif
                                                @endif
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

