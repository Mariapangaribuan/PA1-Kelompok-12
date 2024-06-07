<!doctype html>
<html lang="en">

<head>
    {{-- head css --}}
    @include('front.partials.head')
    {{-- head css end --}}
    @stack('style')
</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    {{-- Navbar --}}
    @include('front.partials.navbar')
    {{-- Navbar end --}}



    <div id="heroCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="hero overlay">
                    <div class="rellax">
                        <img src="{{ URL::asset('asset/thumbnail.jpg') }}" alt="Image"
                            class="img-fluid half animated">
                    </div>
                    <div class="container">
                        <div class="row align-items-center justify-content-start">
                            <div class="col-lg-9 mx-auto text-center">
                                <h1 class="heading">@yield('title')</h1>
                                <p class="mb-4">@yield('description')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="hero overlay">
                    <div class="rellax">
                        <img src="{{ URL::asset('asset/thumbnail1.jpg') }}" alt="Image"
                            class="img-fluid half animated">
                    </div>
                    <div class="container">
                        <div class="row align-items-center justify-content-start">
                            <div class="col-lg-9 mx-auto text-center">
                                <h1 class="heading">@yield('title')</h1>
                                <p class="mb-4">@yield('description')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more carousel items as needed -->
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Menginisialisasi carousel
        $('#heroCarousel').carousel({
            interval: 5000, // Waktu tunda antara slide (dalam milidetik)
            pause: 'hover', // Berhenti saat dihover
            wrap: true // Melintasi slide secara otomatis
        });
    });
</script>





    @yield('content')


    <!-- /.site-footer -->
    @include('front.partials.footer')

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <script src="{{ URL::asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    <script src="{{ URL::asset('frontend/js/tiny-slider.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/aos.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/navbar.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/counter.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/rellax.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/flatpickr.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/custom.js') }}"></script>
    @stack('script')
</body>

</html>
