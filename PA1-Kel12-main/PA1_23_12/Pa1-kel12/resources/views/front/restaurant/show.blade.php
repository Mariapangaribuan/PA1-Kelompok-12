@extends('front.pages.postdetail')

@section('title')
    Tempat Makan
@endsection

@section('back')
    <p class="m-0"><a class="text-white" href="{{ route('restaurants.index') }}">Home</a></p>
@endsection

@section('subtitle')
    {{ 'Tempat Makan Detail' }}
@endsection

@push('style')
    <style>
        .cards .card {
            transition: filter 0.3s ease;
        }

        .cards .card:hover {
            transform: scale(1.1);
            filter: blur(0);
        }

        .cards:hover .card:not(:hover) {
            filter: blur(8px);
        }

        .h {
            display: none;
        }

        .carousel-item img {
            width: 500px;
            /* Ganti dengan ukuran yang diinginkan */
            height: 300px;
            /* Ganti dengan ukuran yang diinginkan */
            object-fit: cover;
            /* Mengatur agar gambar memenuhi area dengan proporsi aslinya */
        }
    </style>
@endpush

@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-content pe-5">
                    <h1 class="lead heading aos-init aos-animate">{{ $restaurant->name }}</h1>
                    <p>{{ $restaurant->location }}</p>
                    <hr class="heading">
                    @php
                        $description = $restaurant->description;
                        $paragraphs = explode('</p>', $description);
                        $totalParagraphs = count($paragraphs);
                        $halfLength = ceil($totalParagraphs / 3);
                        $firstHalf = implode('</p>', array_slice($paragraphs, 0, 1)) . '</p>';
                        $secondHalf = implode('</p>', array_slice($paragraphs, 1, $halfLength));
                        $thirdHalf = implode('</p>', array_slice($paragraphs, $halfLength * 2));
                    @endphp

                    <p><span class="firstcharacter">{{ strip_tags(substr($firstHalf, 0, 4)) }}</span>{!! substr($firstHalf, 4) !!}
                    </p>

                    <div id="carouselExampleIndicators" class="carousel slide col-md-12 mb-4" data-bs-ride="carousel">
                        @php
                            $placeGalleries = $restaurant->galleries->where('category', 'place');
                        @endphp

                        @if ($placeGalleries->count() > 0)
                            <ol class="carousel-indicators">
                                @foreach ($placeGalleries as $key => $gallery)
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                                        class="{{ $key == 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($placeGalleries as $key => $gallery)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ Storage::url($gallery->images) }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>

                    <p>{!! $secondHalf !!}</p>


                    <h3 class="text-black mb-3 text-center">Daftar Menu</h3>
                    <hr class="mn-3">

                    @if ($restaurant->galleries->where('category', 'menu')->count() > 0)
                        <div class="row justify-content-center cards">
                            @foreach ($restaurant->galleries->where('category', 'menu') as $menu)
                                <div class="col-md-4 mb-3">
                                    <div class="card hover-card">
                                        <img class="card-img-top gambar" src="{{ Storage::url($menu->images) }}"
                                            alt="Card image cap">
                                        <div class="card-body ">
                                            <div class="card-text">

                                                <h3>{{ Str::limit($menu->name, 10) }}</h3>
                                                <p>{{ Str::limit($menu->description, 20) }}</p>
                                            </div>
                                            <div class="card-details h">
                                                <h3>{{ $menu->name }}</h3>
                                                <p>{{ $menu->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No menu galleries found.</p>
                    @endif

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            const cards = $('.hover-card');

                            cards.on('mouseover', function() {
                                cards.not(this).css('filter', 'blur(3px)');
                                $(this).find('.card-text').hide();
                                $(this).find('.card-details').show();
                            });

                            cards.on('mouseout', function() {
                                cards.css('filter', 'blur(0)');
                                $(this).find('.card-text').show();
                                $(this).find('.card-details').hide();
                            });

                            $('.cards').on('mouseleave', function() {
                                if (!cards.is(':hover')) {
                                    cards.css('filter', 'blur(0)');
                                    cards.find('.card-text').show();
                                    cards.find('.card-details').hide();
                                }
                            });
                        });
                    </script>

                    <p>{!! $thirdHalf !!}</p>



                    <div class="pt-5 mb-3">
                        <h3 class="mb-5">{{ $testimonies->count() }} Testimoni</h3>
                        <ul class="comment-list">

                            @foreach ($testimonies as $testimony)
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="@if ($testimony->contributor && $testimony->contributor->image) {{ Storage::url($testimony->contributor->image) }}
                                @else 
                                {{ asset('Template/dist/img/profile.jpeg') }} @endif"
                                            alt="Free Website Template by Free-Template.co">
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{ $testimony->contributor->name }}</h3>
                                        <div class="meta">{{ $testimony->created_at->diffForHumans() }}</div>
                                        <p>{{ $testimony->description }}</p>

                                    </div>
                                </li>
                            @endforeach


                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Tinggalkan testimoni</h3>
                            @if (Auth::guard('contributor')->check())
                                <form action="{{ Route('restaurants.testimonies') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="message">Message</label>
                                        <textarea name="description" id="message" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                    <input type="hidden" name="kabupaten_id" value="{{ $restaurant->kabupaten->id }}">
                                    <input type="hidden" name="contributor_id"
                                        value="{{ Auth::guard('contributor')->user()->id }}">
                                    <div class="mb-3">
                                        <button type="submit" value="Post Comment"
                                            class="btn btn-primary btn-md text-white">Kirim</button>
                                    </div>

                                </form>
                            @else
                                <div class="mb-3">
                                    <label for="message">Message</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <a href="{{ route('contributor.login') }}" class="btn btn-primary mt-3">login
                                    untuk menambahkan testimoni</a>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-md-4 sidebar">
                    <div class="sidebar-box">
                        <img src="@if ($restaurant->contributor) {{ Storage::url($restaurant->contributor->image) }}
                      @else
                      {{ asset('Template/dist/img/profile.jpeg') }} @endif"
                            alt="Free Website Template by Free-Template.co" class="img-fluid mb-4 w-50 rounded-circle">
                        <h3 class="text-black">
                            @if ($restaurant->contributor)
                                {{ $restaurant->contributor->name }}
                            @elseif($restaurant->contributor_id == null)
                                Admin
                            @endif
                        </h3>
                        <p>Bersama-sama, kita dapat menghadirkan konten yang menarik dan informatif tentang destinasi wisata
                            terbaik di seluruh dunia. Dari ulasan pribadi, tips perjalanan, hingga cerita petualangan, semua
                            itu dapat dijadikan sumber inspirasi bagi para pelancong.</p>

                    </div>

                    <div class="sidebar-box">
                        <div class="categories">
                            <h3>Destinasi Terdekat</h3>
                            @php $count = 0 @endphp
                            @foreach ($destinations as $destination)
                                <li><a href="{{ Route('destinations.show', $destination->slug) }}">
                                        <img src="{{ Storage::url($destination->galleries->first()->images) }}"
                                            alt="Image placeholder" class="me-4 rounded" style="width: 100px">
                                        {{ $destination->name }}

                                    </a></li>
                                @php $count++ @endphp
                                @if ($count == 5)
                                @break
                            @endif
                        @endforeach

                    </div>
                </div>

                <div class="sidebar-box">
                    <div class="categories">
                        <h3>Destinasi Terdekat</h3>
                        @php $count = 0 @endphp
                        @foreach ($blogs as $blog)
                            <li><a href="{{ Route('blogs.show', $blog->slug) }}">
                                    <img src="{{ Storage::url($blog->galleries->first()->images) }}"
                                        alt="Image placeholder" class="me-4 rounded" style="width: 100px">
                                    {{ $blog->title }}

                                </a></li>
                            @php $count++ @endphp
                            @if ($count == 5)
                            @break
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
