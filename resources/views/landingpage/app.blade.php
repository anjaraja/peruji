<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>@yield('title', 'PERUJI')</title>
    <link rel="stylesheet" href="{{ asset('lp-css/global.css') }}"> 
    <link rel="stylesheet" href="{{ asset('lp-css/navbar_16.css') }}"> 
    <link rel="stylesheet" href="{{ asset('lp-css/events_5.css') }}"> 
    <link rel="stylesheet" href="{{ asset('lp-css/styless_35.css') }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('dash-js/fetchhelper_2.js')}}"></script>
    <script src="{{asset('dash-js/jquery.js')}}"></script>
</head>
<body>
    @include('landingpage.header')

    <main>
        @yield('content')
    </main>

    @if (!Request::is('/','event-detail/*','contact-us','membership-signup','event-registration/*'))
        @include('landingpage.footer')
    @endif
    
</body>
<script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
      const platform = navigator.platform.toLowerCase();

      if (platform.includes("mac")) {
        document.querySelectorAll(".btn").forEach(item => {
            item.classList.add("pt-1");
            item.classList.add("pb-0");

        });

      } else if (platform.includes("win")) {
        square_me = document.querySelector(".square.me-3")
        if(square_me){
            squar_me.classList.add("align-self-center");
        }
        document.querySelectorAll(".btn").forEach(item => {
            item.classList.add("pt-1");
            item.classList.add("pb-1");
        });
      }
    });
</script>
<script>
    function setLanguage(lang,el) {
        //add default active to ENG
        if(el){
            if(el.classList.contains("active")){
                return false;
            }
            document.querySelector(".lang-choice a.active").classList.remove("active");
        }

        localStorage.setItem('language', lang);
        if(lang == "eng") document.querySelector(".lang-choice.lang-en a").classList.add("active");
        else if(lang == "idn") document.querySelector(".lang-choice.lang-idn a").classList.add("active");
        // console.log(localStorage.getItem("language"));

        const elements = document.querySelectorAll('[lang]');

        elements.forEach(el => {
            el.classList.remove('visible');
            setTimeout(() => {
            el.style.display = 'none';
            }, 500);
        });

        setTimeout(() => {
            document.querySelectorAll('[lang="' + lang + '"]').forEach(el => {
            el.style.display = 'block';
            void el.offsetWidth;
            el.classList.add('visible');
            });
        }, 500);
    }

    document.addEventListener('DOMContentLoaded', function() {
    const savedLang = localStorage.getItem('language') || 'eng';
    setLanguage(savedLang);
    });
</script>
<script>

    var menuButton = document.getElementById('nav-menu-open');
    var menuText = document.getElementById('menu-toggle-text');
    var navMenu = document.querySelector('.nav-menu-body');
    var listMenu = document.querySelectorAll('.label-nav-item');


    listMenu.forEach(item => {
        item.addEventListener('click', () => {
            const isShown = navMenu.classList.contains('show');
            
            if (isShown) {
                navMenu.classList.remove('show');
            menuText.textContent = 'MENU';
            } else {
                navMenu.classList.add('show');
            menuText.textContent = 'EXIT';
            }
        });
    });

    menuButton.addEventListener('click', () => {
        const isShown = navMenu.classList.contains('show');
        
        if (isShown) {
            navMenu.classList.remove('show');
            menuText.textContent = 'MENU';
        } else {
            navMenu.classList.add('show');
            menuText.textContent = 'EXIT';
        }
    });

    $(document).ready(function () {
        $('.load-content').on('click', function (e) {
            e.preventDefault();

            let url = $(this).data('url');
            let target = $(this).data('target');

            $('.section-container').each(function () {
                if ($(this).attr('id') !== target) {
                    $(this).hide();
                }
            });

            let $targetEl = $('#' + target);

            if ($targetEl.children().length > 0) {
                $targetEl.fadeIn();
                $('html, body').animate({
                    scrollTop: $targetEl.offset().top
                }, 500);
            } else {

                $.get(url, function (data) {
                    
                    $targetEl.html(data).fadeIn();

                    $('html, body').animate({
                        scrollTop: $targetEl.offset().top
                    }, 500);
                });
            }
        });
    });

</script>
<script>
    loadingFormButton = function(status, thisEl){
        if(status == "show"){
            thisEl.style.pointerEvents = "none";
            originText = thisEl.textContent;
            thisEl.innerHTML = `<originText style="display:none;">${originText}</originText><div class="spinner-border text-light" role="status"></div>`;
        }
        else{
            originText = thisEl.querySelector("originText").textContent;
            thisEl.style.pointerEvents = "auto";
            thisEl.innerHTML = originText;
        }
    }
</script>
</html>