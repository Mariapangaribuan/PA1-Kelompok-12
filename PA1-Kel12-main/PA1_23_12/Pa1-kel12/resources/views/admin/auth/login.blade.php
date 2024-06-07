<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="website icon" type="png" href="{{ asset('asset/logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('Template/plugins/fontawesome-free/css/all.min.css') }}">
</head>
<body>
    <section class="vh-100" style="background-color: #2F5D62;">
        <div class="container py-5 h-100">
            <a href="{{Route('welcome')}}" class="btn btn-warning">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ URL::asset('asset/login.jpg') }}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="{{ route('admin.login') }}">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #5E8B7E"></i>
                                            <span class="h1 fw-bold mb-0">Admin Beta Tudia?</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masukkan Akun</h5>
                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Alamat Email</label>
                                            <input type="email" id="form2Example17"
                                                class="form-control form-control-lg" name="email" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" name="password" required
                                                autocomplete="current-password" />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>
                                        
                                        {{-- @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                href="{{ route('admin.password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif --}}
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;"><a
                                                href="{{Route('contributor.login')}}" style="color: #393f81;">Anda seorang contributor?</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>