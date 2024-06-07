@extends('admin.master')

@section('title')
    Edit Kategori Blog
@endsection


@section('content')
    <form action="{{ route('admin.blogCategory.update', [$blogCategory]) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $blogCategory->name }}">
            @error('name')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Kategori</label>
            <textarea class="form-control" id="description" name="description" rows="10" required>{{ $blogCategory->description }}</textarea>
            @error('description')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.blogCategory.index') }}" class="btn btn-secondary" id="btn-batal">Batal</a>
    </form>
@endsection

@section('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
