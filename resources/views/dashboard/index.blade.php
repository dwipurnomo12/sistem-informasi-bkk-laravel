@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Dashboard</strong></h1>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Selamat Datang, {{ auth()->user()->name }}</h3>
                        @if (auth()->user()->role_id === 1)
                            <a href="/dashboard/pendaftar" class="btn btn-primary">Cek Pendaftar</a>
                        @else
                            <a href="/dashboard/lowongan-tersedia" class="btn btn-primary">Cek Lowongan</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-buildings" style="font-size: 2rem;"></i> &nbsp; <strong>{{ $totalLowongan }} </strong>Lowongan Tersedia</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-people-fill" style="font-size: 2rem;"></i> &nbsp; <strong>{{ $totalUser }}</strong> Total User Terdaftar</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-info-square" style="font-size: 2rem;"></i> &nbsp; <strong>{{ $totalInformasi }} </strong> Total Informasi</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection