<?php
echo "Test1";
$homepage = file_get_contents('https://www.wethrift.com/');
var_dump($homepage);

$handle = curl_init();
 
$url = "https://www.wethrift.com/";
 
// Set the url
curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
 
$output = curl_exec($handle);
 
curl_close($handle);
 
echo $output;
?>