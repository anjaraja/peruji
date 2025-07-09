<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Setup Password | PERUJI</title>
    <link rel="stylesheet" href="{{ asset('dash-css/dash-style_6.css') }}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{asset('dash-js/fetchhelper_3.js')}}"></script>
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
</head>
<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                    <div class="text-center" style="max-width: 400px; width: 100%;">
                        <div class="access-banner">Setup Password</div>

                        <form class="container-fluid p-0" id="setup-password-form" method="POST" action="{{route('setup-password-submit')}}">
                            <input type="hidden" name="fullname" value="{{ $fullname }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="text-start mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" value="{{email}}" disabled/>
                            </div>
                            <div class="text-start mb-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" />
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
</body>
<script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</html>