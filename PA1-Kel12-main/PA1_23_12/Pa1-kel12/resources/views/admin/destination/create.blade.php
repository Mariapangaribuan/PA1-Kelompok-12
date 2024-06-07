@extends('admin.master')

@section('title')
    Create Destinasi
@endsection

@section('subtitle')
    <a class="btn btn-warning" href="{{ Route('admin.destination.index') }}" role="button" id="btn-batal"><i
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
                        <form method="post" action="{{ route('admin.destination.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row border-bottom pb-4">
                                <label for="name" class="col-sm-2 col-form-label">Nama Destinasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        id="name" placeholder="contoh: Pantai Lumban bul-bul">
                                </div>
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="ticket" class="col-sm-2 col-form-label">Tiket</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ticket" value="{{ old('ticket') }}"
                                        id="ticket" placeholder="contoh: 50000">
                                </div>
                                @error('ticket')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="location" value="{{ old('location') }}"
                                        id="location" placeholder="contoh: Balige">
                                </div>
                                @error('location')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="destination_category_id" class="col-sm-2 col-form-label">Kategori destinasi</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="destination_category_id"
                                        name="destination_category_id">
                                        <option value="">--Pilih--</option>
                                        @foreach ($destinationCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4">
                                <label for="is_share" class="col-sm-2 col-form-label">Akan ditampilkan?</label>
                                <div class="col-sm-10">
                                    <select name="is_share" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row border-bottom pb-4">
                                <label for="kabupaten_id" class="col-sm-2 col-form-label">Kabupaten</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="kabupaten_id" name="kabupaten_id">
                                        <option value="">--Pilih--</option>
                                        @foreach ($kabupatens as $kabupaten)
                                            <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="description" class="col-sm-2 col-form-label">Deskripsi Destinasi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="7">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="source" class="col-sm-2 col-form-label">Sumber <span class="text-warning mt-2">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="source" value="{{ old('source') }}"
                                        id="source" placeholder="contoh: Http/....">
                                        <span class="text-warning mt-2">*tambahkan apabila berasal dari sumber lain</span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection


@push('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
