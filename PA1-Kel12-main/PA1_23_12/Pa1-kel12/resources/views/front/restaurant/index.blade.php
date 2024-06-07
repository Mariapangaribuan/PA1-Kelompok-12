@extends('front.pages.post')

@section('title')
    Tempat Makan
@endsection

@section('description')
    Kumpulan tempat makan
@endsection


@section('content')
    <div class="section">
        <div class="container">

            <div class="search col-sm-8 mb-5 d-flex glass">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa fa-search fa-2x"></i>
                    </span>
                    <div class="input-group-append" for="search">

                    </div>
                    <input type="search" name="search" id="search" class="form-control"
                        placeholder="Cari tempat makan.." style="border: none;">
                </div>
                
                <div class="input-group ml-2">
                    <form id="searchForm" action="{{ route('restaurants.index') }}" method="GET">
                        <select name="kabupaten" id="kabupaten" class="custom-select" style="border: none;">
                            @if ($selectedKabupaten)
                                @php
                                    $kabupaten = \App\Models\Kabupaten::find($selectedKabupaten);
                                @endphp
                                <option value="{{ $kabupaten->id }}" class="text-center" selected>{{ $kabupaten->name }}</option>
 
                            @else
                                <option value="" class="text-center" selected>Mau Kemana?</option>
                            @endif
                                
                            @foreach ($kabupatens as $kabupaten)
                                <option value="{{ $kabupaten->id }}"class="text-center">{{ $kabupaten->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" style="display: none;" hidden></button>
                    </form>
                </div>

            </div>
    
            <script>
                const selectKabupaten = document.getElementById('kabupaten');
                const searchForm = document.getElementById('searchForm');
            
                selectKabupaten.addEventListener('change', function() {
                    searchForm.submit();
                });
            </script>

            @if ($selectedKabupaten)
                @php
                    $kabupaten = \App\Models\Kabupaten::find($selectedKabupaten);
                @endphp

                <h3 class="category-title mb-5">Kabupaten: {{ $kabupaten->name }}</h3>
            @endif




            <!-- ================================================ Card Tempat Makan =====================================================-->
            <div class="row align-items-stretch alldata">
                @foreach ($restaurants as $restaurant)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="media-entry">
                            <a href="{{ Route('restaurants.show', $restaurant->slug) }}" class="zoom-image">
                                @if ($restaurant->galleries->where('category', 'place')->count() > 0)
                                    <img src="{{ Storage::url(optional($restaurant->galleries->where('category', 'place')->first())->images) }}"
                                        alt="Restaurant Image" class="img-fluid gambar">
                                @endif

                            </a>
                            <div class="bg-white m-body">
                                <span class="date">{{ $restaurant->created_at->format('F j, Y') }}</span>&mdash;
                                <span class="date">{{ $restaurant->location }}</span>
                                <h3><a href="{{ Route('restaurants.show', $restaurant->slug) }}">{{ $restaurant->name }}</a>
                                </h3>
                                <p>{{ Str::limit(strip_tags($restaurant->description), 100) }}</p>

                                <a href="{{ Route('restaurants.show', $restaurant->slug) }}"
                                    class="more d-flex align-items-center float-start">
                                    <span class="label">Baca selengkapnya..</span>
                                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- ================================================ Card Tempat Makan =====================================================-->
                <nav class="mt-5" aria-label="Page navigation example" data-aos="fade-up" data-aos-delay="100">
                    <ul class="custom-pagination pagination">
                        @if ($restaurants->onFirstPage())
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $restaurants->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $restaurants->lastPage(); $i++)
                            <li class="{{ $i == $restaurants->currentPage() ? 'active' : '' }}"><a class="page-link"
                                    href="{{ $restaurants->url($i) }}">{{ $i }}</a></li>
                        @endfor

                        @if ($restaurants->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $restaurants->nextPageUrl() }}">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                        @endif
                    </ul>
                </nav>
            </div>

            <div id="Content" class="row align-items-stretch searchdata">

            </div>

            <!--============================================= Paginate ===================================================-->

            <script>
                $('#search').on('keyup', function() {
                    $value = $(this).val();
                    // Mengambil nilai parameter kabupaten dari URL
                    var urlParams = new URLSearchParams(window.location.search);
                    var kabupatenId = urlParams.get('kabupaten');

                    console.log(kabupatenId);

                    if ($value) {
                        $('.alldata').hide();
                        $('.searchdata').show();
                    } else {
                        $('.alldata').show();
                        $('.searchdata').hide();
                    }

                    $.ajax({

                        type: 'POST',
                        url: '{{ route('searchRest') }}',
                        data: {
                            '_method': 'GET', // Menyertakan _method sebagai 'GET'
                            'search': $value,
                            'kabupaten': kabupatenId
                        },

                        success: function(data) {
                            console.log(data);
                            if (data.trim() == '') {
                                // Tampilkan pesan jika tidak ada data yang cocok dengan pencarian
                                $('#Content').html('<div class="col-12">Tempat Makan tidak ditemukan.</div>');
                            } else {
                                $('#Content').html(data);
                            }
                        }
                    });
                });
            </script>

        </div>
    </div>
@endsection
