<script src="{{asset('dash-js/auth_2.js')}}"></script>
<style>
    body {
      background-color: #f2f4f4;
    }
    .sidebar .nav-item span{
    	cursor: pointer;
    }
</style>
<nav class="col-auto col-md-2 d-flex flex-column p-3 min-vh-100 sidebar">
	<h4 class="mb-4">Admin Dashboard</h4>
	<ul class="nav nav-pills flex-column mb-auto">
	</ul>
</nav>
<script>
	menu_container = document.querySelector("ul.nav");
	menus = localStorage.getItem("menu");
	menus = JSON.parse(menus);

	str_menu_list = "";
	for(key in menus){
		menus_item = menus[key];
		active = "link-dark";
		if((sessionStorage.getItem("active_menu") && sessionStorage.getItem("active_menu") == menus_item["route"]) || (key == 0 && !sessionStorage.getItem("active_menu"))){
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
	loading = function(toggleTo,timeClose=500){
		if(toggleTo == "show"){
	    loading_container = document.querySelector(`.loading-container`);
	    loading_container.classList.add("show");
		}
		else{
  		setTimeout(() => {
  			loading_container.classList.remove("show");
  		},timeClose)
		}
	}
	document.addEventListener("click", function (e) {
		active_menu = document.querySelector(".sidebar li span.active")
      	if (e.target.matches(".sidebar .nav-item span") && !e.target.matches(".sidebar .nav-item span.active")) {
      		loading("show");
	      	active_menu.classList.remove("active");
	      	active_menu.classList.add("link-dark");

	      	e.target.classList.remove("link-dark")
	      	e.target.classList.add("active")

      		link = e.target.getAttribute("link");


      		all_content_container = document.querySelectorAll(`.content-container`);
      		all_content_container.forEach(all_content_container_el => {
      			all_content_container_el.classList.remove("show");
      		})
      		content_container = document.querySelector(`.content-container.${link}`);
      		content_container.classList.add("show");

      		loading("close",500);

      		sessionStorage.setItem("active_menu",link)
      	}
	})
</script>