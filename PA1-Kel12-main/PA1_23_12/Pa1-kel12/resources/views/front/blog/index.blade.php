@extends('front.pages.post')

@section('title')
    Kumpulan Info Wisata
@endsection

@section('description')
    Penuhi dahaga informasimu di sini, jangan ketinggalan update!
    Halaman info wisata kami berisi informasi segar seputar Danau toba terbaru. Jangan lewatkan artikel-artikel menarik yang
    akan
    memperkaya wawasanmu. Ayo, simak dan rasakan pengalaman baru bersama kami!
@endsection

@push('style')
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/variables.css') }}">
@endpush

@section('content')
    <div class="section">
        <div class="container">

            <div class="row">

                @if ($selectedCategory != null && $selectedKabupaten == null)
                    @php
                        $category = \App\Models\BlogCategory::find($selectedCategory);
                    @endphp
                    <h2 class="category-title mb-1">Kategori: {{ $category->name }}</h2>
                @elseif ($selectedKabupaten != null && $selectedCategory == null)
                    @php
                        $kabupaten = \App\Models\Kabupaten::find($selectedKabupaten);
                    @endphp
                    <h2 class="category-title mb-1">Kabupaten: {{ $kabupaten->name }}</h2>
                @elseif ($selectedCategory != null && $selectedKabupaten != null)
                    @php
                        $category = \App\Models\BlogCategory::find($selectedCategory);
                        $kabupaten = \App\Models\Kabupaten::find($selectedKabupaten);
                    @endphp
                    <h2 class="category-title mb-1">Kabupaten {{ $kabupaten->name }} dan Berkategori
                        {{ $category->name }}
                    </h2>
                @endif
                <div class="col-md-9 aos-init aos-animate" data-aos="fade-up">

                    <div class="search col-sm-11 mb-5 d-flex justify-content-center glass" style="align-items: center; ">
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: transparent">
                                <i class="fa fa-search fa-2x"></i>
                            </span>
                            <input type="search" name="search" id="search" class="form-control" style="border: none;"
                                placeholder="Cari info wisata..">
                        </div>

                        <div class="input-group">
                            <form id="searchForm" action="{{ route('blogs.index') }}" method="GET" class="d-flex">
                                <select name="kabupaten" id="kabupaten" class="custom-select" style="border: none;">
                                    @if ($selectedKabupaten)
                                        @php
                                            $kabupaten = \App\Models\Kabupaten::find($selectedKabupaten);
                                        @endphp
                                        <option value="{{ $kabupaten->id }}" selected>{{ $kabupaten->name }}</option>
                                        <option value="">Semua Kabupaten?</option>
                                    @else
                                        <option value="" selected>Mau Kemana?</option>
                                    @endif
                                    @foreach ($kabupatens as $kabupaten)
                                        <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>
                                    @endforeach
                                </select>
                                <select name="category" id="category" class="custom-select" style="border: none;">
                                    @if ($selectedCategory)
                                        @php
                                            $category = \App\Models\BlogCategory::find($selectedCategory);
                                        @endphp
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        <option value="">Semua Kategori ?</option>
                                    @else
                                        <option value="" selected>Kategori ?</option>
                                    @endif
                                    @foreach ($blogCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" style="width: 0.1px" hidden></button>
                            </form>
                        </div>

                        <script>
                            const selectKabupaten = document.getElementById('kabupaten');
                            const selectCategory = document.getElementById('category');
                            const searchForm = document.getElementById('searchForm');

                            selectKabupaten.addEventListener('change', function() {
                                searchForm.submit();
                            });
                            selectCategory.addEventListener('change', function() {
                                searchForm.submit();
                            });
                        </script>
                    </div>

                    <div class="alldata">
                        @foreach ($blogs as $blog)
                            <div class="d-md-flex post-entry-2 half ">
                                <a href="{{ Route('blogs.show', $blog->slug) }}" class="me-4 thumbnail zoom-image">
                                    <img src="{{ Storage::url(optional($blog->galleries->random())->images) }}"
                                        alt="" class="img-fluid">
                                </a>
                                <div>
                                    <div class="post-meta"><span class="date">
                                            @if ($blog->blogCategory)
                                                {{ $blog->blogCategory->name }}
                                            @endif
                                        </span> <span class="mx-1">•</span>
                                        <span>{{ $blog->updated_at->format('F j, Y') }}</span>
                                    </div>
                                    <h3><a href="{{ Route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                    <p>{{ $blog->excerpt }}</p>
                                    <div class="d-flex align-items-center author">
                                        <div class="photo"><img
                                                src=" 
                                        @if ($blog->contributor) {{ Storage::url($blog->contributor->image) }}
                                        @else
                                        {{ asset('Template/dist/img/profile.jpeg') }} @endif
                                        "
                                                alt="" class="img-fluid">
                                        </div>
                                        <div class="name">
                                            <h3 class="m-0 p-0">
                                                @if ($blog->contributor)
                                                    {{ $blog->contributor->name }}
                                                @elseif($blog->contributor_id == null)
                                                    Admin
                                                @endif
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <nav class="mt-5" aria-label="Page navigation example" data-aos="fade-up" data-aos-delay="100">
                            <ul class="custom-pagination pagination">
                                @if ($blogs->onFirstPage())
                                    <li class="page-item disabled prev"><a class="page-link" href="#">Previous</a>
                                    </li>
                                    &nbsp;&nbsp;
                                @else
                                    <li class="page-item prev"><a class="page-link"
                                            href="{{ $blogs->previousPageUrl() }}">Previous</a></li>&nbsp;&nbsp;
                                @endif

                                @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                    <li class="{{ $i == $blogs->currentPage() ? 'active' : '' }} page-item"><a
                                            class="page-link" href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
                                    &nbsp;&nbsp;
                                @endfor

                                @if ($blogs->hasMorePages())
                                    <li class="page-item next"><a class="page-link"
                                            href="{{ $blogs->nextPageUrl() }}">Next</a>
                                    </li>&nbsp;&nbsp;
                                @else
                                    <li class="page-item disabled next"><a class="page-link" href="#">Next</a></li>
                                    &nbsp;&nbsp;
                                @endif
                            </ul>
                        </nav>
                    </div>

                    <div id="Content" class="searchdata">

                    </div>

                    <script>
                        $('#search').on('keyup', function() {
                            var searchValue = $(this).val();
                            var urlParams = new URLSearchParams(window.location.search);
                            var kabupatenId = urlParams.get('kabupaten');
                            var categoryId = urlParams.get('category');

                            // console.log(searchValue);

                            if (searchValue) {
                                $('.alldata').hide();
                                $('.searchdata').show();
                            } else {
                                $('.alldata').show();
                                $('.searchdata').hide();
                            }

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('searchBlog') }}',
                                data: {
                                    '_method': 'GET',
                                    'search': searchValue,
                                    'kabupaten': kabupatenId,
                                    'category': categoryId,

                                },
                                success: function(data) {
                                    console.log(data);
                                    $('#Content').html(data);
                                }
                            });
                        });
                    </script>

                </div>


                @include('front.blog.sidebar')
            </div>

        </div>
    </div>

    </div>
    </div>
    </div>
@endsection
