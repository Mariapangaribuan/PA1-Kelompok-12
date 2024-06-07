@extends('front.pages.post')

@section('title')
    Akomodasi
@endsection

@section('description')
    Berisi mengenai akomodasi sekitaran danau toba
@endsection

@push('style')
<link rel="stylesheet" href="{{ URL::asset('frontend/css/main.css') }}">
<link rel="stylesheet" href="{{ URL::asset('frontend/css/variables.css') }}">
@endpush

@section('content')
<section id="search-result" class="search-result">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="category-title">Akomodasi</h3>
      
          <div class="row">
              @foreach ($accommodations as $accommodation)
                  <div class="col-sm-6 mb-4">
                      <div class="d-flex post-entry-2 small-img">
                          <a href="{{Route('accommodations.show', $accommodation->slug)}}" class="me-4 thumbnail zoom-image">
                              <img src="{{ Storage::url(optional($accommodation->galleries->random())->images) }}" alt="" class="img-fluid gambar2">
                          </a>
                          <div>
                              <div class="post-meta"><span class="date">{{$accommodation->category}}</span> <span class="mx-1">&bullet;</span> <span>{{ $accommodation->created_at->format('F j, Y') }}</span></div>
                              <h3><a href="{{Route('accommodations.show', $accommodation->slug)}}">{{$accommodation->name}}</a></h3>
                              <p>{{$accommodation->name}}</p>
                              <div class="d-flex align-items-center author">
                                  <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid"></div>
                                  <div class="name">
                                      <h3 class="m-0 p-0">@if ($accommodation->contributor)
                                          {{ $accommodation->contributor->name }}
                                      @elseif($accommodation->contributor_id == null)
                                          Admin
                                      @endif</h3>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
      

        <nav class="mt-5" aria-label="Page navigation example" data-aos="fade-up" data-aos-delay="100">
          <ul class="custom-pagination pagination">
              @if ($accommodations->onFirstPage())
                  <li class="page-item disabled prev"><a class="page-link" href="#">Previous</a></li>
                  &nbsp;&nbsp;
              @else
                  <li class="page-item prev"><a class="page-link"
                          href="{{ $accommodations->previousPageUrl() }}">Previous</a></li>&nbsp;&nbsp;
              @endif

              @for ($i = 1; $i <= $accommodations->lastPage(); $i++)
                  <li class="{{ $i == $accommodations->currentPage() ? 'active' : '' }} page-item"><a
                          class="page-link" href="{{ $accommodations->url($i) }}">{{ $i }}</a></li>
                  &nbsp;&nbsp;
              @endfor

              @if ($accommodations->hasMorePages())
                  <li class="page-item next"><a class="page-link" href="{{ $accommodations->nextPageUrl() }}">Next</a>
                  </li>&nbsp;&nbsp;
              @else
                  <li class="page-item disabled next"><a class="page-link" href="#">Next</a></li>
                  &nbsp;&nbsp;
              @endif
          </ul>
      </nav><!-- End Paging -->

       

      </div>
    </div>
  </section> <!-- End Search Result -->
@endsection