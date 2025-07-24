<div class="content-container admin-emails-index">
    @php
        $email_type = ["event","membership","contact"];
    @endphp

    @foreach($email_type as $value)
        <!-- Header -->
        <div class="mb-4">
            <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
                ADMIN EMAILS {{strtoupper($value)}}
            </div>
        </div>
        <form class="w-50 mb-4">
            <input type="hidden" for="{{$value}}">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Email #1</label>
                <div class="col-sm-9">
                    <input type="email" name="adminemail" class="form-control" placeholder="Email address #1">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Email #2</label>
                <div class="col-sm-9">
                    <input type="email" name="adminemail" class="form-control" placeholder="Email address #2">
                </div>
            </div>
            <div class="mb-4 row">
                <label class="col-sm-3 col-form-label">Email #3</label>
                <div class="col-sm-9">
                    <input type="email" name="adminemail" class="form-control" placeholder="Email address #3">
                </div>
            </div>

            <button type="submit" class="submit-btn">CONFIRM</button>
        </form>
    @endforeach
</div>

<script get-admin-emails>
    function getAdminEmails(){
        this_form = document.querySelectorAll("div.admin-emails-index form");

        fetchData(
            "{{route('list-email-admin',1)}}",
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
            row_data = data["data"];
            this_form.forEach((el) => {
                emailfor = el.querySelector(`input[type="hidden"]`).getAttribute("for");
                if(typeof row_data[emailfor] != 'undefined'){
                    list_data = row_data[emailfor];

                    el.querySelectorAll("input[name='adminemail']").forEach((el2,index)=>{
                        // for(key in row_data){
                            // if((email_admin["ordering"]-1) == index){
                            if(list_data[index]){
                                el2.value = list_data[index];
                            }
                            // }
                        // }
                    })
                }
            })
            // this_form.querySelectorAll("input[name='adminemail']").forEach((el,index)=>{
            //     for(key in row_data){
            //         email_admin = row_data[key];
            //         if((email_admin["ordering"]-1) == index){
            //             el.value = email_admin["emails"];
            //         }
            //     }
            // })
        });   
    }

    document.addEventListener("DOMContentLoaded",function(){
        if(document.querySelector(".content-container.admin-emails-index")){
            getAdminEmails();
        }
    })
</script>
<script submit-admin-emails>
    emailadmin_form = document.querySelectorAll("div.admin-emails-index form");

    emailadmin_form.forEach((el,index) => {
        el.addEventListener("submit",function(event){
            event.preventDefault()

            formdata = new FormData;
            formdata.append("emailfor",this.querySelector("input[type='hidden']").getAttribute("for"));
            this.querySelectorAll("input[name='adminemail']").forEach((el,index) => {
                formdata.append(`email[${index}]`,el.value);
            })
            
            fetchData(
                "{{route('store-email-admin')}}",
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
                alert("OK")
            });

            return false;
        })
    })
</script>