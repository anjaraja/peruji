<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>@yield('title', 'PERUJI')</title>
    <link rel="stylesheet" href="{{ asset('lp-css/global.css') }}"> 
    <link rel="stylesheet" href="{{ asset('lp-css/navbar_10.css') }}"> 
    <link rel="stylesheet" href="{{ asset('lp-css/styless_21.css') }}"> 
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
            item.classList.add("pt-0");
            item.classList.add("pb-0");
        });
      }
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
</html>