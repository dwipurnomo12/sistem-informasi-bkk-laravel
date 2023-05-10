@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-10 mx-auto d-block">
                <h1 class="h3">Detail Informasi</h1>
                <a href="/dashboard/informasi/" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3">{{ $informasi->judul }}</h1>
                        <p>{!! $informasi->deskripsi !!}</p>

                        <p><a href="{{ asset('storage/' .$informasi->file) }}"><i class="bi bi-file-earmark-text"></i> {{ basename($informasi->file) }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection