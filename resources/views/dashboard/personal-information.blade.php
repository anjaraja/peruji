<div class="content-container personal-information-index">
    <div class="row mb-4">
        <div class="col-md-12">
            @php $default_profile = asset('dash-img/default-profile.png'); @endphp
            <div class="profile-photo header-personal" exist-photo="not-exists" style="background: url('{{$default_profile}}') center center / cover no-repeat;"></div>
            <p class="m-0 mt-3 fw-bolder text-black" for="member-name"></p>
            <p class="m-0 fw-bolder text-black" for="member-number"></p>
        </div>
    </div>
    <!-- Header -->
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            PERSONAL INFORMATION
        </div>
    </div>
    <form class="personal-information-member">
        <div class="row g-3 mt-2 mb-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Prefix</label>
                    <input type="text" class="form-control" name="prefix" placeholder="Gelar: Prof. / dr. / Dr. / dll.">
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fullname">
                </div>
                <div class="form-group">
                    <label>Suffix</label>
                    <input type="text" class="form-control" placeholder="Gelar: S. Ked. / SH / MM / AAIJ / dll." name="suffix">
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" placeholder="Tanggal / Bulan / Tahun" name="dob">
                </div>
                <div class="form-group">
                    <label>Hobby</label>
                    <input type="text" class="form-control" placeholder="Badminton, Padel, Running, Marathon" name="hobby">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="nama@contoh.com" name="email">
                </div>
                <div class="form-group">
                    <label>Upload Photo</label>
                    <input type="file" class="form-control" name="photo">
                    <input type="hidden" name="memberid">
                    <input type="hidden" name="userprofileid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Organization</label>
                     <input type="text" class="form-control" placeholder="Nama Perusahaan" name="organization">
                </div>
                <div class="form-group">
                    <label>Title</label>
                     <input type="text" class="form-control" placeholder="Jabatan" name="funct">
                </div>
                <div class="form-group">
                    <label>Work Address</label>
                    <input type="text" class="form-control" placeholder="Alamat Perusahaan" name="ofcaddress">
                </div>
                <div class="form-group">
                    <label>Work Phone</label>
                    <input type="text" class="form-control" name="ofcphone">
                </div>
                <div class="form-group">
                    <label>Work Email</label>
                    <input type="email" class="form-control" placeholder="nama@perusahaan.com" name="ofcemail">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="url" class="form-control" placeholder="www.example.com" name="website">
                </div>
            </div>
        </div>
        <div class="row g-3 mt-2">
            <div class="col-12">
                <button class="btn btn-orange px-4">UPDATE</button>
            </div>
        </div>
    </form>
</div>
<script edit-script>
    const showPersonalInformation = function(){
        responseData = {}
        fetchData(
            "{{route('detail-membership-me')}}",
            "GET",
            {"Authorization":localStorage.getItem("Token")}
        )
        .then((response)=>{
            if (response.status !== 200){
                showAlert("not-ok","get")
                return response.json();
            }
            return response.json();
        })
        .then((data)=>{
            responseData = data["data"];
        })
        .finally(()=>{
            personal_information = document.querySelector("form.personal-information-member");

            personal_information.querySelector("input[name='memberid']").value = responseData?.memberid;
            personal_information.querySelector("input[name='userprofileid']").value = responseData?.userprofileid || "";
            personal_information.querySelector("input[name='prefix']").value = responseData?.prefix;
            personal_information.querySelector("input[name='organization']").value = responseData?.organization;
            personal_information.querySelector("input[name='fullname']").value = responseData?.fullname;
            personal_information.querySelector("input[name='ofcaddress']").value = responseData?.ofcaddress;
            personal_information.querySelector("input[name='suffix']").value = responseData?.suffix;
            personal_information.querySelector("input[name='ofcphone']").value = responseData?.ofcphone;
            personal_information.querySelector("input[name='dob']").value = responseData?.dob;
            personal_information.querySelector("input[name='hobby']").value = responseData?.hobby;
            personal_information.querySelector("input[name='ofcemail']").value = responseData?.ofcemail;
            personal_information.querySelector("input[name='phone']").value = responseData?.phone;
            personal_information.querySelector("input[name='website']").value = responseData?.website;
            personal_information.querySelector("input[name='email']").value = responseData?.email;
            personal_information.querySelector("input[name='funct']").value = responseData?.funct;

            name_with_prefix = (responseData?.prefix?responseData.prefix+" ":"")+responseData?.fullname+(responseData?.suffix?" "+responseData.suffix:"");
            document.querySelector("p[for='member-name']").textContent = name_with_prefix;
            document.querySelector("p[for='member-number']").textContent = "No. "+responseData?.number??'-';
            if(responseData["photo"]){
                document.querySelector(".profile-photo.header-personal").setAttribute("exist-photo","exists");
                document.querySelector(".profile-photo.header-personal").style = `background: url('${responseData['photo']}') center center / cover no-repeat;`;
                // input_photo = personal_information.querySelector("input[name='photo']");
                // input_photo.style.display = 'none';
                // input_photo.closest("div[class*='col-md']").querySelector("div[preview-file]")?.remove();
                // input_photo.closest("div[class*='col-md']").insertAdjacentHTML("beforeend",`
                //     <div preview-file>
                //         <div class="form-control" style="border:none;">
                //             <img src="${responseData['photo']}" style="max-width:180px;">
                //         </div>
                //         <span class="btn btn-danger" for="delete-preview-file">
                //             <i class="bi text-white">
                //                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                //                     <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                //                 </svg>
                //             </i> Delete
                //         </span>
                //     </div>
                // `)
            }
            else{
                document.querySelector(".profile-photo.header-personal").setAttribute("exist-photo","not-exists");
            }
            // photo = personal_information.querySelector("input[name='photo']").files[0];
            // if(!photo){
            //     input_photo = personal_information.querySelector("input[name='photo']");
            //     exist_photo = input_photo.closest("div.mb-3").querySelector("div[preview-file]");

            //     if(!exist_photo){
            //         formdata.append("delete_photo",true);
            //     }
            // }
            // else{
            //     formdata.append("photo",photo);
            // }
            // personal_information.querySelector("input[name='photo']").value = responseData?.photo;

            // membership_status = document.querySelector("form.membership-status");
            // membership_status.querySelector("input[name='joindate']").value = responseData?.joindate;
            // membership_status.querySelector("input[name='expiredate']").value = responseData?.expiredate;
            // membership_status.querySelector("input[name='number']").value = responseData?.number;
            // membership_status.querySelector("input[name='status']").value = responseData?.status;
        });
    }
    document.addEventListener("DOMContentLoaded",function(){
        if(document.querySelector("form.personal-information-member")){
            showPersonalInformation()
        }
    })
