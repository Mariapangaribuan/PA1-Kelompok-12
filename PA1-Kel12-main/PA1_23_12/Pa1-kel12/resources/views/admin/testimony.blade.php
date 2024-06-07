@extends('admin.master')

@section('title')
    Kumpulan Testimoni
@endsection

@section('subtitle')
    Daftar pembuat testimoni
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
                                        <th scope="col">Nama Contributor</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonies as $testimony)
                                        <tr class="product-item">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $testimony->contributor->name }}</td>
                                            <td class="description">{{ Str::limit($testimony->description, 50) }}</td>
                                            <td class="d-flex justify-content-center">
                                                <button class="btn btn-info btn-sm btn-action mr-2"
                                                    data-title="{{ $testimony->contributor->name }}"
                                                    data-description="{{ $testimony->description }}"
                                                    data-image="@if ($testimony->contributor->image != null) {{ Storage::url($testimony->contributor->image) }}@else{{ asset('Template/dist/img/profile.jpeg') }} @endif">
                                                    <i class="fas fa-eye" data-toggle="tooltip" data-placement="top"></i>
                                                </button>
                                                <form action="{{ route('admin.updateTestimony', $testimony->id) }}"
                                                    method="POST" class="mr-2">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="btn @if ($testimony->status == 1) btn-success @else btn-secondary @endif">
                                                        @if ($testimony->status == 1)
                                                            Ditampilkan <i class="fa fa-circle-check ml-1"></i>
                                                        @else
                                                            Disembunyikan <i class="fa fa-circle-xmark ml-1"></i>
                                                        @endif
                                                    </button>
                                                    @error('status')
                                                        <span class="text-danger mt-2">{{ $message }}</span>
                                                    @enderror
                                                </form>
                                                <form action="{{ route('admin.testimony.delete', $testimony->id) }}" method="POST" id="form-delete-{{ $testimony->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" id="btn-delete" data-id="{{ $testimony->id }}"><i class="fa fa-trash"></i></button>
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script> --}}
    <script>
        function showProductDetails(title, description, image) {
            Swal.fire({
                title: title,
                html: `<img src="${image}" alt="${title} Profile Image" style="max-width: 150px; max-height: 150px; border-radius: 100%;" class="m-3"><br>${description}`,
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const eyeButtons = document.querySelectorAll('.btn-action');
            eyeButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const title = this.dataset.title;
                    const description = this.dataset.description;
                    const image = this.dataset.image;

                    showProductDetails(title, description, image);
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/datatables.min.js"></script>
@endpush
