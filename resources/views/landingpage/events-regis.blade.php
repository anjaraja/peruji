@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')

    <div class="container-fluid form">
        <div class="error-container"></div>
         <div class="container">
             <div class="label-eve">Event Registration</div>
             <form class="container-content mx-auto" id="event-regis" style="max-width: 700px;">
                 <table class="table">
                     <tr>
                         <td>Event</td>
                         <td><input type="text" id="event" class="form-control" value="{{$events->eventname}}" disabled></td>
                     </tr>
                     <tr>
                         <td>Full Name</td>
                         <td><input type="text" id="fullname" class="form-control"></td>
                     </tr>
                     <tr>
                         <td>Email</td>
                         <td><input type="email" id="email" class="form-control"></td>
                     </tr>
                     <tr>
                         <td>Mobile Phone</td>
                         <td><input type="number" id="phone" class="form-control"></td>
                     </tr>
                     <tr>
                         <td>Work Phone</td>
                         <td><input type="number" id="ofcphone" class="form-control"></td>
                     </tr>
                     <tr>
                         <td>Company</td>
                         <td><input type="text" id="company" class="form-control"></td>
                     </tr>
                     <tr>
                         <td>Addres</td>
                         <td><textarea name="" id="address" class="form-control" rows="3"></textarea></td>
                     </tr>
                 </table>
                 <div class="button text-end">
                     <button class="btn btn-submit mt-3 p-0">SUBMIT</button>
                 </div>
             </form>
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
    
    <script>
        const form = document.getElementById('event-regis');
        
        const submitBtn = document.querySelector('.btn-submit');
        const infoDone = document.querySelector('.info-done');
        const cardo = document.querySelector('.cardo');

        const errorContainer = document.querySelector(".error-container");
        
        function showErrors(errors) {
            errorContainer.innerHTML = '';

            errorContainer.innerHTML = '<div class="label-warning">Warning</div><hr class="garis">';

            for (const field in errors) {
                errors[field].forEach(err => {
                    const errorItem = document.createElement("div");
                    
                    errorItem.innerText = `${field}: ${err}`;
                    errorContainer.appendChild(errorItem);
                });
            }

            errorContainer.classList.add('show');
            setTimeout(() => {
                errorContainer.classList.remove('hidden');
            }, 10);

            setTimeout(() => {
                errorContainer.classList.add('hidden');
                errorContainer.classList.remove('show');
            }, 4000);
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            events = document.getElementById("event").value;
            fullname = document.getElementById("fullname").value;
            email = document.getElementById("email").value;
            phone = document.getElementById("phone").value;
            ofcphone = document.getElementById("ofcphone").value;
            company = document.getElementById("company").value;
            address = document.getElementById("address").value;

            membership = fetchData(
                "{{route('eventRegis')}}",
                "POST",
                {"Content-Type":"application/json"},
                {
                    "eventregistrationname": events,
                    "fullname":fullname,
                    "email":email,
                    "phone":phone,
                    "ofcphone":ofcphone,
                    "company":company,
                    "address":address,
                }
            )
            .then((response)=>{
                if (response.status !== 200){
                    return response.json();
                }
                return response.json();
            })
            .then((data)=>{
           
                console.log("DATA:", data);

                if (data.status === "berhasil") {
                    infoDone.style.display = 'block';
                    setTimeout(() => {
                        infoDone.classList.add('show');
                    }, 1);
                    
                    setTimeout(() => {
                        window.location.reload();
                    }, 4000);
                } else if (data.status === "gagal") {
                    showErrors(data.message);
                } else {
                    alert(data.message || "Terjadi kesalahan.");
                }
            });

            return false;
        })
        
        document.addEventListener('click', function (e) {
            if (infoDone.classList.contains('show') && !cardo.contains(e.target) && !submitBtn.contains(e.target)) {
                infoDone.classList.remove('show');
                setTimeout(() => {
                    infoDone.style.display = 'none';
                }, 300); 
            }
        });
    </script>
@endsection