@extends('landingpage.app')

@section('title', 'PERUJI')

@php
    $durationPerBanner = 5;
    $totalDuration = count($events) * $durationPerBanner;
@endphp

<style>
    :root {
        --banner-animation-duration: {{ $totalDuration }}s;
    }
</style>

@section('content')
    <div class="container-home position-relative z-0">
        <div id="carouselHome" class="carousel slide h-100" data-bs-ride="carousel"  data-bs-pause="false" data-bs-interval="4000">
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100" style="background-image: url({{asset('lp-img/Foto-Home-1.jpg')}});background-position: top;background-size: cover;">
                    {{-- <a href="#"></a> --}}
                    <div class="carousel-text">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 1366 768" style="enable-background:new 0 0 1366 768;" xml:space="preserve">
                            <style type="text/css">
                                .st0{fill:#f3f3f3; }
                                .st1{font-family:'Helveticasss';font-weight: 100;}
                                .st2{font-size:69px;}
                                .st3{fill: #f3f3f3;font-family:'Helveticass';font-weight: bolder}
                            </style>
                            <text transform="matrix(1 0 0 1 78.1001 333.9651)"><tspan x="0" y="0" class="st0 st1 st2">Empowering</tspan><tspan x="0" y="68" class="st1 st3 st2">Life Underwriters</tspan><tspan x="0" y="135" class="st0 st1 st2">to Safeguards the Future</tspan></text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-banner d-flex align-items-center flex-column position-absolute start-50 translate-middle z-2">
            <a href="{{route('events')}}" class="text-decoration-none">
                @if(!empty($events))
                    @if (count($events) > 1)
                        @foreach($events as $key => $value)
                            <img class="banner-image @php $key==0?'active':'' @endphp" style="animation-delay: {{ $key * $durationPerBanner }}s" src="{{asset($value['banner'])}}" alt="">
                        @endforeach    
                    @else
                        <img class="banner-image-solos" src="{{asset($events[0]['banner'])}}" alt="">
                    @endif
                    <span class="text-white" style="font-size: 10px;">CLICK TO FIND OUT MORE</span>
                @endif
            </a>
        </div>
    </div>
@endsection