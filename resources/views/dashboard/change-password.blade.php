<div class="content-container change-password-index">
    <!-- Header -->
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            CHANGE PASSWORD
        </div>
    </div>
    <form class="row g-3 mt-2">
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Old Password</label>
                <input type="password" class="form-control" placeholder="Type the old password" name="old_password">
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>New Password</label>
                <input type="password" class="form-control" placeholder="Type the new password" name="new_password">
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label>Confirm New Password</label>
                <input type="password" class="form-control" placeholder="Type the new password" name="confirm_new_password">
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-orange px-4">UPDATE</button>
        </div>
    </form>
</div>

<script>
    change_password = document.querySelector(".content-container.change-password-index form");

    change_password.addEventListener("submit",function(e){
        e.preventDefault();
        loading("show");

        new_password = this.querySelector("input[name='new_password']").value;
        conf_new_password = this.querySelector("input[name='confirm_new_password']");
        if(new_password !== conf_new_password.value){
            loading("close",500);
            conf_new_password.closest("div").insertAdjacentHTML("beforeend",`
                <div class="invalid-feedback" style="display:block;">
                    New password is not match
                </div>`);
            return false;
        }
        conf_new_password.closest("div").querySelector(".invalid-feedback")?.remove();
        thisform = this;

        formdata = new FormData;

        new_password = this.querySelector("input[name='new_password']").value
        formdata.append("new_password",new_password)
        old_password = this.querySelector("input[name='old_password']").value
        formdata.append("old_password",old_password)

        fetchData(
            "{{route('change-password-member')}}",
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
            thisform.reset()
        });

        return false;
    })
</script>