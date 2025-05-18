@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')

    <div class="container-fluid form">
         <div class="container">
             <div class="label-eve">Event Registration</div>
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
                         <td>Mobile Phone</td>
                         <td><input type="number" class="form-control"></td>
                     </tr>
                     <tr>
                         <td>Work Phone</td>
                         <td><input type="number" class="form-control"></td>
                     </tr>
                     <tr>
                         <td>Company</td>
                         <td><input type="number" class="form-control"></td>
                     </tr>
                     <tr>
                         <td>Addres</td>
                         <td><textarea name="" id="" class="form-control" rows="3"></textarea></td>
                     </tr>
                 </table>
                 <div class="button text-end">
                     <button class="btn btn-submit mt-3">SUBMIT</button>
                 </div>
             </div>
         </div>
    </div>

    <div class="info-done" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); display: none;">
        <div class="cardo animated-popup">
            <div style="font-size: 50px; margin-bottom: 20px;">Thank You!</div>
            <div style="font-size: 16px;">
                A confirmation email with your registration and payment information will be sent to you shortly.
            </div>
        </div>
    </div>
@endsection