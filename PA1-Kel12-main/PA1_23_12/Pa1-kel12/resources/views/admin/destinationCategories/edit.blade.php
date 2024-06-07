@extends('admin.master')

@section('title')
    Kategori Destinasi
@endsection

@section('subtitle')
    Form Edit
@endsection

@section('content')
    <form action="{{ route('admin.destinationCategory.update', ['destinationCategory' => $destinationCategory->id]) }}"
        method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $destinationCategory->name }}"
                required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Kategori*</label>
            <textarea class="form-control" id="description" name="description" rows="10" required>{{ $destinationCategory->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
        <a href="{{ route('admin.destinationCategory.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
    </form>
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
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection --}}
