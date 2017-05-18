<?php
require_once dirname(__DIR__).'/gitlabber/vendor/autoload.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

// api User
//var_dump($client->api('users')->me());

if(isset($_GET['u']) && isset($_GET['p'])){
    $accessToken = '';
    $apiUrl = ''; 
    $client = new \Gitlab\Client($apiUrl);               // change here
    $client->authenticate($accessToken, \Gitlab\Client::AUTH_URL_TOKEN); // change here

    try{
        $loggedInUser = $client->api('users')->login((string)$_GET['u'], (string)$_GET['p'], (string)$_GET['u']);
        echo "<pre>";
        var_dump($loggedInUser);
        echo "</pre>";
    }catch (Exception $exception){
        echo 'Fehler: ',  $exception->getMessage(), "\n";

        //var_dump($exception);
    }
}else {
    echo "please add ?u=username&p=password";
}
