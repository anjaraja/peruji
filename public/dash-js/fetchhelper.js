function fetchData(url,method,headers={},body={}){
	if (typeof localStorage.getItem('token') != "undefined"){
		headers["Authorization"] = `Bearer ${localStorage.getItem('token')}`
	}
	
    const response = fetch(url,{
      method: method,
      headers: headers,
      body: JSON.stringify(body)	
    })

  	return response;
}

async function asyncFetchData(url,method,headers={},body={}){
	if (typeof localStorage.getItem('token') != "undefined"){
		headers["Authorization"] = `Bearer ${token}`
	}
	try{
		const response = await fetch(url,{
	      	method: method,
	      	headers: headers,
	      	body: JSON.stringify(body)	
	    })
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