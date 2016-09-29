<?php
require "autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY','ZoansPBPNDDyC5JWTIHfs8Ed6');
define('CONSUMER_SECRET','2mCywn6CCABpQBy7vfsFPrw2vefkNmiM6RRghokeMIfjLDZ3WC');
$access_token = '1878024120-xHKJ5Dp8cByBvLL3tAFfN0YOuEvquehIj6v4v3d';
$access_token_secret = "YtJuqaqu8tdARGn335KabsRwnPG0qDWAnz8pHX1nHrkD2";
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
$statues = $connection->post("statuses/update", ["status" => "hello world"]);
//$content = $connection->get("account/verify_credentials");
print_r($statues);
?>