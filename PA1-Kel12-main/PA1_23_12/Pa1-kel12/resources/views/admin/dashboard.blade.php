@extends('admin.master')

@section('title')
    Selamat Datang {{ Auth::guard('admin')->user()->name }}
@endsection

@section('subtitle')
    Kumpulan Data
@endsection

@section('content')
    {{-- custom --}}
    <div class="row mt-3">

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $sumKabupaten }}</h3>

                    <p>Jumlah Kabupaten</p>
                </div>
                <div class="icon">
                    <i class="ion ion-location"></i>
                </div>
                <a href="{{ Route('admin.kabupaten.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #3c8dbc">
                <div class="inner">
                    <h3>{{ $sumDestinationCategory }}</h3>
                    <p>Kategori Destinasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ Route('admin.destinationCategory.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $sumBlogCategory }}</h3>

                    <p>Kategori Blog</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ Route('admin.blogCategory.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>



        <!-- ./col -->
        
        
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $sumAccommodation}}</h3>

                    <p>Jumlah Akomodasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ Route('admin.accommodation.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-lime">
                <div class="inner">
                    <h3>{{ $sumContributor}}</h3>

                    <p>Jumlah Kontributor</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ Route('admin.contributors') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $sumDestination }}</h3>

                    <p>Jumlah Destinasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-compass"></i>
                </div>
                <a href="{{ Route('admin.destination.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        

        

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>{{ $sumBlog }}</h3>

                    <p>Jumlah Blog</p>
                </div>
                <div class="icon">
                    <i class="ion ion-newspaper"></i>
                </div>
                <a href="{{ Route('admin.blog.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3>{{ $sumRestaurant }}</h3>

                    <p>Jumlah Tempat Makan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{Route('admin.restaurant.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
