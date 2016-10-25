<?php

/*
created by slavak on 24.10.2016
*/

function calculateDistance($lat1, $lon1, $lat2, $lon2, $R = 6371.009)
{
	if($lat1 == $lat2 && $lon1 == $lon2) {
		return false;
	}

	//to radians
	$rad1 = deg2rad($lat1);

	$rad2 = deg2rad($lat2);
	$deltaLat = deg2rad($lat2-$lat1);
	$deltaLon = deg2rad($lon2-$lon1);

	//calculate
	$a =  sin($deltaLat/2) *  sin($deltaLat/2) + cos($rad1) *  cos($rad2) * sin($deltaLon/2) *  sin($deltaLon/2);
	// in kilometers
	return $R * 2 *  atan2( sqrt($a),  sqrt(1-$a));  
}


date_default_timezone_set('Asia/Jerusalem');
$now = DateTime::createFromFormat('U.u', microtime(true));
echo $now->format("m-d-Y H:i:s.u") . "\n"; 

$cities = array();

$handle = fopen("cities.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $parts = explode(" ", $line);
        $length = count($parts);

        //get last two numbers of each line
        $lat = $parts[$length-2];
        $lon = $parts[$length -1];

        unset($parts[$length -1]);
        unset($parts[$length -2]);

        //name of city which is including more than one word
        $cityName = implode(" ", $parts);

        $cities[$cityName] = array('lat' => (float)$lat, 'lon' => (float)$lon);

    }
    fclose($handle);
} else {
    echo  "error opening the file";
}


$nextCityName =  key($cities);
$nextCity[$nextCityName] = $cities[$nextCityName];
unset($cities[$nextCityName]);

$myWay[$nextCityName] = 0;


//32 cities on start
while (count($cities) > 0) 
{	
	$ways = array();
	//31 cities on start
	foreach ($cities as $city => $cords) {	

		if($nextCityName == $city) {
			continue;
		}

		$ways[$city] = calculateDistance(
			$nextCity[$nextCityName]['lat'], 
			$nextCity[$nextCityName]['lon'], 
			$cords['lat'], 
			$cords['lon']);			
	}

	if(!$ways) {
		unset($cities[$city]);
		continue;
	}
	$minTempPath = min($ways);
	$minPathCity = array_keys($ways, $minTempPath);


	//shortest way
	$myWay[$minPathCity[0]] = $minTempPath;

	unset($cities[$nextCityName]);

	$nextCityName = $minPathCity[0];
	$nextCity[$nextCityName] = $cities[$nextCityName];	
}

echo "\n My trip: " . implode("\n", array_keys($myWay));
// in km:
echo "\n Min way: " . (array_sum($myWay) * 60 * 1.1515 * 1.609344 ) . " km \n";

$now = DateTime::createFromFormat('U.u', microtime(true));
echo $now->format("m-d-Y H:i:s.u"); 
