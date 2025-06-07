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
<link rel="stylesheet" href="{{ asset('lp-css/events_2.css') }}">
@section('content')
    <div class="container-event section-container" id="container-event">
        <div class="image-layout">
            <div class="layout"></div>
            <div class="content">
                <div class="head-events" id="upcoming">Upcoming Events</div>
                <div class="d-flex justify-content-center align-items-center flex-column event-list">
                    @foreach ( $upcoming_events as $value )
                        <div class="event flex-row">
                            <div class="d-flex h-100 justify-content-start for-desktop" style="width:4.5rem;">
                                <span class="detail-event align-self-end pl-1" style="font-size: 14px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                    </svg>
                                    DETAIL
                                </span>
                            </div>
                            <a href="#" data-url="{{ route('events-detail', ['events' => $value['id']]) }}"
                            data-target="content-area">
                                <img class="" src="{{asset($value['banner'])}}" alt="">
                            </a>
                            <div class="d-flex h-100 for-mobile" style="width:6rem;">
                                <span class="detail-event pl-1" style="font-size: 14px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                    </svg>
                                    DETAIL
                                </span>
                                <a href="{{route('eventsRegis', ['events' => $value['id']])}}" class="register-event text-decoration-none text-white pl-1" style="font-size: 14px;width: max-content;">
                                    REGISTER
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="d-flex h-100 justify-content-end for-desktop" style="width:6rem;">
                                <a href="{{route('eventsRegis', ['events' => $value['id']])}}" class="register-event text-decoration-none text-white align-self-end pl-1" style="font-size: 14px;width: max-content;">
                                    REGISTER
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="event-detail-container">
                                <div class="container-fluid event-s">
                                    <div class="container position-relative">
                                        <div class="d-flex w-100 pt-2 justify-content-center flex-column content-event">
                                            <div>
                                                <img class="" src="{{asset($value['banner'])}}" style="max-width: 720px;" alt="">
                                            </div>
                                            <div class="label-event">{{$value['eventname']}}</div>
                                            <div class="date-event">{{$value['eng_display_detail_date']}}</div>
                                            <div class="d-flex w-100 justify-content-center">
                                                <div class="desc-event">{{$value['eng_description']}}</div>
                                            </div>
                                            <div class="d-flex w-100 justify-content-center">
                                                <div class="d-flex bottom-container" style="width:650px;">
                                                    <div class="d-flex justify-content-center align-items-center w-100 pt-2">
                                                        <div class="d-flex justify-content-start w-25">
                                                            <a href="{{route('eventsRegis', ['events' => $value['id']])}}"
                                                                class="btn text-white"
                                                                data-url="{{route('eventsRegis', ['events' => $value['id']])}}"
                                                                data-target="register-area"
                                                                style="background-color: #f58529; border-radius:20px;"
                                                                >
                                                                REGISTER
                                                            </a>
                                                        </div>
                                                        <div class="d-flex justify-content-center w-50">
                                                            <a class="text-black" href="{{asset($value['agenda'])}}" target="_blank">
                                                                <svg width="48" height="60" viewBox="0 0 48 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5.32521 1.19269C9.82521 1.19269 30.9752 1.19269 30.9752 1.19269L46.8677 17.0852C46.8677 17.0852 46.8677 48.7577 46.8677 53.3177C46.8677 57.8777 44.9927 58.8227 41.3627 58.8227C37.7327 58.8227 9.66772 58.8227 5.85772 58.8227C2.04772 58.8227 0.907715 56.7677 0.907715 53.0177C0.907715 49.2677 0.907715 8.69269 0.907715 4.86769C0.907715 1.04269 5.32521 1.19269 5.32521 1.19269Z" fill="white"/>
                                                                    <path d="M38.505 39.1425C37.7775 39.36 36.6975 39.3825 35.55 39.2175C34.3125 39.0375 33.0525 38.6625 31.815 38.1075C34.02 37.785 35.7375 37.8825 37.2 38.4075C37.545 38.5275 38.115 38.85 38.505 39.1425ZM26.1825 37.1175C26.0925 37.14 26.0025 37.1625 25.9125 37.1925C25.32 37.3575 24.7425 37.515 24.18 37.65L23.43 37.8375C21.9225 38.22 20.3775 38.61 18.8475 39.075C19.425 37.68 19.965 36.2625 20.4975 34.8825C20.8875 33.8625 21.285 32.8125 21.6975 31.785C21.9075 32.13 22.125 32.475 22.35 32.82C23.3925 34.4025 24.69 35.8575 26.1825 37.1175ZM22.3425 21.3525C22.44 23.0775 22.065 24.735 21.525 26.3325C20.85 24.36 20.5425 22.1925 21.3825 20.43C21.6 19.98 21.7725 19.74 21.8925 19.6125C22.0575 19.8825 22.29 20.4975 22.3425 21.3525ZM14.4525 43.2075C14.0775 43.8825 13.6875 44.52 13.29 45.1125C12.3375 46.5525 10.7775 48.09 9.975 48.09C9.8925 48.09 9.8025 48.075 9.66 47.9325C9.57 47.835 9.555 47.7675 9.5625 47.6775C9.5925 47.1525 10.29 46.2075 11.3025 45.3375C12.225 44.5425 13.2675 43.8375 14.4525 43.2075ZM41.055 39.2175C40.935 37.455 37.965 36.3225 37.935 36.315C36.7875 35.91 35.5425 35.7075 34.125 35.7075C32.61 35.7075 30.975 35.925 28.8825 36.42C27.015 35.1 25.4025 33.4425 24.2025 31.605C23.67 30.795 23.19 29.985 22.7775 29.1975C23.7975 26.7675 24.7125 24.15 24.5475 21.2175C24.4125 18.87 23.355 17.2875 21.915 17.2875C20.925 17.2875 20.0775 18.0225 19.38 19.4625C18.1425 22.035 18.4725 25.335 20.3475 29.265C19.6725 30.8475 19.0425 32.49 18.4425 34.0875C17.685 36.0675 16.9125 38.1075 16.035 40.05C13.575 41.025 11.5575 42.2025 9.87 43.65C8.7675 44.595 7.44 46.0425 7.365 47.5575C7.3275 48.27 7.575 48.9225 8.07 49.4475C8.595 50.0025 9.2625 50.295 9.99 50.295C12.3975 50.295 14.7075 46.9875 15.15 46.3275C16.035 44.9925 16.86 43.5075 17.67 41.7975C19.71 41.0625 21.885 40.5075 23.9925 39.975L24.75 39.78C25.32 39.6375 25.905 39.4725 26.5125 39.3075C27.15 39.135 27.81 38.955 28.4775 38.7825C30.645 40.1625 32.97 41.055 35.2425 41.385C37.155 41.6625 38.85 41.505 40.005 40.905C41.025 40.38 41.0775 39.555 41.055 39.2175ZM45.7125 54.3675C45.7125 57.5925 42.87 57.795 42.2925 57.795H5.6175C2.4 57.795 2.2125 54.93 2.205 54.3675V5.64C2.205 2.4075 5.055 2.2125 5.6175 2.2125H30.3975L30.4125 2.2275V11.895C30.4125 13.8375 31.5825 17.5125 36.03 17.5125H45.6375L45.72 17.595L45.7125 54.3675ZM43.4325 15.3H36.0225C32.8125 15.3 32.6175 12.45 32.61 11.8875V4.4325L43.4325 15.3ZM47.9175 54.3675V16.6725L32.6175 1.305V1.23H32.5425L31.3125 0H5.6175C3.675 0 0 1.1775 0 5.6325V54.36C0 56.31 1.1775 59.9925 5.6175 59.9925H42.3C44.2425 60 47.9175 58.8225 47.9175 54.3675Z" fill="#EB5757"/>
                                                                </svg>
                                                                <div class="info-event">Download Agenda</div>
                                                            </a>
                                                        </div>
                                                        <div class="d-flex justify-content-end w-25">
                                                            <button class="btn btn-link btn btn-link text-decoration-none text-black p-0 back-to-event"
                                                            >
                                                                BACK ->
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="desc-upcoming-event d-md-block d-none">
                    <p>PERUJI’s commitment to professional development is reflected through a range of training programs, seminars, and workshops. Each event is designed to enrich knowledge, strengthen skills, and foster a competent and trusted community of life underwriters.</p>
                </div>
                <!-- <p>Komitmen Peruji terhadap pengembangan profesional diwujudkan melalui berbagai program pelatihan, seminar, dan workshop. Setiap event dirancang untuk memperkaya pengetahuan, memperkuat keterampilan, dan membangun komunitas Underwriter Jiwa yang kompeten dan terpercaya.</p> -->
            </div>
        </div>
        <div class="container-fluid p-0 menu-event-page" id="previous-event">
            <div class="header-sub-menu d-flex align-items-center">
                <section class="square me-3"></section>
                <h1 class="label m-0 mt-1">Previous Event</h1>
            </div>
            <div class="in-event-page text-center text-md-start px-4 px-md-0">
                <div class="row d-md-none d-block">
                    <div class="col-12 p-0">
                        <div class="d-flex align-items-center text-center p-4">
                            <p>PERUJI’s commitment to professional development is reflected through a range of training programs, seminars, and workshops. Each event is designed to enrich knowledge, strengthen skills, and foster a competent and trusted community of life underwriters.</p>
                        </div>
                    </div>
                </div>
                @foreach ($previous_events as $key => $value)
                    @if($key % 2 === 0)
                        <div class="row" label="odd">
                            <div class="col-12 col-md-6 p-0 order-first order-md-first">
                                <img src="{{$value['thumbnail']?asset($value['thumbnail']):asset('lp-img/default-img-thumbnail-event.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;min-height: 467.762px;max-height: 491px;background-color: #E5E5E5;">
                            </div>
                            <div class="col-12 col-md-6 gpe-r gpc-l gpc-t gpc-b d-flex flex-column">
                              <div class="tanggal">{{$value['eng_display_detail_date']}}</div>
                              <div class="label-event">{{$value['eventname']}}</div>
                              <div class="pb-2 desc">{{$value['eng_description']}}</div>

                              <!-- This container stretches to fill remaining space -->
                              <div class="d-flex flex-grow-1 align-items-end justify-content-center justify-content-md-start">
                                <i class="news-link" prev-event-row="{{$value['id']}}">News Links</i>
                                <div class="text-black mx-2 d-block d-md-none">|</div>
                                <i class="gallery-link ms-md-auto">Photo Gallery</i>
                              </div>
                            </div>
                        </div>
                    @else
                        <div class="row" label="even">
                            <div class="col-12 col-md-6 gpe-l gpc-t gpc-r gpc-b d-flex flex-column order-last order-md-first">
                              <div class="tanggal">{{$value['eng_display_detail_date']}}</div>
                              <div class="label-event">{{$value['eventname']}}</div>
                              <div class="pb-2 desc">{{$value['eng_description']}}</div>

                              <!-- This container stretches to fill remaining space -->
                              <div class="d-flex flex-grow-1 align-items-end justify-content-center justify-content-md-start">
                                <i class="news-link" prev-event-row="{{$value['id']}}">News Links</i>
                                <div class="text-black mx-2 d-block d-md-none">|</div>
                                <i class="gallery-link ms-md-auto">Photo Gallery</i>
                              </div>
                            </div>
                            <div class="col-12 col-md-6 p-0">
                                <img src="{{$value['thumbnail']?asset($value['thumbnail']):asset('lp-img/default-img-thumbnail-event.png')}}" alt="" style="height: 100%;width: 100%;background-position: center;background-size: cover;min-height: 467.762px;max-height: 491px;background-color: #E5E5E5;">
                            </div>
                        </div>
                    @endif
                    <div class="news-link-container" prev-event-row="{{$value['id']}}">
                        <h1>{{$value["eventname"]}}</h1>
                        @foreach(explode("\n",$value["additionalcontent"]) as $key2 => $value2)
                            <a href="{{$value2}}" target="_BLANK">{{$value2}}</a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="content-area" class="section-container" style="display: none;">
        
    </div>
    <div id="register-area" class="section-container" style="display: none;">
        
    </div>

