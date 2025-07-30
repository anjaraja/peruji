function fetchData(url,method,headers={},body={}){
	if (typeof localStorage.getItem('Token') != "undefined"){
		headers["Authorization"] = `Bearer ${localStorage.getItem('Token')}`
	}

	if(body instanceof FormData){
		body = body
	}
	else{
		body = JSON.stringify(body)
	}

	data = {
      	method: method,
      	headers: headers,
      	body: body
    }
    if(method == "GET") delete data["body"];

    const response = fetch(url,data)

  	return response;
}

async function asyncFetchData(url,method,headers={},body={}){
	if (typeof localStorage.getItem('Token') != "undefined"){
		headers["Authorization"] = `Bearer ${localStorage.getItem('Token')}`
	}

	if(body instanceof FormData){
		body = body
	}
	else{
		body = JSON.stringify(body)
	}

	if (method != "GET"){
		fetch_attribute = {
	      	method: method,
	      	headers: headers,
	      	body: body
	    }
	}
	else{
		fetch_attribute = {
	      	method: method,
	      	headers: headers
	    }
	}

	try{
		const response = await fetch(url,fetch_attribute)
		const data = await response.json()
	    return data;
	}
	catch (error) {
	    return error;
  	}

    // const response = await fetch(url,{
    //   method: method,
    //   headers: headers,
    //   body: JSON.stringify(body)	
    // })
    //   .then((response) => {
    //     if (response.status === 200) {
    //       return response.json();
    //     } else {
    //       throw new Error("Something went wrong");
    //     }
    //   })
    //   .then((response) => {
    //     // console.debug(response);
    //     // …
    //   })
    //   .catch((error) => {
    //     console.error(error);
    //   });
}