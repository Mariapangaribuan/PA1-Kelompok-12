@extends('front.pages.postdetail')

@section('title')
    {{ $blog->blogCategory->name }}
@endsection

@section('back')
    <p class="m-0"><a class="text-white" href="{{ route('blogs.index') }}">Blog</a></p>
@endsection

@section('subtitle')
    {{ 'Blog Detail' }}
@endsection

@push('style')
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/variables.css') }}">
@endpush

@section('content')
    <main id="main">

        <section class="single-post-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 post-content" data-aos="fade-up">

                        <!-- ======= Single Post Content ======= -->
                        <div class="single-post">
                            <div class="post-meta"><span class="date">{{ $blog->blogCategory->name }}</span> <span
                                    class="mx-1">&bullet;</span> <span>{{ $blog->created_at->format('F j, Y') }}</span>                               
                                    &bullet; <i class="fas fa-eye"> {{ $blog->views }}</i>
                            </div>
                            <h1 class="mb-5">{{ $blog->title }}</h1>
                            <p><span
                                    class="firstcharacter">{{ substr($blog->excerpt, 0, 1) }}</span>{{ substr($blog->excerpt, 1) }}
                            </p>

                            @php
                                $usedImageIds = [];
                            @endphp

                            <figure class="my-4 small-img">
                                @php
                                    $randomImage1 = optional($blog->galleries->random());
                                    $usedImageIds[] = $randomImage1->id;
                                @endphp
                                <img src="{{ Storage::url($randomImage1->images) }}" alt="" class="img-fluid"
                                    style="width: 23cm">
                                <figcaption style="font-weight: bolder"><i>{{ $randomImage1->name }}</i> 
                                </figcaption>
                            </figure>


                            @php
                                $description = $blog->description;
                                $paragraphs = explode('</p>', $description);
                                $totalParagraphs = count($paragraphs);
                                $halfLength = ceil($totalParagraphs / 2);
                                $firstHalf = implode('</p>', array_slice($paragraphs, 0, $halfLength)) . '</p>';
                                $secondHalf = implode('</p>', array_slice($paragraphs, $halfLength));
                            @endphp

                            <p>{!! $firstHalf !!}</p>

                            @if ($blog->galleries->count() > 1)
                                <figure class="my-4">
                                    @php
                                        $randomImage2 = optional($blog->galleries->random());
                                        $usedImageIds[] = $randomImage2->id;
                                    @endphp
                                    <img src="{{ Storage::url($randomImage2->images) }}" alt="" class="img-fluid"
                                        style="width: 23cm">
                                    <figcaption style="font-weight: bolder"><i>{{ $randomImage2->name }}</i></figcaption>
                                </figure>
                            @endif
                            <p>{!! $secondHalf !!}</p>
                        </div><!-- End Single Post Content -->

                        <!-- ======= Comments ======= -->

                        <div class="comments">
                            <h5 class="comment-title py-4">{{$testimonies->count()}} Testimoni</h5>

                            @foreach ($testimonies as $testimony)
                            <div class="comment d-flex mb-4">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm rounded-circle">
                                        <img class="avatar-img" src="@if ($testimony->contributor && $testimony->contributor->image) 
                                        {{ Storage::url($testimony->contributor->image) }}
                                    @else
                                    {{ asset('Template/dist/img/profile.jpeg') }} @endif" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                        <div class="comment-meta d-flex align-items-baseline">
                                            <h6 class="me-2">{{ $testimony->contributor->name }}</h6>
                                            <span class="text-muted">{{ $testimony->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="comment-body">
                                            {{ $testimony->description}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        <!-- End Comments -->

                        <!-- ======= Comments Form ======= -->
                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-12">
                                <h5 class="comment-title">Berikan Testimoni</h5>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        @if (Auth::guard('contributor')->check())
                                            <form action="{{ Route('blogs.testimonies') }}" method="POST">
                                                @csrf
                                                <textarea class="form-control" name="description" id="comment-message" placeholder="Masukkan testimoni Anda"
                                                    cols="30" rows="10"></textarea>
                                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                <input type="hidden" name="kabupaten_id"
                                                    value="{{ $blog->kabupaten->id }}">
                                                <input type="hidden" name="contributor_id"
                                                    value="{{ Auth::guard('contributor')->user()->id }}">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-3">Kirim
                                                        Testimoni</button>
                                                </div>
                                            </form>
                                        @else
                                            <textarea class="form-control" name="description" id="comment-message" placeholder="Masukkan testimoni Anda"
                                                cols="30" rows="10"></textarea>
                                            <a href="{{ route('contributor.login') }}" class="btn btn-primary mt-3">login
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
                        </div>

                        <!-- End Comments Form -->

                    </div>
                    @include('front.blog.sidebar')
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
