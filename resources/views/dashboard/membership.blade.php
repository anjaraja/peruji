<style>
    :root {
      --bs-primary: #f7941d;
      --bs-secondary: #666;
    }

    body {
      color: var(--bs-secondary);
    }

    table.clean-table {
      border-collapse: collapse;
      width: 100%;
    }

    table.clean-table th,
    table.clean-table td {
      padding: 12px 8px;
      border-bottom: 1px solid #ddd;
    }

    table.clean-table th {
      font-weight: 600;
      color: var(--bs-secondary);
    }

    .action-icons i {
      cursor: pointer;
      margin-right: 10px;
      color: var(--bs-secondary);
      transition: color 0.2s;
    }

    .action-icons i:hover {
      color: var(--bs-primary);
    }

    .page-arrow {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 38px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1.1rem;
      color: #f7941d;
      cursor: pointer;
      transition: background 0.2s;
    }

    .page-arrow:hover {
      background-color: #f7f7f7;
    }

    .page-arrow.disabled {
      opacity: 0.4;
      pointer-events: none;
    }

    .form-control.page-input {
      width: 80px;
      text-align: center;
    }

    /*Form Membership*/
        .section-header {
          background-color: #f7941d;
          color: white;
          padding: 8px 16px;
          font-weight: bold;
          letter-spacing: 2px;
        }
        .section-box {
          background: #fff;
          padding: 20px;
          margin-bottom: 30px;
        }
        label {
          font-weight: 500;
        }
        .ecard-img {
          width: 150px;
          height: auto;
          display: block;
        }
        .btn-orange {
          background-color: #f7941d;
          border: none;
          color: white;
        }
        .btn-orange:hover {
          background-color: #d97e17;
        }

        #membershipModal .list-unstyled{
        	min-height: 155px;
        }
    /*End FOrm Membership*/
</style>
<div class="modal fade" id="delete-member-confirmation" tabindex="-1">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title">DELETE MEMBER</h5>
      		</div>
	      	<div class="modal-body">
	        	<p>Are you sure want to delete?</p>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
	        	<button type="button" class="btn btn-danger" action-for="delete">Yes, delete</button>
	      	</div>
    	</div>
  	</div>
