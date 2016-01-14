<?php	
	////////////////////////////////////////////////////////////////////////////////////
	////
	//// GETS THE TOKEN YOU NEED TO AUTHENTICATE THE REQUEST TO PERSONALITY INSIGHTS
	////
	////////////////////////////////////////////////////////////////////////////////////
	
	
	$AUTHURL = 'gateway.watsonplatform.net/authorization/api/v1/token';
	$WATSONURL = 'gateway.watsonplatform.net/personality-insights/api/v2/profile';
	$APIKEY=''; 			//get creds from bluemix by creating a project and adding a service (personality insights)					
	$APIPASSWORD='';		//get creds from bluemix by creating a project and adding a service (personality insights)
	
	//Prepare details to request token
	$PIAUTHURL = 'https://'.$AUTHURL.'?url=https://'.$WATSONURL;
	$creds = $APIKEY.':'.$APIPASSWORD;
	
	//Create HTTP GET Request
	$opts = array(
	  'http'=>array(
	    'method'=>"GET",
	    'header' => "Authorization: Basic " . base64_encode($creds)                 
	  )
	);
	
	//Request
	$context = stream_context_create($opts);
	//Get token
	$file = file_get_contents($PIAUTHURL, false, $context);
	echo($file);
?>