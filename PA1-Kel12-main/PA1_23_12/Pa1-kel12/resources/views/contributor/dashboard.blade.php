@extends('contributor.master')

@section('title')
    Selamat Datang contributor
@endsection

@section('subtitle')
    Kumpulan data kontributor
@endsection

@section('content')
    {{-- custom --}}
    <div class="row ">

        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $sumKabupaten }}</h3>

                    <p>Jumlah Kabupaten</p>
                </div>
                <div class="icon">
                    <i class="ion ion-location"></i>
                </div>
                <a href="{{ Route('contributor.kabupaten.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>




        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $sumDestination }}</h3>

                    <p>Jumlah Destinasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-compass"></i>
                </div>
                <a href="{{ Route('contributor.destination.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $sumBlog }}</h3>

                    <p>Jumlah Blog</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ Route('contributor.blog.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3>{{ $sumRestaurant }}</h3>

                    <p>Jumlah Tempat Makan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{Route('contributor.restaurant.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3>{{ $sumAccommodation }}</h3>

                    <p>Jumlah akomodasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{Route('contributor.accommodation.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