</div>
<div class="modal fade" id="membershipModal" tabindex="-1" role="dialog" aria-labelledby="membershipModalTitle" aria-hidden="true">
  	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          	<div class="modal-header">
	            <h5 class="modal-title" id="membershipModalLongTitle">MEMBERSHIP DETAIL</h5>
              	<button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
          	</div>
          	<div class="modal-body">
	            <form class="section-box personal-information">
	              	<div class="section-header">PERSONAL INFORMATION</div>
	          		<div class="row g-3 mt-2 mb-4">
		                <div class="col-md-6">
		                  	<label>Prefix</label>
		                  	<input type="text" class="form-control" name="prefix" placeholder="Prof. / dr. / Dr. / dll.">
		                </div>
		                <div class="col-md-6">
			                <label>Organization</label>
			                 <input type="text" class="form-control" placeholder="Company" name="organization">
		                </div>
		                <div class="col-md-6">
		                 	<label>Full Name</label>
		                 	<input type="text" class="form-control" placeholder="Day / Month / Year" name="fullname">
		                </div>
		                <div class="col-md-6">
		                  	<label>Gender</label>
				                <select class="form-control" name="gender" required>
				                    <option value="">--Gender--</option>
				                    <option value="M">Male</option>
				                    <option value="F">Female</option>
				                </select>
		                </div>
		                <div class="col-md-6">
		                  	<label>Work Address</label>
		                  	<input type="text" class="form-control" placeholder="Company Address" name="ofcaddress">
		                </div>
		                <div class="col-md-6">
		                  	<label>Function</label>
		                  	<input type="text" class="form-control" placeholder="Function" name="function">
		                </div>
		                <div class="col-md-6">
		                  	<label>Department</label>
		                  	<input type="text" class="form-control" placeholder="Department" name="department">
		                </div>
		                <div class="col-md-6">
		                  	<label>Suffix</label>
		                  	<input type="text" class="form-control" placeholder="Gelar: S. Ked. / SH / MM / AAIJ / dll." name="suffix">
		                </div>
		                <div class="col-md-6">
		                  	<label>Work Phone</label>
		                  	<input class="form-control" name="ofcphone" type="tel" inputmode="numeric" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
		                </div>
		                <div class="col-md-6">
		                  	<label>Date of Birth</label>
		                  	<input type="date" class="form-control" placeholder="Day / Month / Year" name="dob">
		                </div>
		                <div class="col-md-6">
		                  	<label>Hobby</label>
		                  	<input type="text" class="form-control" placeholder="Badminton, Padel, Running, Marathon" name="hobby">
		                </div>
		                <div class="col-md-6">
		                  	<label>Work Email</label>
		                  	<input type="email" class="form-control" name="ofcemail">
		                </div>
		                <div class="col-md-6">
		                  	<label>Phone</label>
		                  	<input class="form-control" name="phone" type="tel" inputmode="numeric" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
		                </div>
		                <div class="col-md-6">
		                  	<label>Website</label>
		                  	<input type="url" class="form-control" placeholder="www.example.com" name="website">
		                </div>
		                <div class="col-md-6">
		                  	<label>Email</label>
		                  	<input type="email" class="form-control" name="email">
		                </div>
		                <div class="col-md-6">
		                  	<label>Upload Photo</label>
		                  	<input type="file" class="form-control" name="photo" accept="image/png, image/jpeg, image/gif">
		                </div>
	          		</div>
	              	<div class="section-header">DOCUMENT & RESOURCES</div>
		            <div class="row g-3 mt-2 mb-4 align-items-start">
		                <div class="col-md-6">
				          	<h5 class="text-warning fw-bold mb-3">E-Card</h5>
		                  	<div class="card-container mb-3" id="cardPreview">
							    <div src="" id="previewPhoto" class="profile-photo"></div>
							    <div class="right-info">
							      	<div class="info-name" id="previewName">AIMAN HARITH NASIR</div>
							      	<div class="info-details">
							        	MANAGEMENT
						      		</div>
							      	<div class="info-details number">
							        	0123456789
						      		</div>
							    </div>
						  	</div>
						  	<a href="#" onclick="downloadPNG(this)" class="btn btn-orange px-4">Download</a>
		                </div>
		                <div class="col-md-6">
				          	<h5 class="text-warning fw-bold mb-3">Certificates</h5>
				          	<div class="bg-light p-3 rounded shadow-sm">
					            <ul class="list-unstyled list-of-certificate-member">
					            	<!-- <li class="text-black row-previous-event" style="cursor:pointer;" id="">Certificate IUS 2020</li> -->
					            </ul>
				          	</div>

			                <div class="row mt-4">
			                	<div class="col-md-6">				                		
				                  	<label>Certificate</label>
				                  	<input type="file" class="form-control" name="certificate" accept=".pdf">
			                	</div>
				                <div class="col-md-6">
				                  	<label>Certificate Name</label>
				                  	<input type="text" class="form-control" name="certificate-name">
				                </div>
				                <div class="col-md-12 mt-4">
				                  	<a href="#" class="btn btn-orange add-certificate">Upload</a>
				                </div>
			                </div>
		                </div>
	          		</div>
	          		<div class="section-header">MEMBERSHIP STATUS *</div>
	          		<div class="row g-3 mt-2">
			            <div class="row g-3 mt-2">
			                <div class="col-md-6">
			                  	<label>Join Date</label>
			                  	<input type="date" class="form-control" placeholder="Day / Month / Year" name="joindate" required>
			                </div>
			                <div class="col-md-6">
			                  	<label>Expiry Date</label>
			                  	<input type="date" class="form-control" placeholder="Day / Month / Year" name="expiredate" required>
			                </div>
			                <div class="col-md-6">
			                  	<label>Number</label>
			                  	<input type="text" class="form-control" name="number" required>
			                </div>
			                <div class="col-md-6">
			                  	<label>Status</label>
				                <select class="form-control" name="status" required>
				                    <option value="">--Active/Pending/Expired--</option>
				                    <option value="active">Active</option>
				                    <option value="pending">Pending</option>
				                    <option value="expired">Expired</option>
				                </select>
			                  	<!-- <input type="text" class="form-control" placeholder="Active / Pending / Expired" name="status"> -->
			                </div>
			                <div class="col-md-6">
			                  	<label>Title</label>
				                <select class="form-control" name="title" required>
				                    <option value="">--Select Title--</option>
				                    <option value="member">Regular</option>
				                    <option value="special">Special</option>
				                    <option value="priority">Priority</option>
				                    <option value="management">Management</option>
				                </select>
			                  	<!-- <input type="text" class="form-control" placeholder="Active / Pending / Expired" name="status"> -->
			                </div>
		              	</div>
          			</div>
	          		<div class="row g-3 mt-2">
		                <div class="col-12">
		                  	<button class="btn btn-orange px-4">VERIFIED & SEND EMAIL SETUP PASSWORD</button>
		                </div>
	                </div>
	        	</form>

	        	<!-- MEMBERSHIP STATUS -->
	        	<!-- <form class="section-box membership-status">
	          		<div class="section-header">MEMBERSHIP STATUS</div>
		            <div class="row g-3 mt-2">
		                <div class="col-md-6">
		                  	<label>Join Date</label>
		                  	<input type="text" class="form-control" placeholder="Day / Month / Year" name="joindate">
		                </div>
		                <div class="col-md-6">
		                  	<label>Expiry Date</label>
		                  	<input type="text" class="form-control" placeholder="Day / Month / Year" name="expiredate">
		                </div>
		                <div class="col-md-6">
		                  	<label>Number</label>
		                  	<input type="text" class="form-control" name="number">
		                </div>
		                <div class="col-md-6">
		                  	<label>Status</label>
		                  	<input type="text" class="form-control" placeholder="Active / Pending / Expired" name="status">
		                </div>
		                <div class="col-12">
		                  	<a href="#" class="btn btn-orange px-4">RENEW</a>
		                </div>
	              	</div>
	        	</form> -->

	            <!-- CHANGE PASSWORD -->
	            <!-- <form class="section-box">
		            <div class="section-header">CHANGE PASSWORD</div>
		            <div class="row g-3 mt-2">
		                <div class="col-md-6">
		                  	<label>Old Password</label>
		                  	<input type="password" class="form-control" placeholder="Type the old password">
		                </div>
		                <div class="col-md-6"></div>
		                <div class="col-md-6">
		                  	<label>New Password</label>
		                  	<input type="password" class="form-control" placeholder="Type the new password">
		                </div>
		                <div class="col-md-6">
		                  	<label>New Password</label>
		                  	<input type="password" class="form-control" placeholder="Type the new password">
		                </div>
		                <div class="col-12">
		                  	<button class="btn btn-orange px-4">CONFIRM</button>
		                  	<button class="btn btn-orange px-4">SEND LINK PASSWORD TO EMAIL</button>
		                </div>
		            </div>
	            </form> -->
          	</div>
          	<div class="modal-footer">
          		<input type="hidden" name="memberid">
          		<input type="hidden" name="userprofileid">
	            <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal" aria-label="Close">Close</button>
	            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          	</div>
        </div>
  	</div>
