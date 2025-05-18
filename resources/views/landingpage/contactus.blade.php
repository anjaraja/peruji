@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
<style type="text/css">
    /* Membership Page */
        body {
            background-color: black;
        }
        .label-contact {
            font-size: 45px;
            color: white;
        }
        .container {
            padding-left: 50px;
            padding-right: 50px;
        }
        .header {
            display: flex;
        }
        .container .header .gray {
            background-color: gray;
            width: 20px;
        }
        .container .header .section-header {
            background-color: #F7941D;
            padding: 5px;
            color: white;
            width: 100%;
        }
        .container-membership {
            position: relative;
        }
        .table {
            margin: 20px 0px !important;
        }
        .table td {
            background-color: black;
            color: white !important;
            border: none;                
        }
        .btn-submit {
            color: white;
            border-radius: 50px;
            padding: 5px 40px;
            background-color: #F7941D;
        }
    /* Close Membership Page */
</style>
<!-- Membership Signup -->
    <div style="
        display: flex;
        align-items: center;
        height: 100vh;
    ">
        
        <!-- Contactus -->
            <div class="container">
                
                <div class="label-contact">Contact Us</div>
                <div class="container-content mx-auto" style="max-width: 700px;">
                    <table class="table">
                        <tr>
                            <td>Full Name</td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="number" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td><input type="number" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td><textarea name="" id="" class="form-control" rows="8"></textarea></td>
                        </tr>
                    </table>
                    <div class="button text-end">
                        <button class="btn btn-submit mt-3">SUBMIT</button>
                    </div>
                </div>
            </div>
        <!-- Close Contactus -->
    </div>
<!-- Close Membership Signup -->
@endsection