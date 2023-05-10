@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Dashboard</strong></h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-buildings" style="font-size: 2rem;"></i> &nbsp; <strong>{{ $totalLowongan }} </strong>Total Lowongan Tersedia</h4>
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