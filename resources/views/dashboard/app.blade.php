<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>@yield('title', 'PERUJI | CMS')</title>
    <link rel="stylesheet" href="{{ asset('dash-css/dash-style_12.css') }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{asset('dash-js/fetchhelper_3.js')}}"></script>
</head>
<body>
    @include('dashboard.header')
    @include('dashboard.notification')
    <main>
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
    
    @include('dashboard.footer')
    @include('dashboard.modal')
</body>
<script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript">
    const logout_button = document.getElementById('nav-logout');

    logout_button.addEventListener("click",function(){
        if (localStorage.getItem("Token")){
            toggleModal("logoutModal");
        }
        else{
            window.location.href = "{{route('homepage')}}"
        }
    })

    document.addEventListener("click", function (e) {
        if (e.target.matches("#logoutModal button#yes")) {

            loginprocess = fetchData(
                "{{route('logout')}}",
                "GET"
              )
              .then((response)=>{
                if (response.status !== 200){
                    localStorage.removeItem("Token")
                    window.location.href = "{{route('homepage')}}";
                    return response.json();
                }
                localStorage.clear()
                sessionStorage.clear();
                return response.json();
              })
              .then((data)=>{
                localStorage.removeItem("Token")
                window.location.href = "{{route('homepage')}}";
                // alert("success logout")
              });

            // console.log(loginprocess);

            return false;
        }
    });
</script>

<script type="text/javascript">
    //WILL BE ADD TO EXTERNAL SCRIPT

    toggleModal = function(modalName){
        const modalEl = document.getElementById(modalName);
        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        modal.toggle();
    }
</script>
</html>