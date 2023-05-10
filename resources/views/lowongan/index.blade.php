@extends('layouts.main')

@section('container')
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-between">
        <div class="section-header">
            <h2>Lowongan Terbaru</h2>
        </div>
      </div>
    </div>
</section> 

   <!-- ======= Services Section ======= -->
   <section id="service" class="services pt-0">
        <div class="container my-5" data-aos="fade-up">
            <div class="row">
                @foreach ($lowongans as $lowongan)
                @php
                    $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lowongan->batas_waktu);
                    $diff = $end_date->diff(\Carbon\Carbon::now());
                @endphp
                    <div class="col-md-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="card d-flex flex-column justify-content-between">
                            <img src="{{ asset('storage/' . $lowongan->gambar) }}" class="card-img-top" alt="...">
                            <div class="card-body mt-auto">
                                <h5 class="card-title">{{ $lowongan->judul }}</h5>
                                <h6 class="card-text text-danger">
                                    @if($diff->days > 0)
                                        Sisa Waktu: {{ $diff->days }} hari, {{ $diff->h }} jam
                                    @else
                                        Pendaftaran Di Tutup
                                    @endif
                                </h6>
                            </div>
                            <div class="card-footer">
                                <a href="/lowongan/{{ $lowongan->slug }}" class="text-decoration-none btn btn-sm btn-primary mt-3">Detail</a>
                                @if ($diff->days > 0)
                                    <a href="/dashboard" class="btn btn-sm btn-success mt-3 text-decoration-none">Daftar</a>
                                @else
                                    <button href="/" class="btn btn-sm btn-danger mt-3 text-decoration-none">Lowongan Ditutup</button>
                                @endif
                            </div>
                          </div>
                    </div>
                @endforeach
            </div>
            {{ $lowongans->links() }}
        </div>
  </section>
@endsection
