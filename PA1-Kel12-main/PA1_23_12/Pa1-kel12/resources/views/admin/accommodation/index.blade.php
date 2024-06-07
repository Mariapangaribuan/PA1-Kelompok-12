@extends('admin.master')

@section('title')
    List Akomodasi
@endsection

@section('subtitle')
<a class="btn btn-primary" href="{{ Route('admin.accommodation.create') }}" role="button">Tambah <i
    class="fa-solid fa-plus"></i></a>    
@endsection

@push('styles')
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="example1">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Akomodasi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Is share?</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accommodations as $accommodation)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $accommodation->name }}</td>
                                            <td>
                                                <img src="{{ Storage::url(optional($accommodation->galleries->first())->images) }}"
                                                    alt="" class="popular__img" width="100" />
                                            </td>
                                            <td>{{ $accommodation->category }}</td>
                                            <td>
                                                @if ($accommodation->contributor)
                                                    {{ $accommodation->contributor->name }}
                                                @elseif($accommodation->contributor_id == null)
                                                    Admin
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.accommodation.is_share', $accommodation->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="btn btn-sm @if ($accommodation->is_share == 1) btn-success @else btn-danger @endif">
                                                        @if ($accommodation->is_share == 1)
                                                            Ya <i class="fa fa-circle-check"></i>
                                                        @else
                                                            Tidak <i class="fa fa-circle-xmark"></i>
                                                        @endif
                                                    </button>


                                                    @error('is_share')
                                                        <span class="text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </form>
                                            </td>
                                            <td class="justify-content-center d-flex">
                                                <form
                                                    action="{{ route('admin.accommodation.edit', [$accommodation]) }}"
                                                    method="GET" style="margin-right: 10px;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="fa fa-edit"></i></button>
                                                </form>
                                                <form id="form-delete-{{ $accommodation->id }}"                                        
                                                    action="{{ route('admin.accommodation.destroy', [$accommodation]) }}"
                                                    method="POST" style="margin-right: 10px;">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn btn-danger" id="btn-delete" data-id="{{ $accommodation->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>

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