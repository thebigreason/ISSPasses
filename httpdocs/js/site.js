function getCoords (pos) {

	var coords = 'lat=' + pos.coords.latitude + '&lng=' + pos.coords.longitude;
	
	// alert(coords);
	
}

$(document).ready(function(){
	
	/*
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(getCoords);
	}
	*/
	
	// Rewrieve and apply mode from local storage
	var mode = localStorage.getItem('mode');
	$('body, .passes').toggleClass(mode);
	
	// Handle toggle mode
	$('#night-mode').click(function(e){
		
		// Toggle UI
		e.preventDefault();
		$('body, .passes').toggleClass('night');
		
		// Store preference
		if ($('body').hasClass('night')) {
			localStorage.setItem('mode','night');
		} else {
			localStorage.setItem('mode','day');
		}
		
	});

});

