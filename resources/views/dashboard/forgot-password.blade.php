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
    <h2 class="mb-4">Forgot Password</h2>

    <div class="access-banner">ACCESS INFORMATION</div>

    <form class="container-fluid p-0" id="login-form">
      <div class="text-start mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control" />
      </div>

      <div class="text-end mb-3">
        <a href="#" class="text-primary text-decoration-none" for="signin" style="font-size: 14px;">Sign in</a>
      </div>

      <div class="text-start mb-2">
        <button type="submit" class="btn btn-black">Submit</button>
      </div>
    </form>
    <div class="container-fluid p-0">
      <div class="col-md-12">
        <p class="note mt-4">
          You will receive an email for setup your password.
        </p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  const form = document.getElementById('login-form');

  document.querySelector("a[for='signin']").addEventListener("click",function(){
    if(sessionStorage.getItem("roleDashboard") == "Admin"){
      window.location = "admin";
    }
    else{
      window.location = "member-login";
    }
  })

  form.addEventListener('submit', function(event) {
    event.preventDefault();

    formdata = new FormData;

    email = this.querySelector("input[id='email']").value;
    formdata.append("email",email);

    fetchData(
        "{{route('send-email-forgot-password')}}",
        "POST",
        {},
        formdata
      )
      .then(async (response)=>{
          result = await response.json();
          if (response.status !== 200){
              showAlert("not-ok","updated",result.message)

              return response.json();
          }

          showAlert("ok","updated",result.message)
          document.getElementById("email").value = "";
          return response.json();
      });

    // console.log(loginprocess);

    return false;
  })
</script>
@endsection