if(typeof localStorage.getItem("Token") === "undefined" || !localStorage.getItem("Token")){
	alert("Session is end!");
	localStorage.clear();
	window.location.href = "/admin";
}
else{
	try{
		const payload = localStorage.getItem("Token").split('.')[1];
		const decodedPayload = atob(payload); // base64 decode
		const decoded_data = JSON.parse(decodedPayload)

		if(Math.floor(Date.now() / 1000) > decoded_data["exp"]){
			loginprocess = fetchData(
                "{{route('logout')}}",
                "GET"
              )
              .then((response)=>{
                if (response.status !== 200){
					alert("Session is end!");
                    localStorage.clear()
                    window.location.href = "/admin";
                    return response.json();
                }
                return response.json();
              })
              .then((data)=>{
				alert("Session is end!");
                localStorage.clear()
                window.location.href = "/admin";
                // alert("success logout")
              });
		}

		localStorage.setItem("email",decoded_data["name"]);
		localStorage.setItem("profile",decoded_data["userprofile"]);
		localStorage.setItem("menu",JSON.stringify(decoded_data["menu"]));
	}
	catch (error) {
		alert("Session is end!");
		localStorage.clear();
		window.location.href = "/admin";
  	}
}