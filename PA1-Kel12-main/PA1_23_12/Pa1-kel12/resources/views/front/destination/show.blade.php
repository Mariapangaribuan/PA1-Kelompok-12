@extends('front.pages.postdetail')

@section('title')
    {{ $destination->destinationCategory->name }}
@endsection

@section('back')
    <p class="m-0"><a class="text-white" href="{{ route('destinations.index') }}">Home</a></p>
@endsection

@section('subtitle')
    {{ 'Destinasi Wisata Detail' }}
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
                            <div class="post-meta text-center"><span
                                    class="date">{{ $destination->destinationCategory->name }}</span>
                                <span class="mx-1">&bullet;</span>
                                <span>{{ $destination->created_at->format('F j, Y') }}</span>
                                <span class="mx-1">&bullet;</span>
                                <i class="fas fa-eye">{{ $destination->views }}</i>
                            </div>


                            <div class="text-center">
                                <h1 class="mb-3 bold">{{ $destination->name }}</h1>
                                <p class="section-title pr-5">
                                    <span class="pr-2"><i class="fas fa-pin"></i>{{ $destination->location }}</span>
                                </p>
                            </div>
                            <hr class="firstcharacter" color="black">
                        </div>
                        @php
                            $description = $destination->description;
                            $paragraphs = explode('</p>', $description);
                            $totalParagraphs = count($paragraphs);
                            $halfLength = ceil($totalParagraphs);
                            $firstHalf = implode('</p>', array_slice($paragraphs, 0, 1)) . '</p>';
                            $secondHalf = implode('</p>', array_slice($paragraphs, 1, $halfLength));
                        @endphp
                        <p>
                            <?php
                            $firstHalf = strip_tags($firstHalf);
                            $firstCharacter = substr($firstHalf, 0, 1);
                            $remainingText = substr($firstHalf, 1);
                            ?>
                            <span class="firstcharacter">{{ $firstCharacter }}</span>{!! $remainingText !!}
                        </p>
                        <div class="row my-4">
                            <div id="carouselExampleIndicators" class="carousel slide col-md-12 mb-4"
                                data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ($destination->galleries as $key => $gallery)
                                        <li data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="{{ $key }}"
                                            class="{{ $key == 0 ? 'active' : '' }}">
                                        </li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach ($destination->galleries as $key => $gallery)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ Storage::url($gallery->images) }}" class="d-block w-100"
                                                alt="...">
                                            <p class="text-center carousel-caption">{{ $gallery->name }}</p>
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
                            </div>
                            @if ($destination->source != null)
                                <p class="font-weight-bold">(Sumber: <span
                                        class="font-italic">{{ $destination->source }}</span>)</p>
                            @endif
                        </div>

                        <p>{!! $secondHalf !!}</p>
                        <div>
                            <a class="card1" href="#">
                                <p>Harga Tiket</p>
                                @if ($destination->ticket != null)
                                    <p class="small">Rp {{ number_format(intval($destination->ticket), 0, ',', '.') }}</p>
                                    </p>
                                @else
                                    <p class="small">Rp -</p>
                                @endif
                                <div class="go-corner" href="#">
                                    <div class="go-arrow">
                                        →
                                    </div>
                                </div>
                            </a>
                        </div>
                        @if ($destination->source != null)
                            <p class="font-weight-bold">(Sumber: <span
                                    class="font-italic">{{ $destination->source }}</span>)</p>
                        @endif
                    </div>



                    <div class="pt-5 comment-wrap">
                        <h3 class="comment-title py-4">{{ $testimonies->count() }} Testimoni</h3>
                        <ul class="comment-list">
                            @foreach ($testimonies as $testimony)
                                <li class="comment">
                                    <div class="vcard">
                                        <img src="@if ($testimony->contributor && $testimony->contributor->image) {{ Storage::url($testimony->contributor->image) }}
                                @else 
                                {{ asset('Template/dist/img/profile.jpeg') }} @endif"
                                            alt="Image placeholder">
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
                            <h3 class="mb-3">Berikan Testimoni</h3>
                            @if (Auth::guard('contributor')->check())
                                <form action="{{ Route('destinations.testimonies') }}" method="post" class="p-5 bg-light">
                                    @csrf
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="description" id="message" cols="30" rows="10" class="form-control" placeholder="...."></textarea>
                                        <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                                        <input type="hidden" name="kabupaten_id"
                                            value="{{ $destination->kabupaten->id }}">
                                        <input type="hidden" name="contributor_id"
                                            value="{{ Auth::guard('contributor')->user()->id }}">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-3 tombol">Kirim
                                                Testimoni</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <textarea name="description" id="message" cols="30" rows="10" class="form-control" placeholder="...."></textarea>
                                <a href="{{ route('contributor.login') }}" class="btn btn-primary mt-3 tombol">login
                                    untuk menambahkan testimoni</a>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">

                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="@if ($destination->contributor) {{ Storage::url($destination->contributor->image) }}
                        @else
                        {{ asset('Template/dist/img/profile.jpeg') }} @endif
                        "
                                alt="Image Placeholder" class="img-fluid mb-3">
                            <div class="bio-body">
                                <h2>
                                    @if ($destination->contributor)
                                        {{ $destination->contributor->name }}
                                    @elseif($destination->contributor_id == null)
                                        Admin
                                    @endif
                                </h2>
                                <p class="mb-4">Kami membuka kesempatan bagi Anda untuk berperan sebagai contributor.
                                    Mari bergabung dan berbagi pengetahuan serta keterampilan Anda dengan kami</p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h2>Wisata terdekat</h2>
                        <div class="post-entry-sidebar">
                            <ul>
                                @php $count = 0 @endphp
                                @foreach ($closeDestinations as $closeDestination)
                                    <li>
                                        <a href="{{ Route('destinations.show', $closeDestination->slug) }}"
                                            class="zoom-image">
                                            <img src="{{ Storage::url($closeDestination->galleries->first()->images) }}"
                                                alt="Image placeholder" class="me-4 rounded">
                                            <div class="text">
                                                <h3 class="text-secondary">{{ $closeDestination->name }}</h3
                                                    class="text-secondary">
                                                <div class="post-meta">
                                                    <span
                                                        class="mr-2">{{ $closeDestination->created_at->format('F j, Y') }}</span>
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
                <div class="sidebar-box">
                    @if ($accommodations->count() > 0)
                        <h2 class="mb-2">Akomodasi terdekat</h2>
                        <div class="post-entry-sidebar">
                            <ul>
                                @php $count = 0 @endphp
                                @foreach ($accommodations as $acc)
                                    <li>
                                        <a href="{{ Route('accommodations.show', $acc->slug) }}" class="zoom-image">
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
                @elseif ($restaurants->count() > 0)
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
            @else
                <h2>Destinasi terpopuler</h2>
                <div class="post-entry-sidebar">
                    <ul>
                        @php $count = 0 @endphp
                        @foreach ($popularDestinations as $acc)
                            <li>
                                <a href="{{ Route('destinations.show', $acc->slug) }}" class="zoom-image">
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
        @endif
    </div>




    <!-- END sidebar-box -->

    <div class="sidebar-box">
        <h2>Destinasi Kategori</h2>
        <ul class="categories">
            @foreach ($destinationCategories as $destinationCategory)
                <li><a href="{{ route('destinations.index', ['category' => $destinationCategory->id]) }}">{{ $destinationCategory->name }}
                    </a></li>
            @endforeach
        </ul>
    </div>

</div>
<!-- END sidebar -->

</div>
</div>
</section>


<!-- Start posts-entry -->
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
