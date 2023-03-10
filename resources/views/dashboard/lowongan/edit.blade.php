@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <h1 class="h3">Edit Lowongan</h1>
        <a href="/dashboard/lowongan/" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="/dashboard/lowongan/{{ $lowongan->slug }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label @error('judul') is-invalid @enderror">Judul Lowongan</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $lowongan->judul) }}">
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $lowongan->slug) }}">
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">`
                                        <label for="perusahaan" class="form-label @error('perusahaan') is-invalid @enderror">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="{{ old('perusahaan', $lowongan->perusahaan) }}">
                                        @error('perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">`
                                        <label for="posisi" class="form-label @error('posisi') is-invalid @enderror">Posisi</label>
                                        <input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi', $lowongan->posisi) }}">
                                        @error('perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="batas_waktu @error('batas_waktu') is-invalid @enderror">Batas Waktu</label>
                                        <input type="datetime-local" class="form-control" id="batas_waktu" name="batas_waktu" value="{{ old('batas_waktu', $lowongan->batas_waktu) }}">
                                        @error('batas_waktu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="persyaratan @error('persyaratan') is-invalid @enderror">Persyaratan</label>
                                        <textarea name="persyaratan" id="editor">{{ old('persyaratan', $lowongan->persyaratan) }}</textarea>
                                        @error('persyaratan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> 
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label @error('gambar') is-invalid @enderror">Gambar</label>
                                        @if($lowongan->gambar)
                                            <img src="{{ asset('storage/' . $lowongan->gambar) }}" class="img-preview img-fluid mb-3 mt-2" id="preview" style="max-height: 500px; overflow:hidden; border: 1px solid black;">
                                        @endif
                                        <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImage()">
                                        @error('gambar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                      </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-end">Edit Lowongan</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function previewImage(){
            preview.src=URL.createObjectURL(event.target.files[0]);
        }

        const judul = document.querySelector('#judul');
        const slug  = document.querySelector('#slug');
    
        judul.addEventListener('change', function(){
            fetch('/dashboard/lowongan/checkSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection

