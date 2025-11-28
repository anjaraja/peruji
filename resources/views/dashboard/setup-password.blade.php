<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Setup Password | PERUJI</title>
    <link rel="stylesheet" href="{{ asset('dash-css/dash-style_18.css') }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{asset('dash-js/fetchhelper_4.js')}}"></script>
    <style>
          body {
            background-color: #f2f2f2;
            font-family: "Segoe UI", sans-serif;
          }

          .access-banner {
            display: inline-block;
            background: linear-gradient(to right, #555 20px, #f7941e 20px);
            color: white;
            padding: 10px 30px;
            margin-bottom: 30px;
            letter-spacing: 4px;
            font-weight: 500;
            font-size: 14px;
            width: inherit;
            text-align: left;
          }

          .form-control {
            background-color: #fff6f6;
            border: none;
            border-radius: 0;
            border-bottom: 1px solid #ccc;
          }

          .form-control:focus {
            box-shadow: none;
            border-color: #f7941e;
          }

          .btn-black {
            background-color: black;
            color: white;
            border-radius: 25px;
            padding: 10px 30px;
            font-weight: bold;
          }
          .btn[type="submit"]{
            float: left;
          }

          .note {
            font-size: 13px;
            color: #333;
            margin-top: 30px;
          }

          .invalid-feedback.show{
            display: block;
          }
    </style>
  <style>
    .confetti-wrapper {
      background-image: url("{{asset('lp-svg/Confetti 1.svg')}}");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      width: 100%;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 2rem;
      box-sizing: border-box;
  }
    .info-done {
      display: none;
  }
    .info-done.show {
      display: block;
  }
  </style>
</head>
<body>
    @if($status)
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                    <div class="text-center" style="max-width: 400px; width: 100%;">
                        <div class="access-banner">SETUP NEW PASSWORD</div>

                        <form class="container-fluid p-0" id="setup-password-form">
                            <input type="hidden" name="fullname" value="{{ $fullname }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="text-start mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" value="{{$email}}" disabled/>
                            </div>
                            <div class="text-start mb-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" />
                            </div>

                            <div class="text-start mb-2">
                                <button type="submit" class="btn btn-black">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @else
    <div class="info-done position-absolute top-0 w-100 bg-white show">
        <div class="confetti-wrapper">
            <div class="content">
                <h2>Congratulations! Your account verified and the password setup is complete.</h2>
                <h2>We will redirecting you to login page in 5 seconds.</h2>
                <h2>If it's not automatically redirect, click this <a href="{{route('member-login')}}">Link</a></h2>
            </div>
        </div>
    </div>
    @endif
    <div class="info-done position-absolute top-0 w-100 bg-white">
        <div class="confetti-wrapper">
            <div class="content">
                <h2>Congratulations! Your account verified and the password setup is complete.</h2>
                <h2>We will redirecting you to login page in 5 seconds.</h2>
                <h2>If it's not automatically redirect, click this <a href="{{route('member-login')}}">Link</a></h2>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    setup_password = document.querySelector("form#setup-password-form");

    setup_password.addEventListener("submit",function(e){
        e.preventDefault()

        // formdata = new FormData;

        fullname = this.querySelector("input[name='fullname']").value
        // formdata.append("fullname",fullname)
        email = this.querySelector("input[name='email']").value
        // formdata.append("email",email)
        password = this.querySelector("input[name='password']").value
        // formdata.append("password",password)

        fetchData(
            "{{route('setup-password-submit')}}",
            "POST",
            {"Content-Type":"application/json"},
            {"name":fullname,"email":email,"password":password}
        )
        .then((response)=>{
            if (response.status !== 200){
                alert("Somtehing error when confugiring your account");

                return response.json();
            }

            return response.json();
        })
        .then((data)=>{
            document.querySelector(".info-done").classList.add("show");
            setTimeout(function(){
                window.location = "{{route('member-login')}}"
            },5000)
        })
        .finally(() =>{
        });

        return false;
    })
</script>
</html>