<script>
    showLink = function(element){
        prev_event_row = element.getAttribute("prev-event-row");
        news_link_container = document.querySelector(`.news-link-container[prev-event-row="${prev_event_row}"]`);

        news_link_container.classList.add("show");
    }
    document.addEventListener("click",function(event){
        this_element = event.target;
        if(this_element.matches("span.detail-event")){
            // override_style = document.createElement('style');
            // override_style.textContent = `
            //   *, ::before, ::after {
            //     box-sizing: content-box !important;
            //   }
            // `;
            // override_style.setAttribute("for","event-detail-container");
            // document.head.appendChild(override_style);
            // this_element.closest(".event").querySelector(".event-detail-container").classList.add("show");
            document.body.insertAdjacentHTML("afterbegin",this_element.closest(".event").querySelector(".event-detail-container").outerHTML);
            event_detail_container_body = document.body.querySelector(".event-detail-container")
            setTimeout(function(){
                event_detail_container_body.classList.add("show");
            },1)
            
        }

        if(this_element.matches("button.back-to-event")){
            event_detail_container_body = document.body.querySelector(".event-detail-container")
            event_detail_container_body.classList.remove("show");
            setTimeout(function(){
                event_detail_container_body.remove();
            },800)
            // this_element.closest(".event").querySelector(".event-detail-container").classList.remove("show");
        }

        news_link_container_showed = document.querySelector(".news-link-container.show");
        if(news_link_container_showed && !news_link_container_showed.contains(this_element)){
            news_link_container_showed.classList.remove("show");
        }

        if(this_element.matches(".news-link")){
            showLink(this_element)
        }

    })
</script>
@endsection