<div class="col-md-3">
    <!-- ======= Sidebar ======= -->
    <div class="aside-block">

        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular"
                    aria-selected="true">Populer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending"
                    type="button" role="tab" aria-controls="pills-trending" aria-selected="false"
                    tabindex="-1">Terbaru</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest"
                    type="button" role="tab" aria-controls="pills-latest" aria-selected="false"
                    tabindex="-1">Wisata</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            <!-- Popular -->
            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel"
                aria-labelledby="pills-popular-tab">
                @php $count = 0 @endphp
                <!-- Looping untuk menampilkan 6 blog di sidebar-->
                @foreach ($popularBlogs as $popularBlog)
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta">
                            <span class="date">{{ $popularBlog->blogCategory->name }}</span>
                            <span class="mx-1">•</span>
                            <span>{{ $popularBlog->created_at->format('F j, Y') }}</span>
                        </div>
                        <h2 class="mb-2">
                            <a href="{{ Route('blogs.show', $popularBlog->slug) }}">{{ $popularBlog->title }}</a>
                        </h2>
                        <span class="author mb-3 d-block">
                            @if ($popularBlog->contributor)
                                {{ $popularBlog->contributor->name }}
                            @elseif($popularBlog->contributor_id == null)
                                Admin
                            @endif
                        </span>
                    </div>
                    @php $count++ @endphp
                    @if ($count == 6)
                    @break
                @endif
            @endforeach
        </div>

        <!-- End Popular -->

        <!-- Terbaru -->
        <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
            @php $count = 0 @endphp
            @foreach ($latestBlogs as $latestBlog)
                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">{{ $latestBlog->blogCategory->name }}</span> <span
                            class="mx-1">•</span> <span>{{ $latestBlog->created_at->format('F j, Y') }}</span>
                    </div>
                    <h2 class="mb-2"><a href="#">{{ $latestBlog->title }}</a></h2>
                    <span class="author mb-3 d-block">
                        @if ($latestBlog->contributor)
                            {{ $latestBlog->contributor->name }}
                        @elseif($latestBlog->contributor_id == null)
                            Admin
                        @endif
                    </span>
                </div>
                @php $count++ @endphp
                @if ($count == 6)
                @break
            @endif
            @endforeach

        </div>
        <!-- End Terbaru -->

        <!-- Latest -->
        <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
            @php $count = 0 @endphp
            @foreach ($destinations as $destination)
                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">{{ $destination->destinationCategory->name }}</span>
                        <span class="mx-1">•</span>
                        <span>{{ $destination->created_at->format('F j, Y') }}</span>
                    </div>
                    <h2 class="mb-2"><a href="#">{{ $destination->name }}</a></h2>
                    <span class="author mb-3 d-block">
                        @if ($latestBlog->contributor)
                            {{ $latestBlog->contributor->name }}
                        @elseif($latestBlog->contributor_id == null)
                            Admin
                        @endif
                    </span>
                </div>
                @php $count++ @endphp
                @if ($count == 6)
                @break
            @endif
            @endforeach

        </div> <!-- End Latest -->

    </div>
</div>


<div class="aside-block">
    <h3 class="aside-title">Blog Kategori</h3>
    <ul class="aside-links list-unstyled">
        <li><a href="{{ route('blogs.index') }}">Semua Kategori</a></li>
        @foreach ($blogCategories as $blogCategory)
            <li><a
                    href="{{ route('blogs.index', ['category' => $blogCategory->id]) }}">{{ $blogCategory->name }}</a>
            </li>
        @endforeach
    </ul>
</div>

</div>
