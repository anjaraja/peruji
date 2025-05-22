@extends('landingpage.app')

@section('title', 'PERUJI')
<style>
    .in-event-page {
        padding: 0;
        margin: 0;
    }
</style>
@section('content')
    <div class="container-event">
        <div class="image-layout">
            <div class="layout"></div>
            <div class="content">
                <div class="head-events" id="upcoming">Upcoming Events</div>
                @foreach ( $events as $value )
                    <div class="event">
                        <a href="{{route('events-detail', ['events' => $value['id']])}}">
                            <img src="{{asset($value['banner'])}}" alt="">
                        </a>
                        <span style="font-size: 11px;">CLICK TO JOIN THE EVENT</span>
                    </div>
                @endforeach
                <p>Komitmen Peruji terhadap pengembangan profesional diwujudkan melalui berbagai program pelatihan, seminar, dan workshop. Setiap event dirancang untuk memperkaya pengetahuan, memperkuat keterampilan, dan membangun komunitas Underwriter Jiwa yang kompeten dan terpercaya.</p>
            </div>
        </div>
        <div class="container-fluid p-0 menu-event-page" id="previous-event">
            <div class="header-sub-menu d-flex align-items-center">
                <section class="square me-3"></section>
                <div class="label">Previous Event</div>
            </div>
            <div class="in-event-page">
                <div class="row">
                    <div class="col-12 col-md-6 p-0">
                        <img src="{{asset('lp-img/4456feb22d1c5c1e7da66fe9403ca57335cf7040.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
                    </div>
                    <div class="col-12 col-md-6 p-4">
                        <div class="tanggal">14-15 August 2024</div>
                        <div class="label-event">Indonesia Underwriting Summit 2024 (IUS 2024)</div>
                        <div class="desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores labore nemo fugiat consequatur repellat rem reiciendis quisquam ad iure officiis laborum dolorum voluptatum, sit totam! Error libero voluptatibus facere ab.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-4 order-last order-md-first">
                        <div class="tanggal">14-15 August 2024</div>
                        <div class="label-event">Indonesia Underwriting Summit 2024 (IUS 2024)</div>
                        <div class="desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores labore nemo fugiat consequatur repellat rem reiciendis quisquam ad iure officiis laborum dolorum voluptatum, sit totam! Error libero voluptatibus facere ab.</div>
                    </div>
                    <div class="col-12 col-md-6 p-0 order-first order-md-last">
                        <img src="{{asset('lp-img/4456feb22d1c5c1e7da66fe9403ca57335cf7040.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-0">
                        <img src="{{asset('lp-img/4456feb22d1c5c1e7da66fe9403ca57335cf7040.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
                    </div>
                    <div class="col-12 col-md-6 p-4">
                        <div class="tanggal">14-15 August 2024</div>
                        <div class="label-event">Indonesia Underwriting Summit 2024 (IUS 2024)</div>
                        <div class="desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores labore nemo fugiat consequatur repellat rem reiciendis quisquam ad iure officiis laborum dolorum voluptatum, sit totam! Error libero voluptatibus facere ab.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-4 order-last order-md-first">
                        <div class="tanggal">14-15 August 2024</div>
                        <div class="label-event">Indonesia Underwriting Summit 2024 (IUS 2024)</div>
                        <div class="desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores labore nemo fugiat consequatur repellat rem reiciendis quisquam ad iure officiis laborum dolorum voluptatum, sit totam! Error libero voluptatibus facere ab.</div>
                    </div>
                    <div class="col-12 col-md-6 p-0 order-first order-md-last">
                        <img src="{{asset('lp-img/4456feb22d1c5c1e7da66fe9403ca57335cf7040.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-0">
                        <img src="{{asset('lp-img/4456feb22d1c5c1e7da66fe9403ca57335cf7040.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
                    </div>
                    <div class="col-12 col-md-6 p-4">
                        <div class="tanggal">14-15 August 2024</div>
                        <div class="label-event">Indonesia Underwriting Summit 2024 (IUS 2024)</div>
                        <div class="desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores labore nemo fugiat consequatur repellat rem reiciendis quisquam ad iure officiis laborum dolorum voluptatum, sit totam! Error libero voluptatibus facere ab.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-4 order-last order-md-first">
                        <div class="tanggal">14-15 August 2024</div>
                        <div class="label-event">Indonesia Underwriting Summit 2024 (IUS 2024)</div>
                        <div class="desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores labore nemo fugiat consequatur repellat rem reiciendis quisquam ad iure officiis laborum dolorum voluptatum, sit totam! Error libero voluptatibus facere ab.</div>
                    </div>
                    <div class="col-12 col-md-6 p-0 order-first order-md-last">
                        <img src="{{asset('lp-img/4456feb22d1c5c1e7da66fe9403ca57335cf7040.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-0">
                        <img src="{{asset('lp-img/4456feb22d1c5c1e7da66fe9403ca57335cf7040.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
                    </div>
                    <div class="col-12 col-md-6 p-4">
                        <div class="tanggal">14-15 August 2024</div>
                        <div class="label-event">Indonesia Underwriting Summit 2024 (IUS 2024)</div>
                        <div class="desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores labore nemo fugiat consequatur repellat rem reiciendis quisquam ad iure officiis laborum dolorum voluptatum, sit totam! Error libero voluptatibus facere ab.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection