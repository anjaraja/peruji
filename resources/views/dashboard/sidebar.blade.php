<script src="{{asset('dash-js/auth.js')}}"></script>
<style>
    body {
      background-color: #f2f4f4;
    }
    nav.sidebar{
    	padding-top: 10vh !important;
    	background-color: transparent;
    }
    /*.header-bar {
      background-color: #f7941d;
      color: white;
      font-weight: bold;
      letter-spacing: 5px;
      padding: 10px 20px;
      border-left: 20px solid #666;
    }*/
    .nav-link.active {
    	background-color: transparent;
    	border-bottom-left-radius: 0;
    	border-top-left-radius: 0;
      	font-weight: bold;
    	background-color: #f7941d !important;
      	border-left: 20px solid #666 !important;
    }
</style>
<nav class="col-auto col-md-2 d-flex flex-column p-3 min-vh-100 sidebar">
	<h4 class="mb-4">Admin Dashboard</h4>
	<ul class="nav nav-pills flex-column mb-auto">
  		<li class="nav-item">
    		<a href="#" class="nav-link active">Upcoming Events</a>
  		</li>
	  	<li>
		    <a href="#" class="nav-link link-dark">Previous Events</a>
	  	</li>
	  	<li>
		    <a href="#" class="nav-link link-dark">Newsroom</a>
	  	</li>
	  	<li>
		    <a href="#" class="nav-link link-dark">Admin Emails</a>
	  	</li>
	</ul>
</nav>