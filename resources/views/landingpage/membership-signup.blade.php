@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
    <div class="container-fluid form">
        <div class="container">
            <div class="label-eve">Membership Application</div>
            
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

    <div class="info-done" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); display: none;">
        <div class="cardo animated-popup">
            <div style="font-size: 50px; margin-bottom: 20px;">Thank You!</div>
            <div style="font-size: 16px;">
                You will receive an email regarding<br>
                confirmation of your membership<br>
                application and payment.
            </div>
        </div>
    </div>
@endsection