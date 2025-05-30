@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')

     <div class="container-fluid p-0 form">
        <div class="error-container"></div>
         <div class="container">
             <div class="label-eve">Contact Us</div>
             <form class="container-content mx-auto" id="contact-us">
                 <table class="table">
                     <tr>
                         <td>Full Name</td>
                         <td><input type="text" id="fullname" class="form-control form-control-sm"></td>
                     </tr>
                     <tr>
                         <td>Email</td>
                         <td><input type="email" id="email" class="form-control form-control-sm"></td>
                     </tr>
                     <tr>
                         <td>Phone</td>
                         <td><input type="number" id="phone" class="form-control form-control-sm"></td>
                     </tr>
                     <tr>
                         <td>Subject</td>
                         <td><input type="text" id="subject" class="form-control form-control-sm"></td>
                     </tr>
                     <tr>
                         <td>Message</td>
                         <td><textarea name="" id="message" class="form-control form-control-sm" rows="5"></textarea></td>
                     </tr>
                 </table>
                 <div class="button text-end">
                     <button class="btn px-4" id="button" type="submit">SUBMIT</button>
                 </div>
             </form>
         </div>
     </div>

     <div class="info-done" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); display: none;">
        <div class="cardo animated-popup">
            <div style="font-size: 40px; margin-bottom: 20px;">Thank you for contacting us!</div>
            <div style="font-size: 16px;">
                We will be in touch shortly.
            </div>
        </div>
    </div>
    
    <script>
        const form = document.getElementById('contact-us');
        
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

            fullname = document.getElementById("fullname").value;
            email = document.getElementById("email").value;
            phone = document.getElementById("phone").value;
            subject = document.getElementById("subject").value;
            message = document.getElementById("message").value;

            membership = fetchData(
                "{{route('contactUs')}}",
                "POST",
                {"Content-Type":"application/json"},
                {
                    "fullname":fullname,
                    "email":email,
                    "phone":phone,
                    "subject":subject,
                    "message":message,
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