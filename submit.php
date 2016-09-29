<?php

function get_coordinates($city, $street, $province)
{
    $address = urlencode($city.','.$street.','.$province);
    $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Poland";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response);
    $status = $response_a->status;

    if ( $status == 'ZERO_RESULTS' )
    {
        return FALSE;
    }
    else
    {
        $return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng);
        return $return;
    }
}

function GetDrivingDistance($lat1, $lat2, $long1, $long2)
{
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

    return array('distance' => $dist, 'time' => $time);
}
exit();
if(!empty($_POST)){
    echo "hi";
	$coordinates1 = get_coordinates($_POST['city'], $_POST['src_address'], $_POST['state']);
	$coordinates2 = get_coordinates($_POST['city'], $_POST['dest_address'], $_POST['state']);
	if ( !$coordinates1 || !$coordinates2 )
	{
		echo 'Bad address.<br>';
	}
	else
	{
		$dist = GetDrivingDistance($coordinates1['lat'], $coordinates2['lat'], $coordinates1['long'], $coordinates2['long']);
		//echo 'Distance: <b>'.$dist['distance'].'</b><br>Travel time duration: <b>'.$dist['time'].'</b>';
		echo "<br>";
		$msg = "Distance between source and destination is ".$dist['distance'];
		echo $msg."<br>";
	}
	require "twitteroauth-master/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;
	define('CONSUMER_KEY','ZoansPBPNDDyC5JWTIHfs8Ed6');
	define('CONSUMER_SECRET','2mCywn6CCABpQBy7vfsFPrw2vefkNmiM6RRghokeMIfjLDZ3WC');
	$access_token = '1878024120-xHKJ5Dp8cByBvLL3tAFfN0YOuEvquehIj6v4v3d';
	$access_token_secret = "YtJuqaqu8tdARGn335KabsRwnPG0qDWAnz8pHX1nHrkD2";
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
	$statues = $connection->post("statuses/update", ["status" => $msg]);
	//$content = $connection->get("account/verify_credentials");
	if(!empty($statues)){
		echo "Status update on my twitter timeline <b>@maheshkp92</b>";
	}
	else{
		echo "Something went wrong!!";
	}
}
?>