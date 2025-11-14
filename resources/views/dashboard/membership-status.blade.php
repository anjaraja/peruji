<div class="content-container membership-status-index">
    <!-- Header -->
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            MEMBERSHIP STATUS
        </div>
    </div>
    <form class="section-box membership-status-member">
        <div class="row g-3 mt-2">
            <div class="col-md-6">
                <label>Join Date</label>
                <input type="text" class="form-control" placeholder="Day / Month / Year" name="joindate" disabled>
            </div>
            <div class="col-md-6">
                <label>Number</label>
                <input type="text" class="form-control" name="number" disabled>
            </div>
            <div class="col-md-6">
                <label>Expiry Date</label>
                <input type="text" class="form-control" placeholder="Day / Month / Year" name="expiredate" disabled>
            </div>
            <div class="col-md-6">
                <label>Status</label>
                <input type="text" class="form-control" placeholder="Active / Pending / Expired" name="status" disabled>
            </div>
        </div>
    </form>
</div>
<script>
    showMembershipStatus = function(){
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
            sessionStorage.setItem("currentTitle",responseData?.title);
        })
        .finally(()=>{
            membership_status = document.querySelector("form.membership-status-member");
            membership_status.querySelector("input[name='joindate']").value = responseData?.joindate;
            membership_status.querySelector("input[name='expiredate']").value = responseData?.expiredate;
            membership_status.querySelector("input[name='number']").value = responseData?.number;
            membership_status.querySelector("input[name='status']").value = responseData?.status;
        });
    }
    document.addEventListener("DOMContentLoaded",function(){
        if(document.querySelector("form.membership-status-member")){
            showMembershipStatus()
        }
    })
</script>