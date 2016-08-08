<?php
/**
 * Created by PhpStorm.
 * User: Clarence
 * Date: 8/7/2016
 * Time: 11:54 PM
 */
$searchterm = 'Dark Matter';
$url = 'api.tvmaze.com/search/shows?q=' . $searchterm;

// Initiate curl
$ch = curl_init();
// Sets the url
curl_setopt($ch, CURLOPT_URL, $url);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//Execute
$response = curl_exec($ch);
// closes curl
curl_close($ch);

$json = json_decode($response, true);

//echo $json;
var_dump($json);