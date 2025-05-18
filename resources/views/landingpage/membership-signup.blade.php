@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
<style type="text/css">
    /* Membership Page */
        body {
            background-color: black;
        }
        .label-membership {
            font-size: 35px;
            padding-bottom: 20px;
            color: white;
        }
        .container{
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
        
        <div class="container">
            <div class="label-membership">Membership Application</div>
            
            <div class="header">
                <div class="gray"></div>
                <div class="section-header">PERSONAL INFORMATION</div>
            </div>
            
            <table class="table">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" class="form-control"></td>
                    <td>Male / Female</td>
                    <td><input type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" class="form-control"></td>
                    <td>Phone</td>
                    <td><input type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td colspan="3"><input type="date" class="form-control"></td>
                </tr>
            </table>

            <div class="header">
                <div class="gray"></div>
                <div class="section-header">ORGANIZATION INFORMATION (OPTIONAL)</div>
            </div>

            <table class="table">
                <tr>
                    <td>Organization</td>
                    <td colspan="3"><input type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td colspan="3"><input type="text" class="form-control"></td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td><input type="text" class="form-control"></td>
                    <td>Work Email</td>
                    <td><input type="email" class="form-control"></td>
                </tr>
            </table>

            <button class="btn btn-submit mt-3">SUBMIT</button>
        </div>
    </div>
<!-- Close Membership Signup -->
@endsection