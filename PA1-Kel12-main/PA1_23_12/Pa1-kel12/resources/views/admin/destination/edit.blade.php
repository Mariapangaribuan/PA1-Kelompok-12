@extends('admin.master')

@section('title')
    Edit Destination
@endsection

@section('subtitle')
    <a class="btn btn-warning" href="{{ Route('admin.destination.index') }}" role="button" id="btn-batal"><i
            class="fa fa-arrow-left"></i>
        Kembali</a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($destination->galleries as $gallery)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $gallery->name }}</td>
                                            <td>
                                                <a href="{{ Storage::url($gallery->images) }}" target="_blank">
                                                    <img width="100" src="{{ Storage::url($gallery->images) }}"
                                                        alt="{{ $gallery->name }}">
                                                </a>
                                            </td>
                                            <td>
                                                <form class="d-inline-block"
                                                    action="{{ route('admin.destination.gallery.destroy', [$destination, $gallery]) }}"
                                                    method="post" id="form-hapus-{{ $gallery->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" id="btn-hapus" type="submit"
                                                        data-id="{{ $gallery->id }}"> <i class="fa fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="4">Gallery Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card p-3">
                        <form method="post" action="{{ route('admin.destination.gallery.store', [$destination]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row border-bottom pb-4">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        id="name" placeholder="example: Kuta">
                                </div>
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="images" class="col-sm-2 col-form-label">Images</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="images" value="{{ old('images') }}"
                                        id="images">
                                </div>
                                @error('images')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <!-- images -->

                    <!-- Main content -->
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card p-3">
                                        <form method="post"
                                            action="{{ route('admin.destination.update', [$destination->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="form-group row border-bottom pb-4">
                                                <label for="name" class="col-sm-2 col-form-label">Nama Destinasi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old('name', $destination->name) }}" id="name"
                                                        placeholder="example: Pantai Bul-bul">
                                                </div>
                                            </div>
                                            <div class="form-group row border-bottom pb-4">
                                                <label for="ticket" class="col-sm-2 col-form-label">Tiket</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="ticket"
                                                        value="{{ old('ticket', $destination->ticket) }}" id="ticket"
                                                        placeholder="example: 50000">
                                                </div>
                                                @error('ticket')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group row border-bottom pb-4">
                                                <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="location"
                                                        value="{{ old('location', $destination->location) }}"
                                                        id="location" placeholder="example: Balige,Indonesia">
                                                </div>
                                            </div>
                                            <div class="form-group row border-bottom pb-4">
                                                <label for="destination_category_id"
                                                    class="col-sm-2 col-form-label">Kategori</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="destination_category_id"
                                                        id="destination_category_id">
                                                        @foreach ($destinationCategories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ old('destination_category_id', $destination->destination_category_id) == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row border-bottom pb-4">
                                                <label for="kabupaten_id"
                                                    class="col-sm-2 col-form-label">Kabupaten</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="kabupaten_id" id="kabupaten_id">
                                                        @foreach ($kabupatens as $kabupaten)
                                                            <option value="{{ $kabupaten->id }}"
                                                                {{ old('kabupaten_id', $destination->kabupaten_id) == $kabupaten->id ? 'selected' : '' }}>
                                                                {{ $kabupaten->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row border-bottom pb-4">
                                                <label for="is_share" class="col-sm-2 col-form-label">Is Sharable?</label>
                                                <div class="col-sm-10">
                                                    <select name="is_share" class="form-control">
                                                        <option value="1"
                                                            {{ old('is_share', $destination->is_share) == '1' ? 'selected' : '' }}>
                                                            Yes</option>
                                                        <option value="0"
                                                            {{ old('is_share', $destination->is_share) == '0' ? 'selected' : '' }}>
                                                            No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row border-bottom pb-4">
                                                <label for="description"
                                                    class="col-sm-2 col-form-label">description</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="description" id="description" cols="30" rows="7">{{ old('description', $destination->description) }}</textarea>
                                                </div>
                                                @error('description')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row border-bottom pb-4">
                                                <label for="source" class="col-sm-2 col-form-label">Sumber *</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="source"
                                                        value="{{ old('source', $destination->source) }}" id="source"
                                                        placeholder="contoh: Http/....">
                                                        <span class="text-warning mt-2">*tambahkan apabila berasal dari sumber lain</span>
                                                </div>
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


                @push('styles')
                    <style>
                        .ck-editor__editable_inline {
                            min-height: 200px;
                        }
                    </style>
                @endpush

                @push('scripts')

                    @if (session('alert-type') === 'success')
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: '{{ session('message') }}',
                                showConfirmButton: true,
                                timer: 2000
                            });
                        </script>
                    @endif

                    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#description'))
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                @endpush
