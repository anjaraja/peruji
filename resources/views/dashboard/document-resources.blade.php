<style>
    .document-resources-index .list-unstyled{
        min-height: 268px;
    }
</style>
<div class="content-container document-resources-index">
    <!-- Header -->
    <div class="mb-4">
        <div class="px-4 py-2 text-white fw-bold d-flex align-items-center" style="background-color: #f7941d; letter-spacing: 5px; border-left: 20px solid #666;">
            DOCUMENT & RESOURCES
        </div>
    </div>
    <div class="row g-3 mt-2 align-items-start">
        <div class="col-md-6">
            <h5 class="text-warning fw-bold mb-3">E-Card</h5>
            <div class="card-container mb-3" id="cardPreview">
                <div src="" id="previewPhoto" class="profile-photo"></div>
                <div class="right-info">
                    <div class="info-name" id="previewName"></div>
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
        </div>
    </div>
</div>
<script>
    const documentAndResources = function(){
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
            document_resources = document.querySelector(".document-resources-index");

            document_resources.querySelector("ul.list-of-certificate-member").innerHTML = "";
            if(responseData?.additionaldocument){
                for (value of responseData?.additionaldocument){
                    document_resources.querySelector("ul.list-of-certificate-member").insertAdjacentHTML("beforeend",`<li class="row-certificate" style="cursor:pointer;"><a href="${value.path}" target="_BLANK">${value.name}</a></li>`)
                }   
            }

            card_container = document_resources.querySelector(".card-container");
            card_container.querySelector(".profile-photo").style.background = `url("${responseData["photo"]}") center no-repeat`;
            card_container.querySelector(".profile-photo").style.backgroundSize = "cover";
            card_container.querySelector(".info-name").innerHTML = responseData["fullname"]?.toUpperCase();
            card_container.querySelector(".info-details").innerHTML = responseData["title"]?.toUpperCase();
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
        });
    }
    document.addEventListener("DOMContentLoaded",function(){
        if(document.querySelector(".content-container.document-resources-index")){
            documentAndResources()
        }
    })
</script>