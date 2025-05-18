@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
<style type="text/css">
    /* Events Page */

        .square {
            background-color: #F7941D;
            width: 50px;
            height: 50px;
        }
        .container-about {

        }
        .container-event .image-layout {
            position: relative;
            z-index: 0;
            background-image: url({{asset('lp-img/event.jpg')}});
            background-position: center;
            background-size: cover;
            height: 100vh;
        }
        .container-event .image-layout .layout {
            position: absolute;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0.453);
            width: 100%;
            height: 100vh;
        }

        .container-event .image-layout .content {
            position: absolute;
            z-index: 2;
            color: white;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        
        .container-event .image-layout .content .head-events{
            font-size: 50px;
            padding-bottom: 30px;
        }

        .container-event .image-layout .content img {
            max-width: 500px;
        }
        .container-event .image-layout .content .event {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .container-event .header-sub-menu {
            padding: 30px 0px;
            display: flex;
            justify-content: center;
            color: white;
            background-color: black;
        }

        .in-event-page .tanggal {
            font-size: 14px;
            padding-bottom: 5px;
        }
        .in-event-page .label-event {
            font-size: 26px;
            font-weight: bold;
            padding-bottom: 20px;
        }
        .in-event-page .desc {
            font-size: 16px;
        }
    /* Close Events Page */
</style>

<!-- Events -->
    <div class="container-event">
        <div class="image-layout">
            <div class="layout"></div>
            <div class="content">
                <div class="head-events">Upcoming Events</div>
                <div class="event">
                    <a href="#">
                        <img src="{{asset('lp-img/banner-event-1.png')}}" alt="">
                    </a>
                    <span style="font-size: 11px;">CLICK TO JOIN THE EVENT</span>
                </div>
                <div class="event">
                    <a href="#">
                        <img src="{{asset('lp-img/banner-event-2.png')}}" alt="">
                    </a>
                    <span style="font-size: 11px;">CLICK TO JOIN THE EVENT</span>
                </div>
                <p>Komitmen Peruji terhadap pengembangan profesional diwujudkan melalui berbagai program pelatihan, seminar, dan workshop. Setiap event dirancang untuk memperkaya pengetahuan, memperkuat keterampilan, dan membangun komunitas Underwriter Jiwa yang kompeten dan terpercaya.</p>
            </div>
        </div>
        <div class="menu-event-page">
            <div class="header-sub-menu">
                <section class="square me-3"></section>
                <h1>Previous Events</h1>
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
<!-- Close Events -->
@endsection