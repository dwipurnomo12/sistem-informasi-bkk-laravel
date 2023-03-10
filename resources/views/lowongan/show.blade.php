@extends('layouts.main')

@section('container')
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="section-header">
                    <h2>Detail Lowongan</h2>
                </div>
            </div>
        </div>
    </section> 

    <div class="container-fluid">
        @php
            $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lowongan->batas_waktu);
            $diff = $end_date->diff(\Carbon\Carbon::now());
        @endphp
        <div class="row">
            <div class="col-md-8 mx-auto d-block">
                    <div class="card my-5">
                        <img src="{{ asset('storage/' . $lowongan->gambar) }}" alt="" class="img-fluid" style="width: 1000px; height: 300px; object-fit:cover;"> 
                        <div class="card-body py-5">
                            <h1>{{ $lowongan->judul }}</h1>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="mb-2"><i class="bi bi-buildings"></i>  {{ $lowongan->perusahaan }}</p>
                                    <p class="mb-2"><i class="bi bi-person-gear"></i> Posisi : {{ $lowongan->posisi }}</p>
                                    <p class="mb-2"><i class="bi bi-people-fill"></i>  Total Pendaftar : {{ $lowongan->pendaftars->count() }}</p>
                                    <p class="mb-2"><i class="bi bi-stopwatch"></i>  Sisa Waktu : {{ $diff->days }} hari {{ $diff->h }} Jam</p>
                                </div>
                                <div class="col-md-2">
                                    @if ($diff->days > 0)
                                        <a href="/dashboard" class="btn btn-sm btn-success mt-3 text-decoration-none">Daftar</a>
                                    @else
                                        <button href="/" class="btn btn-sm btn-danger mt-3 text-decoration-none">Lowongan Ditutup</button>
                                    @endif
                                    
                                </div>
                            </div>

                            <hr>

                            <h5 class="mt-3">Persyaratan : </h5>
                            <p>{!! $lowongan->persyaratan !!}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection