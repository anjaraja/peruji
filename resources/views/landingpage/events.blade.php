@extends('landingpage.app')

@section('title', 'PERUJI')
<style>
    .in-event-page {
        padding: 0;
        margin: 0;
    }
    #container-event {
        display: block;
    }
    #content-area, #register-area,  {
        display: none;
    }
</style>
<style>
.fade-out {
    opacity: 0;
    transition: opacity 0.5s ease-out;
}

.fade-in {
    opacity: 0;
    display: block;
    animation: fadeIn 0.5s forwards;
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}
</style>
<link rel="stylesheet" href="{{ asset('lp-css/events.css') }}">
@section('content')
    <div class="container-event section-container" id="container-event">
        <div class="image-layout">
            <div class="layout"></div>
            <div class="content">
                <div class="head-events" id="upcoming">Upcoming Events</div>
                <div class="d-flex justify-content-center align-items-center flex-column" style="height:65%;">
                    @foreach ( $upcoming_events as $value )
                        <div class="event">
                            <a href="{{ route('events-detail', ['events' => $value['id']]) }}" data-url="{{ route('events-detail', ['events' => $value['id']]) }}"
                            data-target="content-area" class="load-content">
                                <img class="" src="{{asset($value['banner'])}}" alt="">
                            </a>
                            <span style="font-size: 11px;">CLICK TO JOIN THE EVENT</span>
                        </div>
                    @endforeach
                </div>
                <div class="desc-upcoming-event">
                    <p>PERUJI’s commitment to professional development is reflected through a range of training programs, seminars, and workshops. Each event is designed to enrich knowledge, strengthen skills, and foster a competent and trusted community of life underwriters.</p>
                </div>
                <!-- <p>Komitmen Peruji terhadap pengembangan profesional diwujudkan melalui berbagai program pelatihan, seminar, dan workshop. Setiap event dirancang untuk memperkaya pengetahuan, memperkuat keterampilan, dan membangun komunitas Underwriter Jiwa yang kompeten dan terpercaya.</p> -->
            </div>
        </div>
        <div class="container-fluid p-0 menu-event-page" id="previous-event">
            <div class="header-sub-menu d-flex align-items-center">
                <section class="square me-3"></section>
                <div class="label">Previous Event</div>
            </div>
            <div class="in-event-page">
                @foreach ($previous_events as $key => $value)
                    @if($key % 2 === 0)
                        <div class="row">
                            <div class="col-12 col-md-6 p-0">
                                <img src="{{$value['thumbnail']?asset($value['thumbnail']):asset('lp-img/default-img-thumbnail-event.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;min-height: 467.762px;background-color: #E5E5E5;">
                            </div>
                            <div class="col-12 col-md-6 p-4">
                                <div class="d-flex flex-column" style="width:100%;height: 100%;">
                                    <div class="tanggal ">{{$value['eng_display_detail_date']}}</div>
                                    <div class="label-event">{{$value['eventname']}}</div>
                                    <div class="pb-2 desc">{{$value['description']}}</div>
                                    <div class="d-flex h-100 align-items-end">
                                        <i class="news-link justify-self-start">News Links</i>
                                        <i class="gallery-link ml-auto">Photo Gallery</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12 col-md-6 p-4">
                                <div class="d-flex flex-column" style="width:100%;height: 100%;">
                                    <div class="tanggal ">{{$value['eng_display_detail_date']}}</div>
                                    <div class="label-event">{{$value['eventname']}}</div>
                                    <div class="pb-2 desc">{{$value['description']}}</div>
                                    <div class="d-flex h-100 align-items-end">
                                        <i class="news-link justify-self-start">News Links</i>
                                        <i class="gallery-link ml-auto">Photo Gallery</i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 p-0">
                                <img src="{{$value['thumbnail']?asset($value['thumbnail']):asset('lp-img/default-img-thumbnail-event.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;min-height: 467.762px;background-color: #E5E5E5;">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div id="content-area" class="section-container" style="display: none;">
        
    </div>
    <div id="register-area" class="section-container" style="display: none;">
        
    </div>


@endsection