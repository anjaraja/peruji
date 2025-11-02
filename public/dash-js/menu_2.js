function showAlert(alert_status, alert_action, message=null){
	this_alert = document.querySelector(`.alert.${alert_status}[data='${alert_action}']`);
	original_text = this_alert.textContent;

	if(message){
		this_alert.innerHTML = message;
	}

	this_alert.classList.add("show")

	setTimeout(function(){
		this_alert.classList.remove("show")
		this_alert.innerHTML = original_text;
	},5000)
}