@extends('front.pages.postdetail')

@section('title')
    {{ $accommodation->category }}
@endsection

@section('back')
    <p class="m-0"><a class="text-white" href="{{ route('accommodations.index') }}">Home</a></p>
@endsection

@section('subtitle')
    {{ 'Akomodasi Detail' }}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/destination.css') }}">
    <style>
    
        .carousel-item img {
            width: 500px;
            /* Ganti dengan ukuran yang diinginkan */
            height: 400px;
            /* Ganti dengan ukuran yang diinginkan */
            object-fit: cover;
            /* Mengatur agar gambar memenuhi area dengan proporsi aslinya */
        }
    </style>
@endpush

@section('content')
    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        <div class="d-flex flex-column text-left mb-3">
                            <div class="post-meta"><span class="date">{{ $accommodation->category }}</span>
                                <span class="mx-1">&bullet;</span>
                                <span>{{ $accommodation->created_at->format('F j, Y') }}</span>
                            </div>
                            <h1 class="mb-3 bold">{{ $accommodation->name }}</h1>
                            <p class="section-title pr-5">
                                <span class="pr-2">{{ $accommodation->location }}</span>
                            </p>
                            <hr class="firstcharacter" color="black">
                        </div>
                        @php
                            $description = $accommodation->description;
                            $paragraphs = explode('</p>', $description);
                            $totalParagraphs = count($paragraphs);
                            $halfLength = ceil($totalParagraphs / 3);
                            $firstHalf = implode('</p>', array_slice($paragraphs, 0, $halfLength)) . '</p>';
                            $secondHalf = implode('</p>', array_slice($paragraphs, 1, $halfLength));
                        @endphp
                        <p class="text-justify"><span class="firstcharacter">{!! strip_tags(substr($firstHalf, 0, 4)) !!}</span>{!! substr($firstHalf, 4) !!}
                        </p>
                        <div class="row my-4">
                            <div id="carouselExampleIndicators" class="carousel slide col-md-12 mb-4"
                                data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ($accommodation->galleries as $key => $gallery)
                                        <li data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                                        </li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach ($accommodation->galleries as $key => $gallery)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ Storage::url($gallery->images) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>
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
                                <p>{{ $gallery->name }}</p>
                            </div>

                        </div>
                        <p class="text-justify">{!! $secondHalf !!}</p>
                        <table class="table table-hover col-4 table-responsive" style="width: 50%;">
                            <thead class="table-dark">
                                <tr>
                                    <td>

                                        Data lainnnya
                                    </td>
                                </tr>
                            </thead>
                            <tbody class="table-primary">
                                <tr>
                                    <td class="col-2">
                                        Kisaran Harga:
                                    </td>
                                    <td class="text-center">
                                        Rp. {{ $accommodation->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        No Handphone:
                                    </td>
                                    <td class="text-center align-center">
                                        @if ($accommodation->phone != null)
                                            
                                        {{ $accommodation->phone }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Lokasi
                                    </td>
                                    <td class="text-center align-center">
                                        @if ($accommodation->location != null)
                                            
                                        {{ $accommodation->location }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                           
                        </table>
                    </div>


                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">

                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="@if ($accommodation->contributor) {{ Storage::url($accommodation->contributor->image) }}
                        @else
                        {{ asset('Template/dist/img/profile.jpeg') }} @endif
                        "
                                alt="Image Placeholder" class="img-fluid mb-3">
                            <div class="bio-body">
                                <h2>
                                    @if ($accommodation->contributor)
                                        {{ $accommodation->contributor->name }}
                                    @elseif($accommodation->contributor_id == null)
                                        Admin
                                    @endif
                                </h2>
                                <p class="mb-4">Kami membuka kesempatan bagi Anda untuk berperan sebagai contributor. Mari
                                    bergabung dan berbagi pengetahuan serta keterampilan Anda dengan kami</p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h2>Wisata Popular</h2>
                        <div class="post-entry-sidebar">
                            <ul>
                                @php $count = 0 @endphp
                                @foreach ($popularDestinations as $popularDestination)
                                    <li>
                                        <a href="{{ Route('accommodations.show', $popularDestination->slug) }}" class="zoom-image">
                                            <img src="{{ Storage::url($popularDestination->galleries->first()->images) }}"
                                                alt="Image placeholder" class="me-4 rounded">
                                            <div class="text">
                                                <h3 class="text-secondary">{{ $popularDestination->name }}</h3
                                                    class="text-secondary">
                                                <div class="post-meta">
                                                    <span
                                                        class="mr-2">{{ $popularDestination->created_at->format('F j, Y') }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @php $count++ @endphp
                                    @if ($count == 3)
                                    @break
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <h2>Tempat Makan</h2>
                    <div class="post-entry-sidebar">
                        <ul>
                            @php $count = 0 @endphp
                            @foreach ($restaurants as $acc)
                                <li>
                                    <a href="{{ Route('restaurants.show', $acc->slug) }}" class="zoom-image">
                                        <img src="{{ Storage::url($acc->galleries->first()->images) }}"
                                            alt="Image placeholder" class="me-4 rounded">
                                        <div class="text">
                                            <h3 class="text-secondary">{{ $acc->name }}</h3>
                                            <div class="post-meta">
                                                <span
                                                    class="mr-2">{{ $acc->created_at->format('F j, Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @php $count++ @endphp
                                @if ($count == 3)
                                @break
                            @endif
                        @endforeach
                    </ul>
                </div>
                </div>

            </div>
            <!-- END sidebar-box -->

        </div>
        <!-- END sidebar -->

    </div>
    </div>
</section>

<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
    <div class="row mb-4">
    <a href="{{ route('blogs.index') }}">
        <div class="col-12 text-uppercase text-black text-decoration-underline">Lihat info lainnya..</div>
    </a>
    </div>
    <div class="row">
    @foreach ($latestBlogs as $latestBlog)
        <div class="col-md-6 col-lg-3">
            <div class="blog-entry">
                <a href="{{ Route('blogs.show', $latestBlog->slug) }}" class="img-link zoom-image">
                    <img src="{{ Storage::url(optional($latestBlog->galleries->random())->images) }}"
                        alt="Image" class="img-fluid gambar2">
                </a>
                <br>
                <span class="date">{{ $latestBlog->created_at->format('F j, Y') }}</span>
                <h2><a href="{{ Route('blogs.show', $latestBlog->slug) }}">{{ $latestBlog->name }}</a></h2>
                <p>{{ Str::limit($latestBlog->excerpt, 100) }}</p>
                <p><a href="{{ Route('blogs.show', $latestBlog->slug) }}" class="read-more">Continue
                        Reading</a></p>
            </div>
        </div>
    @endforeach
    
    </div>
    </div>
    </section>

<!-- End posts-entry -->
@endsection
<!-- ======================================================Gambar Slider==============================================================-->
