function showAlert(alert_status, alert_action){
	this_alert = document.querySelector(`.alert.${alert_status}[data='${alert_action}']`);

	this_alert.classList.add("show")

	setTimeout(function(){
		this_alert.classList.remove("show")
	},5000)
}