</div>
<div class="content-container membership-index">
    <!-- Header -->
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            MEMBERSHIP
        </div>
    </div>
    <div class="table-responsive">
        <table class="clean-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Register Date</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Dynamic rows -->
            </tbody>
        </table>
    </div>

    <div class="d-flex align-items-center mt-3 page-control-wrapper justify-content-center">
      <div id="prevPage" class="page-arrow" title="Previous">
        <i class="bi bi-chevron-left"></i>
      </div>

      <input type="number" class="form-control page-input" id="pageInput" value="1" min="1">

      <div id="nextPage" class="page-arrow" title="Next">
        <i class="bi bi-chevron-right"></i>
      </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
	document.addEventListener("DOMContentLoaded",function(){
        modalElement = document.getElementById('membershipModal');
        membershipModal = new bootstrap.Modal(modalElement);

        confirmDeleteModalElement = document.getElementById('delete-member-confirmation');
        confirmDeleteModal = new bootstrap.Modal(confirmDeleteModalElement);

        this.querySelectorAll(".close-modal").forEach(function(thisEl){
        	thisEl.addEventListener("click",function(){
        		membershipModal.hide();
        	})
        })
	})
</script>
<script>
    let currentPageMembership = 1;
    const rowsPerPageMembership = 10;
    totalRowsMembership = 0; // simulate from backend
    totalPagesMembership = Math.ceil(totalRowsMembership / rowsPerPageMembership);

    const pageInputMembership = document.querySelector('.membership-index #pageInput');
    const prevPageMembership = document.querySelector('.membership-index #prevPage');
    const nextPageMembership = document.querySelector('.membership-index #nextPage');

    // Simulate API call
    // function fetchDataFromAPI(page) {
    //   return new Promise((resolve) => {
    //     setTimeout(() => {
    //       resolve(data);
    //     }, 250);
    //   });
    // }

    async function loadPage(page) {
      // Load data
        const data = await asyncFetchData(
            "{{route('list-membership','')}}/"+page,
            "GET",
            {"Authorization":localStorage.getItem("Token")}
        );
        row_data = data.data.data
        totalRowsMembership = data.data.total
        totalPagesMembership = data.data.last_page
        renderTable(row_data,page);

        if (isNaN(page) || page < 1) page = 1;
        if (page > totalPagesMembership) page = totalPagesMembership;
        
        currentPageMembership = page;
        pageInputMembership.value = currentPageMembership;

        // Arrow states
        if(currentPageMembership === 1){
        	pageInputMembership.setAttribute('disabled', 'disabled');
        }
        prevPageMembership.classList.toggle('disabled', currentPageMembership === 1);
        nextPageMembership.classList.toggle('disabled', currentPageMembership === totalPagesMembership);
    }

    function renderTable(data,page=1) {
      const tbody = document.querySelector('.membership-index #tableBody');
      tbody.innerHTML = '';
      data.forEach((row, index) => {
      	rowNumber = page==1?page:page+9;
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${rowNumber+index}</td>
          <td>${row.fullname}</td>
          <td>${row.email}</td>
          <td>${row.registered_date}</td>
          <td>${row.status}</td>
          <td class="text-center action-icons">
            <i class="bi bi-pencil-square" title="Edit" onclick="editRow(${row.membership})"></i>
            <i class="bi bi-trash3-fill text-danger" title="Delete" onclick="deleteRow(${row.membership})"></i>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    // Events
    pageInputMembership.addEventListener('change', () => {
      loadPage(parseInt(pageInputMembership.value));
    });

    prevPageMembership.addEventListener('click', () => {
      if (currentPageMembership > 1) loadPage(currentPageMembership - 1);
    });

    nextPageMembership.addEventListener('click', () => {
      if (currentPageMembership < totalPagesMembership) loadPage(currentPageMembership + 1);
    });

    // Initial
    document.addEventListener("DOMContentLoaded",function(){
    	if(document.querySelector(".content-container.membership-index")){
    		loadPage(currentPageMembership);
    	}
    })
</script>
<script edit-script>
    editRow = function(id, isRecall=false){
        if(!isRecall) membershipModal.show()

        responseData = {}
        fetchData(
            "{{route('detail-membership','')}}/"+id,
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
        	document.querySelector(".modal-footer input[name='memberid']").value = responseData?.memberid;
        	document.querySelector(".modal-footer input[name='userprofileid']").value = responseData?.userprofileid || "";

        	personal_information = document.querySelector("form.personal-information");
        	personal_information.querySelector("input[name='prefix']").value = responseData?.prefix;
        	personal_information.querySelector("input[name='organization']").value = responseData?.organization;
        	personal_information.querySelector("input[name='fullname']").value = responseData?.fullname;
        	personal_information.querySelector("select[name='gender']").value = responseData?.gender;
        	personal_information.querySelector("input[name='ofcaddress']").value = responseData?.ofcaddress;
        	personal_information.querySelector("input[name='function']").value = responseData?.funct;
        	personal_information.querySelector("input[name='department']").value = responseData?.department;
        	personal_information.querySelector("input[name='suffix']").value = responseData?.suffix;
        	personal_information.querySelector("input[name='ofcphone']").value = responseData?.ofcphone;
        	personal_information.querySelector("input[name='dob']").value = responseData?.dob;
        	personal_information.querySelector("input[name='hobby']").value = responseData?.hobby;
        	personal_information.querySelector("input[name='ofcemail']").value = responseData?.ofcemail;
        	personal_information.querySelector("input[name='phone']").value = responseData?.phone;
        	personal_information.querySelector("input[name='website']").value = responseData?.website;
        	personal_information.querySelector("input[name='email']").value = responseData?.email;
        	personal_information.querySelector("ul.list-of-certificate-member").innerHTML = "";
        	if(responseData?.additionaldocument){
	        	for (value of responseData?.additionaldocument){
	        		personal_information.querySelector("ul.list-of-certificate-member").insertAdjacentHTML("beforeend",`<li class="row-certificate" style="cursor:pointer;"><a href="${value.path}" target="_BLANK">${value.name}</a></li>`)
	        	}	
        	}
            if(responseData["photo"]){
                input_photo = personal_information.querySelector("input[name='photo']");
                input_photo.style.display = 'none';
                input_photo.closest("div[class*='col-md']").querySelector("div[preview-file]")?.remove();
                input_photo.closest("div[class*='col-md']").insertAdjacentHTML("beforeend",`
                    <div preview-file>
                        <div class="form-control" style="border:none;padding-left:0;">
                            <img src="${responseData['photo']}" style="max-width:180px">
                        </div>
                        <span class="btn btn-danger" for="delete-preview-file">
                            <i class="bi text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                </svg>
                            </i> Delete
                        </span>
                    </div>
                `)
            }

        	card_container = personal_information.querySelector(".card-container");
        	card_container.querySelector(".profile-photo").style.backgroundImage = `url("${responseData["photo"]}")`;
        	card_container.querySelector(".info-name").innerHTML = responseData["fullname"]?.toUpperCase();
        	title = responseData["title"]?.toUpperCase();
        	if(typeof title === "undefined"){
        		title = "";
        	}
        	card_container.querySelector(".info-details").innerHTML =  title=="MEMBER"?"REGULAR":title;
        	if(responseData["title"] == "management" || responseData["title"] == "priority"){
        		card_container.style.backgroundImage = `url("{{asset('dash-img/management-card.png')}}")`;
        	}
        	else{
        		card_container.style.backgroundImage = `url("{{asset('dash-img/regular-card.png')}}")`;
        	}
    		card_container.style.backgroundPosition = `center`;
    		card_container.style.backgroundRepeat = ` no-repeat`;
    		card_container.style.backgroundSize = `cover`;
        	card_container.querySelector(".info-details.number").innerHTML = responseData["number"];
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
            if(typeof responseData['joindate'] !== "undefined"){
            	if(responseData['joindate']){
            		personal_information.querySelector("button").innerHTML = "UPDATE";
            	}
            	else{
            		personal_information.querySelector("button").innerHTML = "VERIFIED & SEND EMAIL SETUP PASSWORD";
            	}
            }
        	personal_information.querySelector("input[name='joindate']").value = responseData?.joindate;
        	personal_information.querySelector("input[name='expiredate']").value = responseData?.expiredate;
        	personal_information.querySelector("input[name='number']").value = responseData?.number;
        	personal_information.querySelector("select[name='status']").value = responseData?.status;
        	personal_information.querySelector("select[name='title']").value = responseData?.title;
        });
    }

    function downloadPNG(thisbtn) {
      html2canvas(
      		thisbtn.closest("div").querySelector(".card-container"), 
      		{
      			scale:10,
  				backgroundColor:null
  			}
		)
      	.then(canvas => {
	        const link = document.createElement("a");
	        link.download = "membership-card.png";
	        link.href = canvas.toDataURL("image/jpeg", 1.0);
	        link.click();
     	 }
 	 );
    }
</script>
<script>
	personal_information = document.querySelector("form.personal-information");

	personal_information.addEventListener("submit",function(e){
		e.preventDefault();
		loadingModal("show",null,document.getElementById("membershipModal"));

		thisform = this;

		formdata = new FormData;

        prefix = this.querySelector("input[name='prefix']").value
        formdata.append("prefix",prefix)
        organization = this.querySelector("input[name='organization']").value
        formdata.append("organization",organization)
        fullname = this.querySelector("input[name='fullname']").value
        formdata.append("fullname",fullname)
        gender = this.querySelector("select[name='gender']").value
        formdata.append("gender",gender)
        ofcaddress = this.querySelector("input[name='ofcaddress']").value
        formdata.append("ofcaddress",ofcaddress)
        funct = this.querySelector("input[name='function']").value
        formdata.append("funct",funct)
        department = this.querySelector("input[name='department']").value
        formdata.append("department",department)
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
        photo = this.querySelector("input[name='photo']").files[0]
        if(!photo){
            input_photo = this.querySelector("input[name='photo']");
            exist_photo = input_photo.closest("div[class*='col-md']").querySelector("div[preview-file]");

            if(!exist_photo){
                formdata.append("delete_photo",true);
            }
        }
        else{
            formdata.append("photo",photo);
        }

        joindate = this.querySelector("input[name='joindate']").value
        formdata.append("joindate",joindate)
        expiredate = this.querySelector("input[name='expiredate']").value
        formdata.append("expiredate",expiredate)
        number = this.querySelector("input[name='number']").value
        formdata.append("number",number)
        status = this.querySelector("select[name='status']").value
        formdata.append("status",status)
        title = this.querySelector("select[name='title']").value
        formdata.append("title",title)

        memberid = document.querySelector(".modal-footer input[name='memberid']").value
        formdata.append("member",memberid);

        fetchData(
            "{{route('update-membership-personal-information')}}",
            "POST",
            {"Authorization":localStorage.getItem("Token")},
            formdata
        )
        .then(async (response)=>{
            loadingModal("close",500,document.getElementById("membershipModal"));

          	result = await response.json();
            if (response.status !== 200){
                showAlert("not-ok","updated",result.message)

                return response.json();
            }

            showAlert("ok","updated");
            thisform.querySelector("input[name='photo']").value = ""
          	editRow(memberid,true);
            return response.json();
        });

		return false;
	})
</script>
<script add-certificate>
	add_certificate = document.querySelector("a.add-certificate");
	add_certificate.addEventListener("click",function(e){
		e.preventDefault();
		personal_information = document.querySelector("form.personal-information");

		formdata = new FormData;

		certificate = personal_information.querySelector("input[name='certificate']").files[0];
		if(!certificate){
			alert("Certificate is empty");
			return false;
		}
        formdata.append("certificate",certificate);

        certificate_name = personal_information.querySelector("input[name='certificate-name']").value;
		if(!certificate_name){
			alert("Certificate name is empty");
			return false;
		}
        formdata.append("certificate_name",certificate_name);

        memberid = document.querySelector(".modal-footer input[name='memberid']").value
        formdata.append("member",memberid);

        fetchData(
            "{{route('add-certificate')}}",
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
        	personal_information.querySelector("input[name='certificate']").value = "";
        	personal_information.querySelector("input[name='certificate-name']").value = "";
            loadingModal("close",500,document.getElementById("membershipModal"));
        })
        .finally(() =>{
            editRow(memberid,true);
        });

		return false;
	})
</script>
<script delete-member>
	deleteRow = function(id){
		confirmDeleteModal.show()

		confirmDeleteModalElement = document.getElementById("delete-member-confirmation");
		buttonExecDelete = confirmDeleteModalElement.querySelector("button[action-for='delete']");

		buttonExecDelete.setAttribute("onclick",`execDelete(${id})`);
	}

	execDelete = function(id){
        loading("show");

		confirmDeleteModal.hide();

		formdata = new FormData;
		formdata.append("member",id);

        fetchData(
            "{{route('delete-membership')}}",
            "POST",
            {"Authorization":localStorage.getItem("Token")},
            formdata
        )
        .then(async (response)=>{
            loading("close",500);

          	result = await response.json();
            if (response.status !== 200){
                showAlert("not-ok","deleted",result.message)

                return response.json();
            }

            showAlert("ok","deleted");
			loadPage(currentPageMembership);
            return response.json();
        });
	}
</script>