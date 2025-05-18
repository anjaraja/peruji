<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>@yield('title', 'PERUJI')</title>
    <link rel="stylesheet" href="{{ asset('lp-css/style.css') }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    @include('landingpage.header')

    <main>
        @yield('content')
    </main>

    @if (!Request::is('/','events-1','events-2','contact-us','membership-signup','events-regis'))
        @include('landingpage.footer')
    @endif
    
</body>
<script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    const menuButton = document.getElementById('nav-menu-open');
    const menuText = document.getElementById('menu-toggle-text');
    const navMenu = document.querySelector('.nav-menu-body');

    menuButton.addEventListener('click', () => {
        const isShown = navMenu.classList.contains('show');
        
        if (isShown) {
            navMenu.classList.remove('show');
            menuText.textContent = 'Menu';
        } else {
            navMenu.classList.add('show');
            menuText.textContent = 'Exit';
        }
    });
    

    const submitBtn = document.querySelector('.btn-submit');
    const infoDone = document.querySelector('.info-done');
    const cardo = document.querySelector('.cardo');

    submitBtn.addEventListener('click', function (e) {
        e.preventDefault();
        infoDone.style.display = 'block';

        setTimeout(() => {
            infoDone.classList.add('show');
        }, 10);
    });

    document.addEventListener('click', function (e) {
        if (infoDone.classList.contains('show') && !cardo.contains(e.target) && !submitBtn.contains(e.target)) {
            infoDone.classList.remove('show');
            setTimeout(() => {
                infoDone.style.display = 'none';
            }, 300); 
        }
    });
</script>
</html>