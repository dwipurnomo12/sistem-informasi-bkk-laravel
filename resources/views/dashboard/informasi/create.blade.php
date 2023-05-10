@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="h3 mb-3">Posting Informasi</h1>
                <a href="/dashboard/informasi/" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
                <div class="card">
                    <div class="card-body">

                        <form action="/dashboard/informasi/" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
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
                                        <label for="deskripsi @error('deskripsi') is-invalid @enderror">Deskripsi</label>
                                        <textarea name="deskripsi" id="editor"></textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> 

                                    <div class="mb-3">
                                        <label for="file @error('file') is-invalid @enderror">Upload File</label>
                                        <input type="file" class="form-control" id="file" name="file">
                                        <div id="file-preview"></div>
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

        const judul = document.querySelector('#judul');
        const slug  = document.querySelector('#slug');
    
        judul.addEventListener('change', function(){
            fetch('/dashboard/informasi/checkSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

@endsection










