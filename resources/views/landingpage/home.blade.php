@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
    <div class="container-home position-relative z-0">
        <div id="carouselHome" class="carousel slide h-100" data-bs-ride="carousel">
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100" style="background-image: url({{asset('lp-img/b3e6ca7f567ed2a05fd39a6bab34170d509e686d.png')}});background-position: center;background-size: cover;">
                    <a href="#"></a>
                </div>
                <div class="carousel-item h-100"style="background-image: url({{asset('lp-img/90162d16ee45de054cc9b40f3699fe8d7e858829.png')}});background-position: center;background-size: cover;">
                    <a href="#"></a>
                </div>
                <div class="carousel-item h-100"style="background-image: url({{asset('lp-img/jeremy-liem-nXUT5sYIA30-unsplash.jpg')}});background-position: center;background-size: cover;">
                    <a href="#"></a>
                </div>
                <div class="carousel-item h-100"style="background-image: url({{asset('lp-img/dfd691ac6553910a54b27d3d50a1f94e3fc061c8.png')}});background-position: center;background-size: cover;">
                    <a href="#"></a>
                </div>
                <div class="carousel-item h-100"style="background-image: url({{asset('lp-img/f91a0551e22baee429dc434e1dbae780b78352d6.png')}});background-position: center;background-size: cover;">
                    <a href="#"></a>
                </div>
            </div>
        </div>
        <div class="home-banner d-flex align-items-center flex-column position-absolute bottom-0 start-50 translate-middle">
            <a href="#">
                <img src="asset/img/banner-event-1.png"  alt="">
            </a>
            <span class="text-white" style="font-size: 10px;">CLICK TO JOIN THE EVENT</span>
        </div>
    </div>
@endsection