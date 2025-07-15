@extends('dashboard.app')

@section('title', 'PERUJI')

@section('content')
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
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="text-center" style="max-width: 400px; width: 100%;">
    @php
      $url = $_SERVER['REQUEST_URI'];
      $explode_url = explode("/",$url);
      $lastPath = $explode_url[count($explode_url)-1];

      $loginAs = $lastPath=="member-login"?"Member":"Admin";
    @endphp
    <h2 class="mb-4">{{$loginAs}} Sign In</h2>

    <div class="access-banner">ACCESS INFORMATION</div>

    <form class="container-fluid p-0" id="login-form">
      <div class="invalid-feedback text-start p-0 pb-3">
        Email / Password is incorrect
      </div>
      <div class="text-start mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control" />
      </div>

      <div class="text-start mb-2">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control" />
      </div>

      <div class="text-end mb-3">
        <a href="#" class="text-primary text-decoration-none" style="font-size: 14px;">Forgot your password?</a>
      </div>

      <div class="text-start mb-2">
        <button type="submit" class="btn btn-black">SIGN IN</button>
      </div>
    </form>
    <div class="container-fluid p-0">
      <div class="col-md-12">
        <p class="note mt-4">
          You will receive a notification email regarding your website access to help ensure transparency and security.
        </p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  const form = document.getElementById('login-form');
  sessionStorage.setItem("roleDashboard","{{$loginAs}}")

  form.addEventListener('submit', function(event) {
    event.preventDefault();

    email = document.getElementById("email").value;
    password = document.getElementById("password").value;

    loginprocess = fetchData(
        "{{route('login')}}",
        "POST",
        {"Content-Type":"application/json"},
        {"email":email,"password":password}
      )
      .then((response)=>{
        if (response.status !== 200){
          return response.json();
        }
        return response.json();
      })
      .then((data)=>{
        invalid_message = document.querySelector(".invalid-feedback");
        invalid_message?.classList.remove("show")

        if(typeof data.access_token === "undefined" || !data.access_token){
          console.log(data)
          invalid_message?.classList.add("show")
          return false;
          // window.location.href = "{{route('admin')}}";
          // return false;
        }
        else{
          localStorage.setItem("Token",data.access_token);
          window.location.href = "{{route('dashboard-index')}}"
          return false; 
        }
      });

    // console.log(loginprocess);

    return false;
  })
</script>
@endsection