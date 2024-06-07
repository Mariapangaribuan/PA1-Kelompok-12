<div class="py-5 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 text-center mb-3 mb-lg-0 text-lg-start">
                <h3 class="text-white m-0">Jelajahi Sekitaran Danau Toba Disini</h3>
            </div>
        </div>
    </div>
</div>
<div class="site-footer">
    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                <div class="widget">
                    <h3>Beta Tudia<span class="text-primary">?</span> </h3>
                    <p>Danau Toba memang surgawi <br>
                        Tak bisa kuungkapkan dengan kata-kata
                        <br>Biarlah hati ini yang merasakannya <br>
                        Keindahan yang takkan pernah terlupa
                    </p>
                </div> <!-- /.widget -->
                <div class="widget">
                    <h3>Connect</h3>
                    <ul class="list-unstyled social">
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-linkedin"></span></a></li>
                        <li><a href="#"><span class="icon-pinterest"></span></a></li>
                        <li><a href="#"><span class="icon-dribbble"></span></a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

            <div class="col-lg-3 ml-auto">
                <div class="widget">
                    <h3>Halaman</h3>
                    <ul class="list-unstyled float-left links">
                        <li><a href="{{ Route('welcome') }}">Beranda</a></li>
                        <li><a href="{{ Route('blogs.index') }}">Blog</a></li>
                        <li><a href="{{ Route('destinations.index') }}">Wisata</a></li>
                        <li><a href="{{ Route('galleries.index') }}">Galeri</a></li>
                        <li><a href="{{ Route('tentangkami') }}">Tentang Kami</a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

            <div class="col-lg-3">
                <div class="widget">
                    <h3>Sekitaran Danau Toba</h3>
                    <ul class="list-unstyled float-left links">
                        @foreach ($kabupatens as $kabupaten)
                            <li><a href="{{ route('kabupatens', $kabupaten->slug) }}">{{ $kabupaten->name }}</a></li>
                        @endforeach
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->


            <div class="col-lg-2">
                <div class="widget">
                    <h3>Kontak</h3>
                    <address>Kelompok 12. TI, DEL 2022</address>
                    <ul class="list-unstyled links mb-4">
                        <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                        <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                        <li><a href="mailto:beta@tudia.com">beta@tudia.com</a></li>
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

        </div> <!-- /.row -->

        {{-- <div class="row mt-5">
            <div class="col-12 text-center">
                <p class="mb-0">Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>. All Rights Reserved. &mdash; Designed with love by <a
                        href="https://untree.co">Beta Tudia?</a>
                    <!-- License information: https://untree.co/license/ -->
                    Distributed By <a href="https://themewagon.com" target="_blank">Kelompok12</a>
                </p>
            </div>
        </div> <!-- /.container --> --}}
    </div>
