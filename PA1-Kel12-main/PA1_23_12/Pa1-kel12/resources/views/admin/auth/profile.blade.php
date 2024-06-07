@extends('admin.master')


@section('subtitle')
    <h2>Profile {{ auth('admin')->user()->name }}</h2>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @php
                            $profileImage = auth('admin')->user()->image;
                        @endphp

                        @if ($profileImage)
                            <img src="{{ asset('storage/' . $profileImage) }}" alt="Profile Picture" width="100"
                                height="100" class="rounded-circle mr-2">
                        @else
                            <img src="{{ asset('Template/dist/img/profile.jpeg') }}"
                                alt="Default Profile Picture" width="100" height="100" class="rounded-circle mr-2">
                        @endif

                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="card-body col-lg-6">
                                    <div class="input-group mb-3">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="{{ __('Name') }}"
                                            value="{{ old('name', auth('admin')->user()->name) }}" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('name')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __('Email') }}"
                                            value="{{ old('email', auth('admin')->user()->email) }}" required readonly>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                        @error('email')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>


                                    <!-- Melakukan Pengecekan apakah user login menggunakan akun google-->
                                    @if (!auth('admin')->user()->google_id)
                                        <!-- Jika dengan Google maka tidak dapat melakukan update password-->

                                        <div class="input-group mb-3">
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="{{ __('New password') }}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            @error('password')
                                                <span class="error invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="password" name="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                placeholder="{{ __('New password confirmation') }}"
                                                autocomplete="new-password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                </div>

                                <div class="card-body col-lg-6">


                                    <div class="input-group mb-3">
                                        <input type="text" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="{{ __('Phone') }}"
                                            value="{{ old('phone', auth('admin')->user()->phone) }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-phone"></span>
                                            </div>
                                        </div>
                                        @error('phone')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="age"
                                            class="form-control @error('age') is-invalid @enderror"
                                            placeholder="{{ __('Umur') }}"
                                            value="{{ old('age', auth('admin')->user()->age) }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-cake"></span>
                                            </div>
                                        </div>
                                        @error('age')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="{{ __('Alamat') }}"
                                            value="{{ old('address', auth('admin')->user()->address) }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-location"></span>
                                            </div>
                                        </div>
                                        @error('address')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row border-bottom pb-4">
                                        <label for="image" class="col-sm-6 col-form-label">Foto Profile</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" class="form-control" id="image"
                                                value="{{ old('image') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
