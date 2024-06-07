    {{-- head css --}}
    @include('front.partials.head')
    {{-- head css end --}}
	@stack('style')
<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('front.partials.navbar')

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h3 class="display-3 font-weight-bold text-white">@yield('title')</h3>
            <div class="d-inline-flex text-white">
                @yield('back')
                <p class="m-0 px-2">/</p>
                <p class="m-0">@yield('subtitle')</p>
            </div>
        </div>
    </div>

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


    @include('front.partials.script')

    </body>

    </html>
