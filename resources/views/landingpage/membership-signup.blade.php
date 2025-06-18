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
                
                <div class="row my-2">
                    <div class="col-sm-6 col-12">
                        <div class="row mb-2">
                            <div class="col-md-3 col-12">
                                <label for="fullname">Full Name</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <input type="text" class="form-control form-control-sm" id="fullname">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3 col-12">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <input type="email" class="form-control form-control-sm" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="row mb-2">
                            <div class="col-md-3 col-12">
                                <label for="fullname">Gender</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <select id="gender" class="form-control form-control-sm">
                                    <option selected>Male / Female</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3 col-12">
                                <label for="phone">Phone</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <input type="number" class="form-control form-control-sm" id="phone">
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="header">
                    <div class="gray"></div>
                    <div class="section-header d-flex align-items-center">ORGANIZATION INFORMATION <label for="" class="d-sm-block d-none ps-2">(OPTIONAL)</label></div>
                </div>
                
                <div class="row my-2">
                    <div class="col-sm-6 col-12">
                        <div class="row mb-2">
                            <div class="col-md-3 col-12">
                                <label for="companyname">Company Name</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <input type="text" class="form-control form-control-sm" id="companyname">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3 col-12">
                                <label for="funct">Function</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <input type="text" class="form-control form-control-sm" id="funct">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="row mb-2">
                            <div class="col-md-3 col-12">
                                <label for="departnment">Department</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <input type="text" class="form-control form-control-sm" id="department">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3 col-12">
                                <label for="ofcemail">Work Email</label>
                            </div>
                            <div class="col-md-9 col-12">
                                <input type="email" class="form-control form-control-sm" id="ofcemail">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="button text-center text-sm-start">
                    <button class="btn px-4" id="button" type="submit">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="info-done position-absolute top-0 w-100 bg-white" style="display:none;">
        <div class="confetti-wrapper">
            <div class="content">
                <h2>We're excited to welcome you aboard!</h2>
                <h2>To complete your registration, please take a moment</h2>
                <h2>to fill in your full information here:</h2>
                <div class="mt-5 d-flex flex-column align-items-center justify-content-center">
                    <svg width="48" height="63" viewBox="0 0 48 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_462_256)">
                        <path d="M30 0H4.50063C2.09912 0 0 2.09916 0 4.50072V58.5018C0 60.9008 2.09912 63.0025 4.50063 63.0025H43.4994C45.8984 63.0025 48 60.9034 48 58.5018V18.0004L37.4994 10.5008L30 0Z" fill="#673AB7"/>
                        <path d="M18.0003 46.4989H36.0003V43.5001H18.0003V46.4989ZM18.0003 26.9992V29.998H36.0003V26.9992H18.0003ZM15.299 28.5011C15.299 29.7006 14.3993 30.9001 12.9 30.9001C11.4006 30.9001 10.501 30.0005 10.501 28.5011C10.501 27.0017 11.4006 26.1021 12.9 26.1021C14.3993 26.1021 15.299 27.299 15.299 28.5011ZM15.299 36.9003C15.299 38.0998 14.3993 39.2993 12.9 39.2993C11.4006 39.2993 10.501 38.3997 10.501 36.9003C10.501 35.4009 11.4006 34.5012 12.9 34.5012C14.3993 34.5012 15.299 35.7007 15.299 36.9003ZM15.299 44.9995C15.299 46.199 14.3993 47.3986 12.9 47.3986C11.4006 47.3986 10.501 46.4989 10.501 44.9995C10.501 43.5001 11.4006 42.6005 12.9 42.6005C14.3993 42.6005 15.299 43.8 15.299 44.9995ZM18.0003 38.9994H36.0003V35.9981H18.0003V38.9994Z" fill="#F1F1F1"/>
                        <path d="M31.1992 16.8008L47.9997 33.3017V18.0003L31.1992 16.8008Z" fill="url(#paint0_linear_462_256)"/>
                        <path d="M30 0V13.4996C30 15.8987 32.0991 18.0004 34.5006 18.0004H48L30 0Z" fill="#B39DDB"/>
                        <path d="M4.50063 0C2.09912 0 0 2.09916 0 4.50072V4.8006C0 2.39904 2.09912 0.29988 4.50063 0.29988H30V0H4.50063Z" fill="white" fill-opacity="0.2"/>
                        <path d="M43.4994 62.7002H4.50063C2.09912 62.7002 0 60.601 0 58.1995V58.4993C0 60.8984 2.09912 63.0001 4.50063 63.0001H43.4994C45.8984 63.0001 48 60.9009 48 58.4993V58.1995C48 60.601 45.8984 62.7002 43.4994 62.7002Z" fill="#311B92" fill-opacity="0.2"/>
                        <path d="M34.4977 18.0005C32.0987 18.0005 29.9971 15.9013 29.9971 13.4998V13.7996C29.9971 16.1987 32.0962 18.3004 34.4977 18.3004H47.9971V18.0005H34.4977Z" fill="#311B92" fill-opacity="0.1"/>
                        <path d="M30 0H4.50063C2.09912 0 0 2.09916 0 4.50072V58.5018C0 60.9008 2.09912 63.0025 4.50063 63.0025H43.4994C45.8984 63.0025 48 60.9034 48 58.5018V18.0004L30 0Z" fill="url(#paint1_radial_462_256)"/>
                        </g>
                        <defs>
                        <linearGradient id="paint0_linear_462_256" x1="39.5984" y1="18.114" x2="39.5984" y2="33.3648" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#311B92" stop-opacity="0.2"/>
                        <stop offset="1" stop-color="#311B92" stop-opacity="0.02"/>
                        </linearGradient>
                        <radialGradient id="paint1_radial_462_256" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(1.51855 1.68135) scale(619.141 619.148)">
                        <stop stop-color="white" stop-opacity="0.1"/>
                        <stop offset="1" stop-color="white" stop-opacity="0"/>
                        </radialGradient>
                        <clipPath id="clip0_462_256">
                        <rect width="48" height="63" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                    <a href="https://forms.gle/wDrBRnkoWqtNcD2P6" target="_blank" class="btn" style="font-size:12px;">Click Here</a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const form = document.getElementById('membership-singup-form');
        
        const submitBtn = document.querySelector('.btn-submit');
        const infoDone = document.querySelector('.info-done');
        const cardo = document.querySelector('.confetti-wrapper');

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
            companyname = document.getElementById("companyname").value;
            funct = document.getElementById("funct").value;
            department = document.getElementById("department").value;
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
                    "companyname":companyname,
                    "funct":funct,
                    "department":department,
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