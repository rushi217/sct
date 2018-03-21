<html>
<title>API CALL</title>
<head>
	
</head>

<body>

<?php	

	function callGetApi($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
		curl_close($ch);
		$output = json_decode($output, true);
		// echo "dadada";
		return $output;
	}

    

    function getPhotos($venueIDs){
    	$photos = array();
    	foreach($venueIDs as $venueId){
    		$i=-1;
    	    $url = "https://api.foursquare.com/v2/venues/".$venueId['id']."/photos?&limit=1&client_id=VMWPXJZBAR1Z1JYFTRRR4WDENGDBS1WZXIVYSIDYGFQWJZOM&client_secret=GMAVY3PKK1Y303U52QASFHBOQAUFRQQ1215AWNG2FWTXVZPR&v=20180319";

    	    $output = callGetApi($url);
    	    
    	    if($output['response']['photos']['count'] >= 1){
    	        $photos[++$i] = $output['response']['photos']['items'][0]['prefix'].'original'.$output['response']['photos']['items'][0]['suffix'];

    	        //echo "url = ".$venueList[$i]['photo']."\n";
    	    }
    	    else{
    	    	$photos[++$i] = '';
    	    }
    	    
        }

        return $photos;
    }    

    function getVenuesListUsingCategories($lat, $lng, $category, $radius=20000){
    	$url = "https://api.foursquare.com/v2/venues/search?categoryId=".$category[0];
    	for($i=1;$i<count($category);$i++)
    		$url = $url.",".$category[$i];
    	
    	$url = $url."&ll=".$lat.",".$lng."&radius=".$radius."&limit=10&client_id=VMWPXJZBAR1Z1JYFTRRR4WDENGDBS1WZXIVYSIDYGFQWJZOM&client_secret=GMAVY3PKK1Y303U52QASFHBOQAUFRQQ1215AWNG2FWTXVZPR&v=20180317";
        
    	$output = callGetApi($url);
        $venueList = array();
        //echo "<pre>";
	    
	    foreach($output['response']['venues'] as $i){
	    	$venue = array();
	    	
	    	if(isset($i['id']))
	    	    $venue['id'] = $i['id'];
	    	if(isset($i['name']))
	    	    $venue['name'] = $i['name'];
	    	if(isset($i['location']['address']))
	    	    $venue['address'] = $i['location']['address'];
	    	if(isset($i['location']['city']))
	    	    $venue['city'] = $i['location']['city'];
	    	if(isset($i['location']['state']))
	    	    $venue['state'] = $i['location']['state'];
	    	if(isset($i['location']['country']))
	            $venue['country'] = $i['location']['country'];
	        if(isset($i['location']['lat']))
	    	    $venue['lat'] = $i['location']['lat'];
	    	if(isset($i['location']['lng']))
	    	    $venue['lng'] = $i['location']['lng'];
	    	if(isset($i['tips'][0]['text']))
	    	    $venue['description'] = $i['tips'][0]['text'];
	    	if(isset($i['rating']))
	    	    $venue['rating'] = $i['rating'];
	    	if(isset($i['hours']['status']))
	    	    $venue['status'] = $i['hours']['status'];
	    	if(isset($i['url']))
	    	    $venue['url'] = $i['url'];

	    	$venue['photo'] = '';
	    	//print_r($venue);

	    	array_push($venueList, $venue);
	    	
	    }

        //getPhotos($venueList);
        //echo "</pre>";
        return $venueList;
    }

    function getVenuesListUsingCityName($city){
    	$url = "https://api.foursquare.com/v2/venues/search?near=".$city."&limit=10&client_id=VMWPXJZBAR1Z1JYFTRRR4WDENGDBS1WZXIVYSIDYGFQWJZOM&client_secret=GMAVY3PKK1Y303U52QASFHBOQAUFRQQ1215AWNG2FWTXVZPR&v=20180319";
        
    	$output = callGetApi($url);
        $venueList = array();
        //echo "<pre>";
	    
	    foreach($output['response']['venues'] as $i){
	    	$venue = array();
	    	
	    	if(isset($i['id']))
	    	    $venue['id'] = $i['id'];
	    	if(isset($i['name']))
	    	    $venue['name'] = $i['name'];
	    	if(isset($i['location']['address']))
	    	    $venue['address'] = $i['location']['address'];
	    	if(isset($i['location']['city']))
	    	    $venue['city'] = $i['location']['city'];
	    	if(isset($i['location']['state']))
	    	    $venue['state'] = $i['location']['state'];
	    	if(isset($i['location']['country']))
	            $venue['country'] = $i['location']['country'];
	        if(isset($i['location']['lat']))
	    	    $venue['lat'] = $i['location']['lat'];
	    	if(isset($i['location']['lng']))
	    	    $venue['lng'] = $i['location']['lng'];
	    	if(isset($i['tips'][0]['text']))
	    	    $venue['description'] = $i['tips'][0]['text'];
	    	if(isset($i['rating']))
	    	    $venue['rating'] = $i['rating'];
	    	if(isset($i['hours']['status']))
	    	    $venue['status'] = $i['hours']['status'];
	    	if(isset($i['url']))
	    	    $venue['url'] = $i['url'];

	    	$venue['photo'] = '';
	    	//print_r($venue);

	    	array_push($venueList, $venue);
	    }

        //getPhotos($venueList);
	    //echo "</pre>";
	    return $venueList;
    }

    function getVenueInformationUsingId($venueId){
    	$url = "https://api.foursquare.com/v2/venues/".$venueId."?&client_id=VMWPXJZBAR1Z1JYFTRRR4WDENGDBS1WZXIVYSIDYGFQWJZOM&client_secret=GMAVY3PKK1Y303U52QASFHBOQAUFRQQ1215AWNG2FWTXVZPR&v=20180317";

    	$output = callGetApi($url);
        
    	$venue = array();
	    	if(isset($output['response']['venue']['id']))
	    	    $venue['id'] = $output['response']['venue']['id'];
	    	if(isset($output['response']['venue']['name']))
	    	    $venue['name'] = $output['response']['venue']['name'];
	    	if(isset($output['response']['venue']['location']['address']))
	    	    $venue['address'] = $output['response']['venue']['location']['address'];
	    	if(isset($output['response']['venue']['location']['city']))
	    	    $venue['city'] = $output['response']['venue']['location']['city'];
	    	if(isset($output['response']['venue']['location']['state']))
	    	    $venue['state'] = $output['response']['venue']['location']['state'];
	    	if(isset($output['response']['venue']['location']['country']))
	            $venue['country'] = $output['response']['venue']['location']['country'];
	        if(isset($output['response']['venue']['location']['lat']))
	    	    $venue['lat'] = $output['response']['venue']['location']['lat'];
	    	if(isset($output['response']['venue']['location']['lng']))
	    	    $venue['lng'] = $output['response']['venue']['location']['lng'];
	    	if(isset($output['response']['tips'][0]['text']))
	    	    $venue['description'] = $output['response']['tips'][0]['text'];
	    	if(isset($output['response']['venue']['rating']))
	    	    $venue['rating'] = $output['response']['venue']['rating'];
	    	if(isset($output['response']['venue']['hours']['status']))
	    	    $venue['status'] = $output['response']['venue']['hours']['status'];
	    	if(isset($output['response']['venue']['url']))
	    	    $venue['url'] = $output['response']['venue']['url'];
            if(isset($output['response']['venue']['photos']))
	    	    $venue['photo'] = $output['response']['venue']['photos']['groups'][0]['items'][0]['prefix']."original".$output['response']['venue']['photos']['groups'][0]['items'][0]['suffix'];
	    	//echo "<pre>";
	    	//print_r($venue);
	    	//echo "</pre>";
	    	return $venueList;
    }

    function getVenuesListUsingLatLng($lat, $lng, $radius=20000){
    	
        $url = "https://api.foursquare.com/v2/venues/explore?ll=".$lat.",".$lng."&radius=".$radius."&limit=10&client_id=VMWPXJZBAR1Z1JYFTRRR4WDENGDBS1WZXIVYSIDYGFQWJZOM&client_secret=GMAVY3PKK1Y303U52QASFHBOQAUFRQQ1215AWNG2FWTXVZPR&v=20180317";
        
    	$output = callGetApi($url);
        $venueList = array();
        //echo "<pre>";
	    
	    foreach($output['response']['groups'][0]['items'] as $i){
	    	$venue = array();
	    	if(isset($i['venue']['id']))
	    	    $venue['id'] = $i['venue']['id'];
	    	if(isset($i['venue']['name']))
	    	    $venue['name'] = $i['venue']['name'];
	    	if(isset($i['venue']['location']['address']))
	    	    $venue['address'] = $i['venue']['location']['address'];
	    	if(isset($i['venue']['location']['city']))
	    	    $venue['city'] = $i['venue']['location']['city'];
	    	if(isset($i['venue']['location']['state']))
	    	    $venue['state'] = $i['venue']['location']['state'];
	    	if(isset($i['venue']['location']['country']))
	            $venue['country'] = $i['venue']['location']['country'];
	        if(isset($i['venue']['location']['lat']))
	    	    $venue['lat'] = $i['venue']['location']['lat'];
	    	if(isset($i['venue']['location']['lng']))
	    	    $venue['lng'] = $i['venue']['location']['lng'];
	    	if(isset($i['tips'][0]['text']))
	    	    $venue['description'] = $i['tips'][0]['text'];
	    	if(isset($i['venue']['rating']))
	    	    $venue['rating'] = $i['venue']['rating'];
	    	if(isset($i['venue']['hours']['status']))
	    	    $venue['status'] = $i['venue']['hours']['status'];
	    	if(isset($i['venue']['url']))
	    	    $venue['url'] = $i['venue']['url'];

	    	$venue['photo'] = '';
	    	//print_r($venue);

	    	array_push($venueList, $venue);
	    	
	    }

        //getPhotos($venueList);
        return $venueList;
        //echo "</pre>";
    }

    //getVenuesListUsingCategories("25.4982601", "81.8698604", array("4d4b7105d754a06374d81259"/*,"4bf58dd8d48988d11f941735"*/));
    //getVenuesListUsingCityName("chandigarh");
    //getVenueInformationUsingId("43695300f964a5208c291fe3");
    //getVenuesListUsingLatLng("25.4982601", "81.8698604");
	
?>

</body>
</html>

