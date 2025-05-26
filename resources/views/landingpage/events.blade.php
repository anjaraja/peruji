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

@section('content')

    <div class="container-event section-container" id="container-event">
        <div class="image-layout">
            <div class="layout"></div>
            <div class="content">
                <div class="head-events" id="upcoming">Upcoming Events</div>
                @foreach ( array_reverse($events) as $value )
                    <div class="event">
                        <a href="{{ route('events-detail', ['events' => $value['id']]) }}" data-url="{{ route('events-detail', ['events' => $value['id']]) }}"
                        data-target="content-area" class="load-content">
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
                        <img src="{{asset('lp-img/6af9783141642392a944c2097831a7440a9103bb.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
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
                        <img src="{{asset('lp-img/36926fd614a9c19a5e18673b1c73d4c81ea5c56b (1).png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-0">
                        <img src="{{asset('lp-img/36926fd614a9c19a5e18673b1c73d4c81ea5c56b (1).png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
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
                        <img src="{{asset('lp-img/b4106306a8bc8b8594bb37adea23ab57de4632a1.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-0">
                        <img src="{{asset('lp-img/b4106306a8bc8b8594bb37adea23ab57de4632a1.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
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
                        <img src="{{asset('lp-img/c7e75c0accc10e93ee0f20f3c60ab4f1d134cebb.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 p-0">
                        <img src="{{asset('lp-img/c7e75c0accc10e93ee0f20f3c60ab4f1d134cebb.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;">
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

    <div id="content-area" class="section-container" style="display: none;">
        
    </div>
    <div id="register-area" class="section-container" style="display: none;">
        
    </div>


@endsection