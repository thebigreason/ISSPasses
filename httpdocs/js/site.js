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
	
	$('#night-mode').click(function(e){
		
		e.preventDefault();
		$('body, .passes').toggleClass('night');
		
	});

});

