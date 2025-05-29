<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>@yield('title', 'PERUJI')</title>
    <link rel="stylesheet" href="{{ asset('lp-css/styless_5.css') }}"> 
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('dash-js/fetchhelper_1.js')}}"></script>
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
    var menuButton = document.getElementById('nav-menu-open');
    var menuText = document.getElementById('menu-toggle-text');
    var navMenu = document.querySelector('.nav-menu-body');

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