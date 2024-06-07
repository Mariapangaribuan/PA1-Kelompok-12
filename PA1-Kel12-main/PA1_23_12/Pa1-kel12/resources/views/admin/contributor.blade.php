@extends('admin.master')

@section('title')
    List Kontributor
@endsection

@section('subtitle')
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
                            <table class="table table-bordered text-center mx-auto align-items-center" id="example1">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Nama Contributor</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contributors as $contributor)
                                        <tr>
                                            <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
                                            <td>
                                                @if ($contributor->image != null)
                                                    <img src="{{ Storage::url($contributor->image) }}" alt="" class="rounded-circle" style="width: 100px; height: 100px;">
                                                @else
                                                    <img src="{{ asset('Template/dist/img/profile.jpeg') }}" alt="" class="rounded-circle" style="width: 100px; height: 100px;">
                                                @endif
                                            </td>                                                                                      
                                            <td class="align-middle">{{ $contributor->name }}</td>
                                            <td class="align-middle">{{ $contributor->email }}</td>
                                            <td class="align-middle">
                                                <form action="{{ route('admin.updateStatus', $contributor->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm @if ($contributor->status == 1) btn-success @else btn-danger @endif">
                                                        @if ($contributor->status == 1)
                                                            Diterima
                                                        @else
                                                            Ditolak
                                                        @endif
                                                    </button>
                                                    @error('status')
                                                        <span class="text-danger mt-2">{{ $message }}</span>
                                                    @enderror
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
@endpush