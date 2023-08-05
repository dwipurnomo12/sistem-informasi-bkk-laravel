@extends('layouts.main')

@section('container')
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="section-header">
                    <h2>Detail Informasi</h2>
                </div>
            </div>
        </div>
    </section> 

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto d-block">
                <div class="card my-5">
                    <h1 class="m-2">{{ $informasi->judul }}</h1>
                    <div class="row">
                        <div class="col-md-10">
                            <p class="mx-3 align-items-center"><i class="bi bi-person-circle"></i> {{ $informasi->user->name }} &nbsp; <i class="bi bi-clock"></i> {{ $informasi->created_at->diffForhumans() }}</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>{!! $informasi->deskripsi !!}</p>
                        @if ($informasi->file)
                            <a href="{{ asset('storage/' .$informasi->file) }}"><i class="bi bi-file-earmark-arrow-down"></i> {{ basename($informasi->file) }}</a>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection