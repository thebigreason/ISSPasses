<?php

// Set your latitude and longitude. Woodland, CA is the default.
$lat = '38.669835';
$lng = '-121.769828';


// Sets the $iss var with the results API call (25544 is the ISS). Params: $apiUri, $cashFIle
$iss = getJSON('http://api.uhaapi.com/satellites/25544/passes?lat=' . $lat . '&lng=' . $lng,'iss.json');


// Refreshes the cached pass data from UHAAPI
function refreshCache ($request_url,$local_file) {
	
	// Open XML file
	$contents = file_get_contents($request_url); 
	$fp = fopen($local_file, "w");
	
	// Write contents to cache file
	fwrite($fp, $contents);
	fclose($fp);
	
}


// Loads JSON UHAAPI output from cache
function getJSON ($uri,$local) {

	$local_file = "../httpdocs/cache/$local";
	$difference = date('U') - filemtime($local_file);
	
	// See if the cache file has been updated in the last 60 minutes
	if ($difference > 3600) { // 1800 = 30 minutes
		refreshCache($uri,$local_file);
	}
	
	// Load file
	$file = file_get_contents($local_file);
	
	// Decode and return object
	if (strlen($file) > 100) {
	
		$results = json_decode($file);
		
	} else {
	
		$results = FALSE;
		
	}

	return $results;
	
}

// Converts azimuth to human-readable directions
function convertAzimuth ($azimuth) {
	
	if ($azimuth < 22.5) {
		$az = 'N';
	} else if ($azimuth < 45) {
		$az = 'NNE';
	} else if ($azimuth < 67.5) {
		$az = 'NE';
	} else if ($azimuth < 90) {
		$az = 'ENE';
	} else if ($azimuth < 112.5) {
		$az = 'E';
	} else if ($azimuth < 135) {
		$az = 'ESE';
	} else if ($azimuth < 157.5) {
		$az = 'SE';
	} else if ($azimuth < 180) {
		$az = 'SSE';
	} else if ($azimuth < 202.5) {
		$az = 'S';
	} else if ($azimuth < 225) {
		$az = 'SSW';
	} else if ($azimuth < 247.5) {
		$az = 'SW';
	} else if ($azimuth < 270) {
		$az = 'WSW';
	} else if ($azimuth < 292.5) {
		$az = 'W';
	} else if ($azimuth < 315) {
		$az = 'WNW';
	} else if ($azimuth < 337.5) {
		$az = 'NW';
	} else if ($azimuth < 365) {
		$az = 'NNW ';
	}
	
	return $az;
	
}