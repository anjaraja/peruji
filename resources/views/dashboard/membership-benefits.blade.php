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
</style>
<div class="modal fade" id="membershipBenefitsModal" tabindex="-1" role="dialog" aria-labelledby="membershipBenefitsModalTitle" aria-hidden="true">
  	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          	<div class="modal-header">
	            <h5 class="modal-title" id="membershipBenefitsModalLongTitle">MEMBERSHIP BENEFITS DETAIL</h5>
              	<button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
          	</div>
          	<div class="modal-body">
	            <form class="section-box membership-benefits" style="padding-top: 0;margin-bottom: 0;">
	          		<div class="row g-3">
			            <div class="row g-3 mt-2">
			                <div class="col-md-12">
			                  	<label>Membership Type</label>
			                  	<input type="text" class="form-control" name="name" required disabled>
			                </div>
			                <div class="col-md-12">
			                  	<label>Benefits Description</label>
			                  	<input type="text" class="form-control" placeholder="Regular member will receive some benefits" name="description" required>
			                </div>
		              	</div>
          			</div>
	          		<div class="row g-3 mt-2">
		                <div class="col-12">
		                  	<button class="btn btn-orange px-4">Save</button>
		                </div>
	                </div>
	        		</form>
          	</div>
          	<div class="modal-footer">
          		<input type="hidden" name="membership_benefits">
	            <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal" aria-label="Close">Close</button>
	            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          	</div>
        </div>
  	</div>
</div>
<div class="content-container membership-benefits-index">
    <!-- Header -->
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            MEMBERSHIP BENEFITS
        </div>
    </div>
    <div class="table-responsive">
        <table class="clean-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
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
        modalElement = document.getElementById('membershipBenefitsModal');
        membershipBenefitsModal = new bootstrap.Modal(modalElement);

        confirmDeleteModalElement = document.getElementById('delete-member-confirmation');
        confirmDeleteModal = new bootstrap.Modal(confirmDeleteModalElement);

        this.querySelectorAll(".close-modal").forEach(function(thisEl){
        	thisEl.addEventListener("click",function(){
        		membershipBenefitsModal.hide();
        	})
        })
	})
</script>
<script>
    let currentPageMembershipBenefits = 1;
    const rowsPerPageMembershipBenefits = 10;
    totalRowsMembershipBenefits = 0; // simulate from backend
    totalPagesMembershipBenefits = Math.ceil(totalRowsMembershipBenefits / rowsPerPageMembershipBenefits);

    const pageInputMembershipBenefits = document.querySelector('.membership-benefits-index #pageInput');
    const prevPageMembershipBenefits = document.querySelector('.membership-benefits-index #prevPage');
    const nextPageMembershipBenefits = document.querySelector('.membership-benefits-index #nextPage');

    // Simulate API call
    // function fetchDataFromAPI(page) {
    //   return new Promise((resolve) => {
    //     setTimeout(() => {
    //       resolve(data);
    //     }, 250);
    //   });
    // }

    async function loadPageMemberBenefits(page) {
      // Load data

        const data = await asyncFetchData(
            "{{route('list-membership-benefits','')}}/"+page,
            "GET",
            {"Authorization":localStorage.getItem("Token")}
        );
        row_data = data.data.data
        totalRowsMembershipBenefits = data.data.total
        totalPagesMembershipBenefits = data.data.last_page
        renderTableMembershipBenefits(row_data);

        if (isNaN(page) || page < 1) page = 1;
        if (page > totalPagesMembershipBenefits) page = totalPagesMembershipBenefits;
        
        currentPageMembershipBenefits = page;
        pageInputMembershipBenefits.value = currentPageMembershipBenefits;

        // Arrow states
        if(currentPageMembershipBenefits === 1){
        	pageInputMembershipBenefits.setAttribute('disabled', 'disabled');
        }
        prevPageMembershipBenefits.classList.toggle('disabled', currentPageMembershipBenefits === 1);
        nextPageMembershipBenefits.classList.toggle('disabled', currentPageMembershipBenefits === totalPagesMembershipBenefits);
    }

    function renderTableMembershipBenefits(data) {
      const tbody = document.querySelector('.membership-benefits-index #tableBody');
      tbody.innerHTML = '';
      data.forEach((row, index) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${index+1}</td>
          <td>${row.name}</td>
          <td class="text-center action-icons">
            <i class="bi bi-pencil-square" title="Edit" onclick="editRowMembershipBenefits('${row.name}')"></i>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    // Events
    pageInputMembershipBenefits.addEventListener('change', () => {
      loadPageMemberBenefits(parseInt(pageInputMembershipBenefits.value));
    });

    prevPageMembershipBenefits.addEventListener('click', () => {
      if (currentPageMembershipBenefits > 1) loadPageMemberBenefits(currentPageMembershipBenefits - 1);
    });

    nextPageMembershipBenefits.addEventListener('click', () => {
      if (currentPageMembershipBenefits < totalPagesMembershipBenefits) loadPageMemberBenefits(currentPageMembershipBenefits + 1);
    });

    // Initial
    document.addEventListener("DOMContentLoaded",function(){
    	if(document.querySelector(".content-container.membership-index")){
    		loadPageMemberBenefits(currentPageMembershipBenefits);
    	}
    })
</script>
<script edit-script>
    editRowMembershipBenefits = function(id, isRecall=false){
        if(!isRecall) membershipBenefitsModal.show()

        responseData = {}
        fetchData(
            "{{route('membership-benefits-detail','')}}/"+id,
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
        	document.querySelector(".modal-footer input[name='membership_benefits']").value = responseData?.id;

        	membership_benefits = document.querySelector("form.membership-benefits");
        	membership_benefits.querySelector("input[name='name']").value = responseData?.name;
        	membership_benefits.querySelector("input[name='description']").value = responseData?.description;
        });
    }
</script>
<script>
	membership_beneftis = document.querySelector("form.membership-benefits");

	membership_beneftis.addEventListener("submit",function(e){
		e.preventDefault();
		loadingModal("show",null,document.getElementById("membershipBenefitsModal"));

		thisform = this;

		formdata = new FormData;

        name = this.querySelector("input[name='name']").value

        description = this.querySelector("input[name='description']").value
        formdata.append("description",description)

        membership_benefits = document.querySelector(".modal-footer input[name='membership_benefits']").value
        formdata.append("membership_benefits",membership_benefits);

        fetchData(
            "{{route('update-membership-benefits')}}",
            "POST",
            {"Authorization":localStorage.getItem("Token")},
            formdata
        )
        .then(async (response)=>{
            loadingModal("close",500,document.getElementById("membershipBenefitsModal"));

          	result = await response.json();
            if (response.status !== 200){
                showAlert("not-ok","updated",result.message)

                return response.json();
            }

            showAlert("ok","updated");
            thisform.querySelector("input[name='description']").value = ""
          	editRowMembershipBenefits(name,true);
            return response.json();
        });

		return false;
	})
</script>