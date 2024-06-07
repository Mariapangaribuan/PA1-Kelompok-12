@extends('contributor.master')

@section('title')
    Edit Akomodasi
@endsection

@section('subtitle')
    <a class="btn btn-warning" href="{{ Route('contributor.accommodation.index') }}" role="button" id="btn-batal"><i
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
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($accommodation->galleries as $gallery)
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
                                                    action="{{ route('contributor.accommodation.gallery.destroy', [$accommodation, $gallery]) }}"
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
                        <form method="post" action="{{ route('contributor.accommodation.gallery.store', [$accommodation]) }}"
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
                                <label for="images" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="images" value="{{ old('images') }}"
                                        id="images">
                                </div>
                                @error('images')
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
                                            action="{{ route('contributor.accommodation.update', [$accommodation->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="form-group row border-bottom pb-4">
                                                <label for="name" class="col-sm-2 col-form-label">Nama
                                                    Akomodasi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old('name', $accommodation->name) }}" id="name"
                                                        placeholder="example: Hotel Labersa">
                                                </div>
                                                @error('name')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row border-bottom pb-4">
                                                <label for="category" class="col-sm-2 col-form-label">Kategori
                                                    Akomodasi</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="category" name="category">
                                                        <option value="Hotel"
                                                            {{ old('category') == 'Hotel' ? 'selected' : '' }}>Hotel
                                                        </option>
                                                        <option value="Resort"
                                                            {{ old('category') == 'Resort' ? 'selected' : '' }}>
                                                            Resort</option>
                                                        <option value="Apartement"
                                                            {{ old('category') == 'Apartement' ? 'selected' : '' }}>
                                                            Apartement</option>
                                                        <option value="Villa"
                                                            {{ old('category') == 'Villa' ? 'selected' : '' }}>Villa
                                                        </option>
                                                        <option value="Hostel"
                                                            {{ old('category') == 'Hostel' ? 'selected' : '' }}>
                                                            Hostel</option>
                                                        <option value="Homestay"
                                                            {{ old('category') == 'Homestay' ? 'selected' : '' }}>
                                                            Homestay</option>
                                                        <option value="Guest House"
                                                            {{ old('category') == 'Guest House' ? 'selected' : '' }}>
                                                            Guest House</option>
                                                        <option value="Camping ground"
                                                            {{ old('category') == 'Camping ground' ? 'selected' : '' }}>
                                                            Camping ground</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row border-bottom pb-4">
                                                <label for="price" class="col-sm-2 col-form-label">Rentang Harga</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="price"
                                                        value="{{ old('price', $accommodation->price) }}" id="price"
                                                        placeholder="example: 250000 - 500000">
                                                </div>
                                            </div>

                                            <div class="form-group row border-bottom pb-4">
                                                <label for="phone" class="col-sm-2 col-form-label">No Telepon</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="phone"
                                                        value="{{ old('phone', $accommodation->phone) }}" id="phone"
                                                        placeholder="example: 0526128397192">
                                                </div>
                                            </div>

                                            <div class="form-group row border-bottom pb-4">
                                                <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="location"
                                                        value="{{ old('location', $accommodation->location) }}"
                                                        id="location" placeholder="example: balige">
                                                </div>
                                                @error('location')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row border-bottom pb-4">
                                                <label for="destination_id"
                                                    class="col-sm-2 col-form-label">Destinasi</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="destination_id"
                                                        name="destination_id">

                                                        @foreach ($destinations as $destination)
                                                            <option value="{{ $destination->id }}"
                                                                {{ old('destination_id', $accommodation->destination_id) == $destination->id ? 'selected' : '' }}>
                                                                {{ $destination->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row border-bottom pb-4" hidden>
                                                <label for="is_share" class="col-sm-2 col-form-label">Akan Ditampilkan?</label>
                                                <div class="col-sm-10">
                                                    <select name="is_share" class="form-control">
                                                        <option value="1"
                                                            {{ old('is_share', $accommodation->is_share) == '1' ? 'selected' : '' }}>
                                                            Yes</option>
                                                        <option value="0"
                                                            {{ old('is_share', $accommodation->is_share) == '0' ? 'selected' : '' }}>
                                                            No</option>
                                                    </select>
                                                </div>
                                                @error('is_share')
                                                    <span class="text-danger mt-2">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group row border-bottom pb-4">
                                                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="description" id="description" cols="30" rows="7">{{ old('description', $accommodation->description) }}</textarea>
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
