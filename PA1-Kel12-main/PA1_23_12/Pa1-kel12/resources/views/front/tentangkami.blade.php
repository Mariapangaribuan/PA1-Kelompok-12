@extends('front.pages.post')

@section('title')
    Tentang Kami
@endsection

@section('description')
    Kami berdedikasi untuk mempersembahkan informasi terbaik tentang destinasi wisata di sekitaran Danau toba. Dengan
    pengalaman dan pengetahuan yang luas, kami siap membantu Anda menemukan pengalaman liburan yang tak terlupakan. Dengan
    penuh semangat, kami terus mengeksplorasi tempat-tempat baru dan berbagi cerita-cerita inspiratif kepada Anda semua.
    Kami percaya bahwa perjalanan bukan hanya tentang tempat, tetapi tentang pengalaman dan kenangan yang membekas di hati.
    Kami berharap dapat menjadi teman setia Anda dalam menjelajahi dunia dan menciptakan momen yang tak terlupakan.
@endsection


@section('content')
    
{{-- section  --}}
@include('front.partials.section')
{{-- section  end --}}


{{-- services --}}
@include('front.partials.services')
{{-- services end --}}


<div class="section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto text-center">
                <div class="heading-content" data-aos="fade-up">
                    <h2 class="heading">Team Kami</h2>
                    <p>Kami berdedikasi untuk mempersembahkan informasi terbaik tentang destinasi wisata di sekitaran Danau toba.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <a href="#" class="person zoom-image">
                    <img src="{{ URL::asset('asset/Tentang Kami/kenan1.jpg') }}" alt="Image"
                        class="img-fluid mb-4 gambar2">
                    <span class="subheading d-inline-block">Project manager</span>
                    <h3 class="mb-3">Kenan Tomfie Bukit</h3>
                    {{-- <p class="text-muted">Jika terlalu menjaga image, hidupmu hanya sebatas jpeg.</p> --}}
                </a>
            </div>
            <div class="col-lg-3">
                <a href="#" class="person zoom-image">
                    <img src="{{ URL::asset('asset/Tentang Kami/sabet1.jpg') }}" alt="Image"
                        class="img-fluid mb-4 gambar2">
                    <span class="subheading d-inline-block">Data Analist</span>
                    <h3 class="mb-3">Elisabet Tambunan</h3>
                    {{-- <p class="text-muted">Saat semua pekerjaan terasa makin tidak menyenangkan, ingatlah cicilan.</p> --}}
                </a>
            </div>
            <div class="col-lg-3">
                <a href="#" class="person zoom-image">
                    <img src="{{ URL::asset('asset/Tentang Kami/nania1.jpg') }}" alt="Image"
                        class="img-fluid mb-4 gambar2">
                        <span class="subheading d-inline-block">Data Analist</span>
                    <h3 class="mb-3">Nania Pangaribuan</h3>
                    {{-- <p class="text-muted">Semua manusia sama di hadapan ikan</p> --}}
                </a>
            </div>
            <div class="col-lg-3">
                <a href="#" class="person zoom-image">
                    <img src="{{ URL::asset('asset/Tentang Kami/maria.jpg') }}" alt="Image"
                        class="img-fluid mb-4 gambar2">
                    <span class="subheading d-inline-block">Data Analist</span>
                    <h3 class="mb-3">Maria Pangaribuan</h3>
                    {{-- <p class="text-muted">Aku bukan pemalas. Aku sedang menjalankan mode hemat energi</p> --}}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
