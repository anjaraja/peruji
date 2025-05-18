@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
    <div class="container-home position-relative z-0">
        <div id="carouselHome" class="carousel slide h-100" data-bs-ride="carousel"  data-bs-pause="false" data-bs-interval="3000">
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100" style="background-image: url({{asset('lp-img/Foto-Home-1.jpg')}});background-position: center;background-size: cover;">
                    {{-- <a href="#"></a> --}}
                    <div class="carousel-text" style="position: absolute;top:0%;left:5%;z-index:2;">
                        <object data="{{asset('lp-svg/Copy Home-1.svg')}}" type="image/svg+xml" width="1050"></object>
                    </div>
                </div>
                <div class="carousel-item h-100"style="background-image: url({{asset('lp-img/Foto-Home-2.jpg')}});background-position: center;background-size: cover;">
                    {{-- <a href="#"></a> --}}
                    <div class="carousel-text" style="position: absolute;top:0%;left:5%;z-index:2;">
                        <object data="{{asset('lp-svg/Copy Home-2.svg')}}" type="image/svg+xml" width="1050"></object>
                    </div>
                </div>
                <div class="carousel-item h-100"style="background-image: url({{asset('lp-img/Foto-Home-3.jpg')}});background-position: center;background-size: cover;">
                    {{-- <a href="#"></a> --}}
                    <div class="carousel-text" style="position: absolute;top:0%;left:5%;z-index:2;">
                        <object data="{{asset('lp-svg/Copy Home-3.svg')}}" type="image/svg+xml" width="1050"></object>
                    </div>
                </div>
                <div class="carousel-item h-100"style="background-image: url({{asset('lp-img/Foto-Home-4.jpg')}});background-position: center;background-size: cover;">
                    {{-- <a href="#"></a> --}}
                    <div class="carousel-text" style="position: absolute;top:0%;left:5%;z-index:2;">
                        <object data="{{asset('lp-svg/Copy Home-4.svg')}}" type="image/svg+xml" width="1050"></object>
                    </div>
                </div>
                <div class="carousel-item h-100"style="background-image: url({{asset('lp-img/Foto-Home-5.jpg')}});background-position: center;background-size: cover;">
                    {{-- <a href="#"></a> --}}
                    <div class="carousel-text" style="position: absolute;top:0%;left:5%;z-index:2;">
                        <object data="{{asset('lp-svg/Copy Home-5.svg')}}" type="image/svg+xml" width="1050"></object>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-banner d-flex align-items-center flex-column position-absolute bottom-0 start-50 translate-middle z-2">
            <a href="#">
                <img src="{{asset('lp-img/banner-event-1.png')}}"  alt="">
            </a>
            <span class="text-white" style="font-size: 10px;">CLICK TO JOIN THE EVENT</span>
        </div>
    </div>
@endsection