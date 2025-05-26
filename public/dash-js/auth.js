if(typeof localStorage.getItem("Token") === "undefined" || !localStorage.getItem("Token")){
	alert("Session is end!");
	window.location.href = "/admin";
}
else{
	try{
		const payload = localStorage.getItem("Token").split('.')[1];
		const decodedPayload = atob(payload); // base64 decode
		const decoded_data = JSON.parse(decodedPayload)

		localStorage.setItem("email",decoded_data["name"]);
		localStorage.setItem("profile",decoded_data["userprofile"]);
		localStorage.setItem("menu",JSON.stringify(decoded_data["menu"]));
	}
	catch (error) {
		localStorage.removeItem("Token");
		window.location.href = "/admin";
  	}
}