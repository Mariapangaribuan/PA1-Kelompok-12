@extends('contributor.master')

@section('title')
    List Destinasi
@endsection

@section('subtitle')
    <a class="btn btn-primary" href="{{ Route('contributor.destination.create') }}" role="button">Tambah <i
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
                                        <th scope="col">Nama Destinasi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col" class="col-2">Tiket</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Is share?</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($destinations as $destination)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $destination->name }}</td>
                                            <td>
                                                <img src="{{ Storage::url(optional($destination->galleries->first())->images) }}"
                                                    alt="" class="popular__img" width="100" />
                                            </td>
                                            <td>{{ $destination->ticket }}</td>
                                            <td>{{ $destination->kabupaten->name }}</td>
                                            <td>{{ $destination->is_share == 1 ? 'Diterima' : 'Menunggu' }}</td>
                                            <td class="d-flex justify-content-center">
                                                <form action="{{ route('contributor.destination.edit', [$destination]) }}"
                                                    method="GET" style="margin-right: 10px;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="fa fa-edit"></i></button>
                                                </form>
                                                <form id="form-delete-{{ $destination->id }}"
                                                    action="{{ route('contributor.destination.destroy', [$destination]) }}"
                                                    method="POST" style="margin-right: 10px;">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn btn-danger" id="btn-delete" data-id="{{ $destination->id }}">
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

    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
@endpush