</script>
<script>
    personal_information = document.querySelector("form.personal-information-member");

    personal_information.addEventListener("submit",function(e){
        e.preventDefault();
        loading("show");

        thisform = this;

        formdata = new FormData;

        prefix = this.querySelector("input[name='prefix']").value
        formdata.append("prefix",prefix)
        organization = this.querySelector("input[name='organization']").value
        formdata.append("organization",organization)
        fullname = this.querySelector("input[name='fullname']").value
        formdata.append("fullname",fullname)
        ofcaddress = this.querySelector("input[name='ofcaddress']").value
        formdata.append("ofcaddress",ofcaddress)
        suffix = this.querySelector("input[name='suffix']").value
        formdata.append("suffix",suffix)
        ofcphone = this.querySelector("input[name='ofcphone']").value
        formdata.append("ofcphone",ofcphone)
        dob = this.querySelector("input[name='dob']").value
        formdata.append("dob",dob)
        hobby = this.querySelector("input[name='hobby']").value
        formdata.append("hobby",hobby)
        ofcemail = this.querySelector("input[name='ofcemail']").value
        formdata.append("ofcemail",ofcemail)
        phone = this.querySelector("input[name='phone']").value
        formdata.append("phone",phone)
        website = this.querySelector("input[name='website']").value
        formdata.append("website",website)
        email = this.querySelector("input[name='email']").value
        formdata.append("email",email)
        funct = this.querySelector("input[name='funct']").value
        formdata.append("funct",funct)
        photo = this.querySelector("input[name='photo']").files[0]
        if(!photo){
            input_photo = this.querySelector("input[name='photo']");
            // exist_photo = input_photo.closest("div[class*='col-md']").querySelector("div[preview-file]");
            exist_photo = document.querySelector(".profile-photo.header-personal").getAttribute("exist-photo");

            // if(!exist_photo){
            if(exist_photo != "exists"){
                formdata.append("delete_photo",true);
            }
        }
        else{
            formdata.append("photo",photo);
        }


        memberid = document.querySelector(".modal-footer input[name='memberid']").value
        formdata.append("member",memberid);

        fetchData(
            "{{route('member-update-membership-personal-information')}}",
            "POST",
            {"Authorization":localStorage.getItem("Token")},
            formdata
        )
        .then((response)=>{
            if (response.status !== 200){
                showAlert("not-ok","updated")

                return response.json();
            }

            showAlert("ok","updated")
            return response.json();
        })
        .then((data)=>{
            loading("close",500);
        })
        .finally(() =>{
            thisform.querySelector("input[name='photo']").value = ""
            showPersonalInformation()
            documentAndResources()
        });

        return false;
    })
</script>
