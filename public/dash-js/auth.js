if(typeof localStorage.getItem("Token") === "undefined" || !localStorage.getItem("Token")){
	alert("Session is end!");
	window.location.href = "/admin";
}