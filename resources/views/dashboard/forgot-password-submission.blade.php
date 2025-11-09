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
    <h2 class="mb-4">Setup Your New Password</h2>

    <div class="access-banner">ACCESS INFORMATION</div>

    <form class="container-fluid p-0" id="setup-password-form">
      <div class="text-start mb-3">
        <label for="password" class="form-label">New Password</label>
        <input type="password" name="password" class="form-control" />
      </div>
      <div class="text-start mb-3">
        <label for="password" class="form-label">Re-type New Password</label>
        <input type="password" name="confirm-password" class="form-control" />
        <div class="invalid-feedback text-start p-0 pt-1">
          Password is not match
        </div>
      </div>
      <div class="text-start mb-2">
        <button type="submit" class="btn btn-black" disabled>Submit</button>
        <input type="hidden" name="email" value="{{$_GET['email']}}" />
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
  const form = document.getElementById('setup-password-form');

  confirmPassword = document.querySelector("input[name='confirm-password']");
  canSubmit = false;
  confirmPassword.addEventListener("keyup",function(e){
    valPassword = document.querySelector("input[name='password']").value;
    invalid_message = document.querySelector(".invalid-feedback");

    if(this.value == valPassword){
      canSubmit = true;
      document.querySelector("button[type='submit']").removeAttribute("disabled");
      invalid_message?.classList.remove("show")
    }
    else{
      if(this.value){
        invalid_message?.classList.add("show")
      }
    }
  })

  form.addEventListener('submit', function(event) {
    event.preventDefault();
    if(!canSubmit) return false;
    formdata = new FormData;

    email = this.querySelector("input[name='email']").value;
    formdata.append("email",email);
    password = this.querySelector("input[name='password']").value;
    formdata.append("password",password);

    fetchData(
        "{{route('post-forgot-password-submission')}}",
        "POST",
        {},
        formdata
      )
      .then(async (response)=>{
          result = await response.json();
          if (response.status !== 200){
              showAlert("not-ok","updated",result.message)
          }

          showAlert("ok","updated",result.message)
          document.querySelector("input[name='password']").value = "";
          document.querySelector("input[name='confirm-password']").value = "";
          document.querySelector("input[name='email']").remove();
          setTimeout(function(){
            window.location = "/";
          },4000)
      });

    // console.log(loginprocess);

    return false;
  })
</script>
@endsection