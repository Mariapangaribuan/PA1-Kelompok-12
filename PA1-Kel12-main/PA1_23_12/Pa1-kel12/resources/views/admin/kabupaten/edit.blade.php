@extends('admin.master')

@section('title')
    Edit Informasi Kabupaten
@endsection

@section('subtitle')
    <a class="btn btn-warning" href="{{ Route('admin.kabupaten.index') }}" role="button" id="btn-batal"><i
            class="fa fa-arrow-left"></i>
        Kembali</a>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.kabupaten.update', [$kabupaten->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row border-bottom pb-4">
                                <label for="name" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $kabupaten->name) }}" id="name"
                                        placeholder="example: Toba Samosir">
                                </div>
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="logo" class="col-sm-2 col-form-label">Logo Kabupaten</label>
                                <div class="col-sm-10">
                                    <input type="file" name="logo" class="form-control" id="logo">
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="7">{{ old('description', $kabupaten->description) }}</textarea>
                                </div>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
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
