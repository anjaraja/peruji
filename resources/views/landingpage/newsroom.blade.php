@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
    <style>
        .newsroom-bg-img{
            background-image: url('{{asset("lp-img/newsroom-header-img.png")}}');
        }
        @media(max-width: 600px){
            .newsroom-bg{
                height: 17.5rem !important;
            }
        }
    </style>
    <div class="container-fluid p-0 newsroom">
        <div class="newsroom-bg newsroom-bg-img" style="">
            
        </div>
        <!-- <img src="" alt="" > -->
        <div class="menu-newsroom-page">
            <div class="header-sub-menu">
                <section class="square me-3"></section>
                <h1 class="label m-0 mt-1" lang="eng">Newsroom</h1>
                <h1 class="label m-0 mt-1" lang="idn">Berita</h1>
            </div>

            <div class="container-fluid menu-newsroom-page p-0" id="previous-newsroom">
                <div class="in-newsroom-page text-center text-md-start px-4 px-md-0">
                    @foreach ($data as $key => $value)
                        @if($key % 2 === 0)
                            <div class="row" label="odd">
                                <div class="col-12 col-md-6 p-0 order-first order-md-first">
                                    <img src="{{$value['photo']?asset($value['photo']):asset('lp-img/default-img-thumbnail-event.png')}}" alt="" class="thumbnail-event-img">
                                </div>
                                <div class="col-12 col-md-6 gpe-r gpc-l gpc-t gpc-b d-flex flex-column">
                                  <div class="tanggal" lang="idn">{{$value['display_newsdate']}}</div>
                                  <div class="tanggal" lang="eng">{{$value['display_eng_newsdate']}}</div>
                                  <div class="label-newsroom">{{$value['newsname']}}</div>
                                  <div class="pb-2 desc" lang="idn">{!! nl2br(e($value['short_description'])) !!}</div>
                                  <div class="pb-2 desc" lang="eng">{!! nl2br(e($value['short_eng_description'])) !!}</div>

                                  <!-- This container stretches to fill remaining space -->
                                  @if($value['shorted'])
                                      <div class="d-flex flex-grow-1 align-items-end justify-content-center justify-content-md-start">
                                        <i class="news-link" newsroom-row="{{$value['id']}}" lang="idn">SELENGKAPNYA</i>
                                        <i class="news-link" newsroom-row="{{$value['id']}}" lang="eng">READ MORE</i>
                                      </div>
                                  @endif
                                </div>
                            </div>
                        @else
                            <div class="row" label="even">
                                <div class="col-12 col-md-6 gpe-l gpc-t gpc-r gpc-b d-flex flex-column order-last order-md-first">
                                  <div class="tanggal" lang="idn">{{$value['display_newsdate']}}</div>
                                  <div class="tanggal" lang="eng">{{$value['display_eng_newsdate']}}</div>
                                  <div class="label-newsroom">{{$value['newsname']}}</div>
                                  <div class="pb-2 desc" lang="idn">{!! nl2br(e($value['short_description'])) !!}</div>
                                  <div class="pb-2 desc" lang="eng">{!! nl2br(e($value['short_eng_description'])) !!}</div>

                                  <!-- This container stretches to fill remaining space -->
                                  @if($value['shorted'])
                                      <div class="d-flex flex-grow-1 align-items-end justify-content-center justify-content-md-start">
                                        <i class="news-link" newsroom-row="{{$value['id']}}" lang="idn">SELENGKAPNYA</i>
                                        <i class="news-link" newsroom-row="{{$value['id']}}" lang="eng">READ MORE</i>
                                      </div>
                                  @endif
                                </div>
                                <div class="col-12 col-md-6 p-0">
                                    <img src="{{$value['photo']?asset($value['photo']):asset('lp-img/default-img-thumbnail-event.png')}}" alt="" class="thumbnail-event-img">
                                </div>
                            </div>
                        @endif

                        @if($value['shorted'])
                            <div class="newsroom-detail-container" row="{{$value['id']}}">
                                <div class="container-fluid news-s">
                                    <button type="button" class="btn-close" style="position:absolute;top: 30px;right: 30px;"></button>
                                    <div class="container position-relative">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center thumbnail-container"> 
                                                <div class="thumbnail-img" style="background:url('{{$value["photo"]?asset($value["photo"]):asset("lp-img/default-img-thumbnail-event.png")}}') center no-repeat;background-size:contain;"></div>
                                                <!-- <img src="{{$value['photo']?asset($value['photo']):asset('lp-img/default-img-thumbnail-event.png')}}" alt="" class="thumbnail-event-img"> -->
                                            </div>

                                            <div class="col-12 gpe-r gpc-l gpc-t gpc-b d-flex flex-column">
                                              <div class="tanggal" lang="idn">{{$value['display_newsdate']}}</div>
                                              <div class="tanggal" lang="eng">{{$value['display_eng_newsdate']}}</div>
                                              <div class="label-newsroom">{{$value['newsname']}}</div>
                                              <div class="pb-2 desc" lang="idn">{!! nl2br(e($value['description'])) !!}</div>
                                              <div class="pb-2 desc" lang="eng">{!! nl2br(e($value['eng_description'])) !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll(".menu-newsroom-page i.news-link").forEach(function(thisel){
            thisel.addEventListener("click",function(){
                // alert(this.getAttribute("newsroom-row"));
                document.querySelector(`.newsroom-detail-container[row='${this.getAttribute("newsroom-row")}']`).classList.add("show")
                document.body.classList.add("popupshow");
            })
        })
        document.querySelectorAll(".newsroom-detail-container .btn-close").forEach(function(thisel){
            thisel.addEventListener("click",function(){
                this.closest(".newsroom-detail-container").classList.remove("show")
                document.body.classList.remove("popupshow");
            })
        })
    </script>
@endsection