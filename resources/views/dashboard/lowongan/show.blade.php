@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-10 mx-auto d-block">
                <h1 class="h3">Detail Lowongan</h1>
                <a href="/dashboard/lowongan/" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3">{{ $lowongan->judul }}</h1>
                        <h4 class="mb-5">Batas Pendaftaran : {{ $lowongan->batas_waktu }}</h4>

                        <div class="text-center">
                            <img src="{{ asset('storage/' . $lowongan->gambar) }}" class="img-fluid mb-5" alt="gambar utama" style="overflow:hidden; border: 1px solid black">
                        </div>

                        <h4>Persyaratan :</h4>
                        <p>{!! $lowongan->persyaratan !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection