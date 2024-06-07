@extends('front.pages.post')

@section('title')
    Galeri BetaTudia
@endsection

@section('description')
    Kumpulan gambar
@endsection

@push('style')
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/gallery.css') }}">
@endpush

@section('content')
    <div class="section section-3" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row align-items-center justify-content-between  mb-5">
                <div class="col-lg-5" data-aos="fade-up">
                    <h2 class="heading mb-3">Galeri Beta Tudia?</h2>
                </div>
                <div class="col-lg-5 text-md-end" data-aos="fade-up" data-aos-delay="100">
                    <div id="destination-controls">
                        <span class="prev me-3" data-controls="prev">
                            <span class="icon-chevron-left"></span>

                        </span>
                        <span class="next" data-controls="next">
                            <span class="icon-chevron-right"></span>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="destination-slider-wrap">
            <div class="destination-slider">
                @foreach ($blogs as $blog)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-right" data-aos-delay="100">
                        <div class="media-entry zoom-image">
                            <a href="{{ Route('blogs.show', $blog->slug) }}">
                                <img src="{{ Storage::url(optional($blog->galleries->random())->images) }}" alt="Image"
                                    class="img-fluid gambar2">
                            </a>
                            <div class="bg-white m-body">
                                <span class="date">{{ $blog->updated_at->format('F j, Y') }}</span>
                                <h3><a href="{{ Route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                <p>{{ Str::limit($blog->excerpt, 100) }}</p>

                                <a href="{{ Route('blogs.show', $blog->slug) }}"
                                    class="more d-flex align-items-center float-start">
                                    <span class="label">Read More</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <div class="row align-items-stretch">
        @foreach ($destinations as $destination)
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-right" data-aos-delay="100">
                <div class="media-entry zoom-image">
                    <a href="{{ Route('destinations.show', $destination->slug) }}">
                        <img src="{{ Storage::url(optional($destination->galleries->random())->images) }}" alt="Image"
                            class="img-fluid gambar2">
                    </a>
                    <div class="bg-white m-body">
                        <span class="date">{{ $destination->updated_at->format('F j, Y') }}</span>
                        <h3><a href="{{ Route('destinations.show', $destination->slug) }}">{{ $destination->name }}</a>
                        </h3>
                        <p>{!! Str::limit($destination->description, 100) !!}</p>

                        <a href="{{ Route('destinations.show', $destination->slug) }}"
                            class="more d-flex align-items-center float-start">
                            <span class="label">Read More</span>
                            <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row align-items-stretch">
        @foreach ($restaurants as $destination)
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-right" data-aos-delay="100">
                <div class="media-entry zoom-image">
                    <a href="{{ Route('restaurants.show', $destination->slug) }}">
                        <img src="{{ Storage::url(optional($destination->galleries->random())->images) }}" alt="Image"
                            class="img-fluid gambar2">
                    </a>
                    <div class="bg-white m-body">
                        <span class="date">{{ $destination->updated_at->format('F j, Y') }}</span>
                        <h3><a href="{{ Route('restaurants.show', $destination->slug) }}">{{ $destination->name }}</a>
                        </h3>
                        <p>{!! Str::limit($destination->description, 100) !!}</p>

                        <a href="{{ Route('restaurants.show', $destination->slug) }}"
                            class="more d-flex align-items-center float-start">
                            <span class="label">Read More</span>
                            <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row align-items-stretch">
        @foreach ($accommodations as $destination)
            <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-right" data-aos-delay="100">
                <div class="media-entry zoom-image">
                    {{-- <a href="{{ Route('accommodations.show', $destination->slug) }}"> --}}
                        <img src="{{ Storage::url(optional($destination->galleries->random())->images) }}" alt="Image"
                            class="img-fluid gambar2">
                    </a>
                    <div class="bg-white m-body">
                        <span class="date">{{ $destination->updated_at->format('F j, Y') }}</span>
                        {{-- <h3><a href="{{ Route('accommodations.show', $destination->slug) }}">{{ $destination->name }}</a> --}}
                        </h3>
                        <p>{!! Str::limit($destination->description, 100) !!}</p>

                        {{-- <a href="{{ Route('accommodations.show', $destination->slug) }}" --}}
                            class="more d-flex align-items-center float-start">
                            <span class="label">Read More</span>
                            <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('script')
    <script src="{{ URL::asset('js/owl.corousel.min.js') }}"></script>
    <script src="{{ URL::asset('js/galery.js') }}"></script>
    <script src="{{ URL::asset('js/masonry.pkgd.min.js') }}"></script>
@endpush
