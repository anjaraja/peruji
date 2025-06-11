@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')

    
    <div class="container-fluid form">
        <div class="error-container"></div>
         <div class="container">
             <div class="label-eve">Event Registration</div>
             <form class="container-content mx-auto" id="event-regis">
                <div class="row mb-3">
                    <div class="col-sm-3 col-12">
                        <label for="event">Event</label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <input type="text" id="event" class="form-control form-control-sm" value="{{$events->eventname}}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 col-12">
                        <label for="fullname">Full Name</label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <input type="text" id="fullname" class="form-control form-control-sm"></td>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 col-12">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <input type="email" id="email" class="form-control form-control-sm"></td>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 col-12">
                        <label for="phONe">Mobile Phone</label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <input type="number" id="phone" class="form-control form-control-sm"></td>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 col-12">
                        <label for="ofcphone">Work Phone</label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <input type="number" id="ofcphone" class="form-control form-control-sm"></td>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 col-12">
                        <label for="company">Company</label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <input type="text" id="company" class="form-control form-control-sm"></td>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 col-12">
                        <label for="addreess">Address</label>
                    </div>
                    <div class="col-sm-9 col-12">
                        <textarea name="" id="address" class="form-control form-control-sm" rows="3"></textarea>
                    </div>
                </div>
                <div class="mobile d-sm-none d-block">
                    <div class="d-flex align-items-center mt-3">
                        <div class="col-6 text-decoration-none">
                            <a href="{{route('events')}}">
                                <button class="btn btn-link text-decoration-none bg-transparent text-white" type="button">
                                    <div class="d-flex align-items-center">
                                        <svg class="me-1" width="20" height="16" viewBox="0 0 31 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM31 8V7L1 7V8V9L31 9V8Z" fill="white"/>
                                        </svg>
                                        BACK
                                    </div>
                                </button>
                            </a>
                        </div>
                        <button class="btn px-4 ms-auto" id="button" type="submit">SUBMIT</button>
                    </div>
                    <div class="mt-3 text-center text-white" style="font-size: 12px;">
                        You will receive a notification email regarding your registration and payment.
                    </div>
                </div>
                <div class="not-mobile d-sm-block d-none">
                    <div class="d-flex flex-column align-items-center mt-3">
                        <button class="btn px-4 ms-auto" id="button" type="submit">SUBMIT</button>
                        <div class="mt-2 mb-4 text-end text-white w-100" style="font-size: 14px;">
                            You will receive a notification email regarding your registration and payment.
                        </div>
                        <a href="{{route('events')}}" class="me-auto">
                            <button class="btn btn-link text-decoration-none bg-transparent text-white" type="button">
                                <div class="d-flex align-items-center">
                                    <svg class="me-1" width="20" height="16" viewBox="0 0 31 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM31 8V7L1 7V8V9L31 9V8Z" fill="white"/>
                                    </svg>
                                    BACK
                                </div>
                            </button>
                        </a>
                    </div>
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