<?php

require_once('../google/vendor/autoload.php');

$client=new Google_Client();
$client->setClientId('4427281738-0cv7r7d3sklnv5n5cvqk6u730gm5ah.apps.googleusercontent.com');
$client->setClientSecret('GOCSPX-qouzbfilbqlWguC56mdkF_jGM2h');
$client->setRedirectUri("http://localhost/blogsite\action\Glog.php");
$client->addScope('email');
$client->addScope('profile');


$url=$client->createAuthUrl();

header('location:'.$url);



