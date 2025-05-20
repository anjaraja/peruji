@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
    <div class="container-fluid form">
        <div class="error-container"></div>
        <div class="container">
            <div class="label-eve">Membership Application</div>
            <form id="membership-singup-form">

                <div class="header">
                    <div class="gray"></div>
                    <div class="section-header">PERSONAL INFORMATION</div>
                </div>
                
                <table class="table">
                    <tr>
                        <td>Full Name</td>
                        <td><input type="text" class="form-control" id="fullname"></td>
                        <td>Male / Female</td>
                        <td><select id="gender" class="form-control">
                                <option selected>Male / Female</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" class="form-control" id="email"></td>
                        <td>Phone</td>
                        <td><input type="text" class="form-control" id="phone"></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td colspan="3"><input type="date" class="form-control" id="dob"></td>
                    </tr>
                </table>
    
                <div class="header">
                    <div class="gray"></div>
                    <div class="section-header">ORGANIZATION INFORMATION (OPTIONAL)</div>
                </div>
    
                <table class="table">
                    <tr>
                        <td>Organization</td>
                        <td colspan="3"><input type="text" class="form-control" id="org"></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td colspan="3"><input type="text" class="form-control" id="address"></td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td><input type="text" class="form-control" id="website" placeholder="https://example.com"></td>
                        <td>Work Email</td>
                        <td><input type="email" class="form-control" id="ofcemail"></td>
                    </tr>
                </table>
    
                <button class="btn btn-submit mt-3" type="submit">SUBMIT</button>
            </form>
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
    
    <script>
        const form = document.getElementById('membership-singup-form');
        
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
            gender = document.getElementById("gender").value;
            email = document.getElementById("email").value;
            phone = document.getElementById("phone").value;
            dob = document.getElementById("dob").value;
            org = document.getElementById("org").value;
            address = document.getElementById("address").value;
            website = document.getElementById("website").value;
            ofcemail = document.getElementById("ofcemail").value;

            membership = fetchData(
                "{{route('memberShip')}}",
                "POST",
                {"Content-Type":"application/json"},
                {
                    "fullname":fullname,
                    "gender":gender,
                    "email":email,
                    "phone":phone,
                    "dob":dob,
                    "org":org,
                    "address":address,
                    "website":website,
                    "ofcemail":ofcemail,
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