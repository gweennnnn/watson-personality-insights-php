<?php	
	////////////////////////////////////////////////////////////////////////////////////
	////
	//// GETS THE TOKEN YOU NEED TO AUTHENTICATE THE REQUEST TO PERSONALITY INSIGHTS
	////
	////////////////////////////////////////////////////////////////////////////////////


	$AUTHURL = 'https://gateway.watsonplatform.net/authorization/api/v1/token';
	$WATSONURL = 'gateway.watsonplatform.net/personality-insights/api/v2/profile';
	$APIKEY='a2737d94-052b-4f0a-a621-93aefa3b2683'; 					
	$APIPASSWORD='8LercJQTYUNO';
	
	
	//text you want to analyse!
	$dataStr = 'ALICE was beginning to get very tired of sitting by her sister on the bank and of having nothing to do: once or twice she had peeped into the book her sister was reading, but it had no pictures or conversations in it, "and what is the use of a book," thought Alice, "without pictures or conversations?" So she was considering, in her own mind (as well as she could, for the hot day made her feel very sleepy and stupid), whether the pleasure of making a daisy-chain would be worth the trouble of getting up and picking the daisies, when suddenly a White Rabbit with pink eyes ran close by her. There was nothing so very remarkable in that; nor did Alice think it so very much out of the way to hear the Rabbit say to itself "Oh dear! Oh dear! I shall be too late!" (when she thought it over afterwards it occurred to her that she ought to have wondered at this, but at the time it all seemed quite natural); but, when the Rabbit actually took a watch out of its waistcoat-pocket, and looked at it, and then hurried on, Alice started to her feet, for it flashed across her mind that she had never before seen a rabbit with either a waistcoat-pocket, or a watch to take out of it, and burning with curiosity, she ran across the field after it, and was just in time to see it pop down a large rabbit-hole under the hedge. In another moment down went Alice after it, never once considering how in the world she was to get out again. The rabbit-hole went straight on like a tunnel for some way, and then dipped suddenly down, so suddenly that Alice had not a moment to think about stopping herself before she found herself falling down what seemed to be a very deep well.';
	//format data
	$data1 = array("content"=>$dataStr);
	$data2 = array($data1);
	$data3 = array("contentItems"=>$data2);
	$finalData = json_encode($data3);
	
	//get token from the other php file
	ob_start();include 'pi_gettoken.php'; $token = ob_get_clean();
	
	//prepare url
	$CURRURL ='https://'.$WATSONURL.'?watson-token='.$token;
	
	//prepare http details
	$options = array(
    	'http' => array(
        'header'  => "Content-type: application/json",
        'method'  => 'POST',
        'content' => $finalData
    ));
    
    //perform http
    $context  = stream_context_create($options);
	$result = file_get_contents($CURRURL, false, $context);
	
	//??? PROFIT!
	var_dump($result);

?>