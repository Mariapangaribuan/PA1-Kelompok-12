@extends('contributor.master')

@section('title')
    Edit Tempat Makan
@endsection

@section('subtitle')
    <a class="btn btn-warning" href="{{ Route('contributor.restaurant.index') }}" role="button" id="btn-batal"><i
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
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($restaurant->galleries as $gallery)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $gallery->name }}</td>
                                            <td>{{ $gallery->category }}</td>
                                            <td>
                                                <a href="{{ Storage::url($gallery->images) }}" target="_blank">
                                                    <img width="100" src="{{ Storage::url($gallery->images) }}"
                                                        alt="{{ $gallery->name }}">
                                                </a>
                                            </td>
                                            <td>
                                                <form class="d-inline-block"
                                                    action="{{ route('contributor.restaurant.gallery.destroy', [$restaurant, $gallery]) }}"
                                                    method="post" id="form-hapus-{{$gallery->id}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" id="btn-hapus" type="submit" data-id="{{$gallery->id}}"> <i
                                                            class="fa fa-trash"></i> </button>
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
                        <form method="post" action="{{ route('contributor.restaurant.gallery.store', [$restaurant]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row border-bottom pb-4">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        id="name" placeholder="example: Kuta">
                                </div>
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="images" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="images" value="{{ old('images') }}"
                                        id="images">
                                </div>
                                @error('images')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="category" class="col-sm-2 col-form-label">Kategori Gambar</label>
                                <div class="col-sm-10">
                                    <select name="category" class="form-control">
                                        <option value="menu"
                                            {{ old('category', $restaurant->category) == 'menu' ? 'selected' : '' }}>
                                            Menu Makanan</option>
                                        <option value="place"
                                            {{ old('category', $restaurant->category) == 'place' ? 'selected' : '' }}>
                                            Gambar Restaurant</option>
                                    </select>
                                </div>
                                @error('category')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row border-bottom pb-4">
                                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="description"
                                        value="{{ old('description') }}" placeholder="example: Kuta">
                                </div>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
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
                                            action="{{ route('contributor.restaurant.update', [$restaurant->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="form-group row border-bottom pb-4">
                                                <label for="name" class="col-sm-2 col-form-label">Nama Tempat
                                                    Makanan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old('name', $restaurant->name) }}" id="name"
                                                        placeholder="example: Distro">
                                                </div>
                                                @error('name')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row border-bottom pb-4" hidden>
                                                <label for="is_share" class="col-sm-2 col-form-label">Akan Ditampilkan?</label>
                                                <div class="col-sm-10">
                                                    <select name="is_share" class="form-control">
                                                        <option value="1"
                                                            {{ old('is_share', $restaurant->is_share) == '1' ? 'selected' : '' }}>
                                                            Ya</option>
                                                        <option value="0"
                                                            {{ old('is_share', $restaurant->is_share) == '0' ? 'selected' : '' }}>
                                                            Tidak</option>
                                                    </select>
                                                </div>
                                                @error('is_share')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row border-bottom pb-4">
                                                <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="location"
                                                        value="{{ old('location', $restaurant->location) }}"
                                                        id="location" placeholder="example: 250k">
                                                </div>
                                                @error('location')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group row border-bottom pb-4">
                                                <label for="phone" class="col-sm-2 col-form-label">No.Telepon*</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ old('phone', $restaurant->phone) }}" id="phone"
                                                        placeholder="example: 08526712538">
                                                </div>
                                                @error('phone')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row border-bottom pb-4">
                                                <label for="kabupaten_id"
                                                    class="col-sm-2 col-form-label">Kabupaten</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="kabupaten_id" id="kabupaten_id">
                                                        @foreach ($kabupatens as $kabupaten)
                                                            <option value="{{ $kabupaten->id }}"
                                                                {{ old('kabupaten_id', $restaurant->kabupaten_id) == $kabupaten->id ? 'selected' : '' }}>
                                                                {{ $kabupaten->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('kabupaten_id')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row border-bottom pb-4">
                                                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="description" id="description" cols="30" rows="7">{{ old('description', $restaurant->description) }}</textarea>
                                                </div>
                                                @error('description')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
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
                @endpush
