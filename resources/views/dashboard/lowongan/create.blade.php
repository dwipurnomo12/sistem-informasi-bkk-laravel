@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Posting Lowongan</h1>
        <a href="/dashboard/lowongan/" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">

                        <form action="/dashboard/lowongan/" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Lowongan</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul">
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug">
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan" name="perusahaan">
                                        @error('perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="posisi" class="form-label">Posisi</label>
                                        <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi">
                                        @error('posisi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="batas_waktu">Batas Waktu</label>
                                        <input type="datetime-local" class="form-control @error('batas_waktu') is-invalid @enderror" id="batas_waktu" name="batas_waktu">
                                        @error('batas_waktu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="persyaratan @error('persyaratan') is-invalid @enderror">Persyaratan</label>
                                        <textarea name="persyaratan" id="editor"></textarea>
                                        @error('persyaratan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> 
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <img src="" class="img-preview img-fluid mb-3 mt-2" id="preview" style="max-height: 500px; overflow:hidden; border: 1px solid black;">
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" onchange="previewImage()">
                                        @error('gambar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                      </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-end">Tambah</button>

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










