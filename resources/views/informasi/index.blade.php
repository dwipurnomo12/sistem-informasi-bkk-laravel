@extends('layouts.main')

@section('container')
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-between">
        <div class="section-header">
            <h2>Informasi</h2>
        </div>
      </div>
    </div>
</section> 

   <!-- ======= Services Section ======= -->
   <section id="service" class="services pt-0">
    @foreach ($informasis as $informasi)
        <div class="container mt-5" data-aos="fade-up">
            <div class="row">
              <div class="col-md-8 mx-auto">
                <div class="card">
                  <div class="card-body">
                    <h3 class="p-0">{{ $informasi->judul }}</h3>
                    <p class="p-0"><i class="bi bi-clock"></i> {{ $informasi->created_at->diffForhumans() }}</p>
                    <p class="p-0">{{ $informasi->excerpt }} <a href="/informasi/{{ $informasi->slug }}" style="text-decoration: none">Baca selengkapnya...</a></p>
                  </div>
                </div>
              </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center mt-5">
          {{ $informasis->links() }}
        </div>
  </section>
@endsection
