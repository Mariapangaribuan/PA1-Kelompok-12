{{-- head css --}}
@include('front.partials.head')
{{-- head css end --}}

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



    <div class="hero overlay zoom">
        <div class="img-bg rellax">
            <img src="{{ URL::asset('asset/thumbnail.jpg') }}" alt="Image" class="img-fluid zoom-anim" id="image">
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-start">
                <div class="col-lg-6">
                    <h1 class="heading" data-aos="fade-up">Website Wisata Sekitaran Danau Toba</h1><span
                        id="i"></span>
                    <h3 class="mb-5" data-aos="fade-up" id="heading" style="color: white;">BetaTudia adalah website
                        penyedia informasi dan tips unik untuk kamu sekalian</h3>

                    <form action="{{ Route('search') }}" method="GET" class="form glass" data-aos="fade-down-right"
                        data-aos-delay="100">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
                                <div class="input-group">
                                    <select name="cariApa" id="cariApa" class="form-control custom-select">
                                        <option value="">Cari Apa?</option>
                                        <option value="destinations">Destinasi Wisata</option>
                                        <option value="blogs">Info Wisata</option>
                                        <option value="restaurants">Tempat Makan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-5">
                                <div class="input-group">
                                    <select name="kemana" id="kemana" class="form-control custom-select">
                                        <option value="">Kemana?</option>
                                        @foreach ($kabupatens as $kabupaten)
                                            <option value="{{ $kabupaten->id }}">
                                                {{ $kabupaten->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-3" id="cat">
                                <div class="input-group">
                                    <select name="kategori" id="kategori" class="form-control custom-select" pla>
                                        <option value="">Kategori</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-check mt-3">
                                    <input type="checkbox" class="form-check-input" id="saveSearch" checked="checked">
                                    <label class="form-check-label" for="saveSearch">Save this search</label>
                                </div>
                            </div>
                        </div>
                    </form>


                    <template id="ValueOfDestCat">
                        @forelse($destinationCategories as $sdcats)
                            <option value="{{ $sdcats->id }}">{{ $sdcats->name }}</option>
                        @empty
                            <option value="">Tidak ada kategori</option>
                        @endforelse
                    </template>

                    <template id="ValueOfBlogCat">
                        @forelse($blogCategories as $sbcats)
                            <option value="{{ $sbcats->id }}">{{ $sbcats->name }}</option>
                        @empty
                            <option value="">Tidak ada kategori</option>
                        @endforelse
                    </template>

                    <script>
                        const cariApa = document.getElementById('cariApa');
                        const kemana = document.getElementById('kemana');
                        const kategori = document.getElementById('kategori');

                        cariApa.addEventListener('change', () => {

                            while (kategori.options.length > 1) {
                                kategori.remove(1);
                            }

                            switch (cariApa.value) {
                                case 'none':
                                    break;
                                case 'destinations':

                                    let templateKategoriValue = document.getElementById("ValueOfDestCat").content;
                                    kategori.appendChild(templateKategoriValue.cloneNode(true));

                                    break;
                                case 'blogs':

                                    let templateBKategoriValue = document.getElementById("ValueOfBlogCat").content;
                                    kategori.appendChild(templateBKategoriValue.cloneNode(true));

                                    break;
                                case 'restaurants':

                                    const cat = document.getElementById('cat');

                                    cat.style.display = 'hide';

                                    break;
                            }
                        })
                    </script>

                </div>
            </div>


        </div>
    </div>

    {{-- section  --}}
    @include('front.partials.section')
    {{-- section  end --}}


    {{-- services --}}
    @include('front.partials.services')
    {{-- services end --}}

    {{-- card --}}
    @include('front.partials.card')
    {{-- card end --}}



    <div class="section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0 order-lg-2 zoom-image" data-aos="fade-up">
                    <img src="{{ URL::asset('asset/welcome/2.jpg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="heading mb-4">Bersama kami dan dapatkan kenangan manis untuk dikenang</h2>
                    <p>Mengunjungi Website Wisata Sekitaran Danau Toba membawa kenangan manis yang tak terlupakan,
                        seperti
                        merasakan keindahan alamnya yang menakjubkan dan merasakan kehangatan keramahan penduduk
                        setempat.
                    </p>
                    <p>Semua itu telah kami sajikan agar menjadi sebuah kenangan manis yang selalu terukir dalam ingatan
                        dan hati.</p>
                    <p class="my-4" data-aos="fade-up" data-aos-delay="200"><a href="#"
                            class="btn btn-primary">Read more</a></p>
                </div>
            </div>
        </div>
    </div>

    {{-- card --}}
    @include('front.partials.testimoni')
    {{-- card end --}}

    <div class="section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="{{ URL::asset('asset/welcome/5.jpeg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-5 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">

                    <h2 class="heading mb-5">Sering Ditanyakan?</h2>

                    <div class="custom-accordion" id="accordion_1">
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">Bagaimana cara registrasi sebagai kontributor?</button>
                            </h2>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordion_1">
                                <div class="accordion-body">
                                    Untuk dapat menjadi seorang kontributor anda dapat melakukan registrasi dan bersama
                                    kami berikan lebih banyak informasi menarik.
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">Apa objek wisata terkenal di daerah ini?</button>
                            </h2>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordion_1">
                                <div class="accordion-body">
                                    Kami telah mengurutkan objek wisata terkenal setiap daerah mulai dari yang paling
                                    sering dilihat bahkan sampai yang terbaru.
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">Bagaimana cara menuju objek wisata tersebut?</button>
                            </h2>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordion_1">
                                <div class="accordion-body">
                                    Untuk itu kami juga sudah menyediakan data untuk transportasi yang dapat anda
                                    gunakan sebagai sarana anda menuju objek wisata.
                                </div>
                            </div>

                        </div> <!-- .accordion-item -->


                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">Apakah ada hotel atau penginapan di dekat objek wisata
                                    ini?</button>
                            </h2>

                            <div id="collapseFour" class="collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordion_1">
                                <div class="accordion-body">
                                    Kami juga menyediakan opsi penginapan di sekitar objek wisata, mulai dari hotel
                                    bintang lima hingga penginapan budget. Anda dapat menghubungi pihak objek wisata
                                    atau melakukan penelusuran online untuk menemukan opsi penginapan yang sesuai dengan
                                    kebutuhan dan anggaran Anda.
                                </div>
                            </div>

                        </div> <!-- .accordion-item -->

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--============================================ Recent Post ==============================================-->
    <div class="section">
        <div class="container">

            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading mb-5">Info Terbaru</h2>
                    <a href="{{ route('blogs.index')}}" class="text-center h4 text-decoration-underline">Lihat Lainnya..</a>
                </div>
                

            </div>
            <div class="row align-items-stretch">

                @foreach ($blogs as $blog)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="media-entry">
                            <a href="{{ Route('blogs.show', $blog->slug) }}" class="zoom-image">
                                <img src="{{ Storage::url(optional($blog->galleries->random())->images) }}"
                                    alt="Image" class="img-fluid gambar2">
                            </a>
                            <div class="bg-white m-body">
                                <span class="date">{{ $blog->blogCategory->name }} &mdash;
                                    {{ $blog->updated_at->format('F j, Y') }}</span>
                                <h3><a href="{{ Route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                <p>{{ Str::limit($blog->excerpt, 100) }}</p>

                                <a href="{{ Route('blogs.show', $blog->slug) }}"
                                    class="more d-flex align-items-center float-start">
                                    <span class="label">Baca Selengkapnya</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!--============================================ Recent Post ==============================================-->





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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <script>
        var app = document.getElementById('heading');
    
        var typewriter = new Typewriter(app, {
            loop: false,
            delay: 75
        });
    
        typewriter.typeString('Jelajahi keindahan Danau Toba di website kami')
            .pauseFor(1000)
            .deleteAll()
            .typeString('Liburan lebih seru bersama kami di sekitaran Danau Toba')
            .pauseFor(1000)
            .deleteAll()
            .typeString('Danau Toba merupakan destinasi terbaik di Sumatera Utara')
            .pauseFor(1000)
            .start();
    
        var app = document.getElementById('text');
    
        var typewriter = new Typewriter(app, {
            loop: false,
            delay: 75
        });
    
        typewriter.typeString(
                'Kota Jakarta kota metropolitan, Surga impian para perantau <br> Kusapa“ Horas apa kabar kawan” Hampa hatiku dibalas“ fine, thank you” '
            )
            .pauseFor(1000)
            .deleteAll()
            .typeString('Liburan lebih seru bersama kami di sekitaran Danau Toba')
            .pauseFor(1000)
            .deleteAll()
            .typeString('Danau Toba merupakan destinasi terbaik di Sumatera Utara')
            .pauseFor(1000)
            .start();
    </script>
    
    
    <!-- ========================= Script untuk efek Zoom in dan out gambar  ========================= -->
    <script>
        var images = [
            '{{ URL::asset("asset/thumbnail.jpg")}}',
            '{{ URL::asset("asset/thumbnail1.jpg")}}', 
            '{{ URL::asset("asset/thumbnail2.jpg")}}', 
            '{{ URL::asset("asset/thumbnail3.jpg")}}', 
            '{{ URL::asset("asset/thumbnail4.jpg")}}', 
            '{{ URL::asset("asset/login.jpg")}}'
        ];
        var currentIndex = 0;
        var img = document.getElementById('image');
    
        function changeImage() {
            img.classList.add("zoom-out");
            setTimeout(function() {
                currentIndex++;
                if (currentIndex >= images.length) {
                    currentIndex = 0;
                }
                img.src = images[currentIndex];
                img.classList.remove("zoom-out");
            }, 500);
        }
    
        setInterval(changeImage, 7000);
    
        img.addEventListener('mouseover', function() {
            img.classList.add("zoom-in");
        });
    
        img.addEventListener('mouseout', function() {
            img.classList.remove("zoom-in");
        });
    </script>


</body>

</html>
