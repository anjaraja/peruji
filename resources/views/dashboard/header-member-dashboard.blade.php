<style>
    .marquee-container {
        width: 100vw;
        background-color: black;
        color: white;
        position: absolute;
        left: 0;
      overflow: hidden; /* Hides content outside the container */
      white-space: nowrap; /* Prevents text from wrapping */
      background-color: black;
    }
    .marquee-container.on-body{
        top: 7.5vh !important;
        position: relative !important;
    }

    .marquee-content {
        width: 100%;
        font-size:14px;
      display: inline-block; /* Allows content to flow horizontally */
      animation: marquee-scroll 15s linear infinite; /* Adjust duration and timing as needed */
    }

    @keyframes marquee-scroll {
      from { transform: translateX(35%); }
      to { transform: translateX(-100%); } /* Scrolls from right to left */
    }
    @media(max-width: 600px){
        .marquee-container.on-body{
            display: none;
        }
        @keyframes marquee-scroll {
          from { transform: translateX(100%); }
          to { transform: translateX(-100%); } /* Scrolls from right to left */
        }
    }

    .mobile-menu-member{
        top: 15vh;
        left: 9vw;
        width: 80vw;
        padding: 15px;
        position: absolute;
        background-color: black;
        opacity: 0;
        pointer-events: none;
        height: 0px;
        transition: height 1.5s, opacity .5s;
    }
    .mobile-menu-member.show{
        pointer-events: auto;
        opacity: 1;
        height: 206px;
        transition: height .5s, opacity 1.5s;
    }
    .mobile-menu-member li span{
        color: white !important;
    }
</style>
<div class="header-member-dashboard">
    <!-- Header -->
    <div class="mb-4">
        <div class="burger-menu" style="position:absolute;top:10.5vh;left:9vw;">
            <svg width="30" height="29" viewBox="0 0 30 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="30" height="5.8" fill="black"/>
                <rect y="11.6" width="30" height="5.8" fill="black"/>
                <rect y="23.2" width="30" height="5.8" fill="black"/>
            </svg>
        </div>
        <div class="sidebar mobile-menu-member">
            <ul class="nav nav-pills flex-column mb-auto">
            </ul>
        </div>
        <div class="px-4 py-2 text-white fw-bold d-flex flex-column justify-content-center align-items-center" style="font-size: 24px;color: #666 !important;font-weight: normal;">
            <div>Member Dashboard</div>
            <div class="header-profile-photo"></div>
            <div class="member-name" style="font-size: 14px;color: black;font-weight: bold;"></div>
            <div class="member-number" style="font-size: 14px;color: black;font-weight: bold;"></div>
        </div>
    </div>
</div>
<script>
    loadMenu = function(){
        menu_container = document.querySelector(".sidebar.mobile-menu-member ul.nav")
        menus = localStorage.getItem("menu");
        menus = JSON.parse(menus);
        
        if(!sessionStorage.getItem("active_menu")) {
            sessionStorage.setItem("active_menu",menus[0].route)
        }
        str_menu_list = "";
        for(key in menus){
            menus_item = menus[key];
            active = "link-dark";
            if(sessionStorage.getItem("active_menu") && sessionStorage.getItem("active_menu") == menus_item["route"]){
                active = "active";
            }
            // active = key>0?"link-dark":"active";
            str_menu_list += `
                <li class="nav-item">
                <span link="${menus_item['route']}" class="nav-link ${active}">${menus_item['menuname']}</span>
            </li>
            `
        }

        menu_container.insertAdjacentHTML("afterbegin",str_menu_list);
    }
</script>
<script>
    MemberDashboardHeader = function(){
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
            document.querySelector(".header-profile-photo").style.backgroundImage = `url("${responseData["photo"]}")`;
            document.querySelector(".member-name").innerHTML = `${responseData?.prefix || ""} ${responseData?.fullname} ${responseData?.suffix || ""}`;
            document.querySelector(".member-number").innerHTML = responseData?.number;
        });
    }
    document.addEventListener("DOMContentLoaded",function(){
        if(sessionStorage.getItem("roleDashboard") == "Member"){
            MemberDashboardHeader()
            loadMenu();
        }
    })
</script>
<script membership-benefit>
    current_running_text = "";
    get_current_title = function(){
        fetchData(
            `api/membership-benefits-detail/${sessionStorage.getItem('currentTitle')}`,
            "GET",
            {"Authorization":localStorage.getItem("Token")}
        )
        .then(async (response)=>{
            result = await response.json();
            if(result?.data?.description){
                document.querySelector(".header-member-dashboard").classList.add("is-have-title-desc")
                document.querySelector("nav.sidebar").classList.add("is-have-title-desc")
                if(current_running_text != result.data.description){
                    current_running_text = result.data.description;
                    containerRunningText = document.querySelector("div[id='benefits-running-text'] div.marquee-content");
                    if(containerRunningText){
                        containerRunningText.innerHTML = result.data.description;
                    }
                    else{
                        document.querySelector("main").insertAdjacentHTML(
                            "beforebegin",
                            `
                                <div class="marquee-container on-body" id="benefits-running-text">
                                    <div class="marquee-content">
                                        <p class="mb-0 pt-2 pb-2" style="text-align:right;">${result.data.description}</p>
                                    </div>
                                </div>
                            `
                        );
                        document.querySelector(".header-member-dashboard").insertAdjacentHTML(
                            "beforeend",
                            `
                                <div class="marquee-container" id="benefits-running-text">
                                    <div class="marquee-content">
                                        <p class="mb-0 pt-2 pb-2" style="text-align:right;">${result.data.description}</p>
                                    </div>
                                </div>
                            `                      
                        )
                    }
                }
            }
        });
    }
    document.addEventListener("DOMContentLoaded", function() {
        if(sessionStorage.getItem("roleDashboard") == "Member"){
            get_current_title();
            setInterval(function(){
                get_current_title();
            },5000)
        }
    });
    document.querySelector(".burger-menu").addEventListener("click",function(){
        floating_menu = document.querySelector(".mobile-menu-member");

        if(floating_menu.classList.contains("show")){
            floating_menu.classList.remove("show");
        }
        else{
            floating_menu.classList.add("show");
        }
    })
</script>