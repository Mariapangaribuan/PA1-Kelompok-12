@extends('admin.master')

@section('title')
    Create Blog Kategori
@endsection

@section('subtitle')
    <a class="btn btn-warning" href="{{ Route('admin.blogCategory.index') }}" role="button" id="btn-batal"><i
            class="fa fa-arrow-left"></i>
        Kembali</a>
@endsection

@section('content')
    <div class="section-body">
        <form action="{{ Route('admin.blogCategory.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">Kategori</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="contoh: Tips & Tricks">
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Deskripsi Kategori</label>
                                <textarea class="form-control" id="description" name="description" rows="10" placeholder="Deskripsi Kategori..."></textarea>
                                @error('description')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection

@section('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endsection

{{-- @section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection --}}
