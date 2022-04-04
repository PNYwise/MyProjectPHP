@extends('layout.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">News</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('storeNews') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Title</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                            value="{{ old('judul') }}">
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                            value="{{ old('slug') }}" readonly>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner</label>
                        <input class="form-control mb-2  @error('banner') is-invalid @enderror" type="file" name="banner"
                            id="banner" onchange="previewbanner()">
                        @error('banner')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="row mb-3 justify-content-center"
                            style="max-height: 450px; overflow:hidden;  border-radius: 10px;">
                            <img class="img-preview img-fluid">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="banner_desctiption" class="form-label">Banner Description</label>
                        <input type="text" class="form-control @error('banner_desctiption') is-invalid @enderror"
                            id="banner_desctiption" name="banner_desctiption" value="{{ old('banner_desctiption') }}">
                        @error('banner_desctiption')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="desctiption" class="form-label">Desctiption</label>
                        <p></p>
                        <input id="desctiption" type="hidden" name="desctiption" value="{{ old('desctiption') }}">
                        <trix-editor input="desctiption"></trix-editor>
                        @error('desctiption')
                            <div class="text-danger pt-2 d-flex justify-content-left">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create News</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const title = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        title.addEventListener('keyup', function() {
            slug.value = title.value.replace(/\s+/g, '-').toLowerCase();
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewbanner() {

            const image = document.querySelector('#banner');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const reader = new FileReader();
            reader.readAsDataURL(image.files[0]);

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
@endsection
