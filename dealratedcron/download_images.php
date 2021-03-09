<?php
ini_set('max_execution_time', 600);

$servername = "localhost";
$username = "adsrwopw_deal";
$password = "deal!@#321";
$dbname = "adsrwopw_deal";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	
	function get_image_data($url){
		$context = stream_context_create(
			array(
				"http" => array(
					'method'=>"GET",
					"header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) 
								AppleWebKit/537.36 (KHTML, like Gecko) 
								Chrome/50.0.2661.102 Safari/537.36\r\n" .
								"accept: text/html,application/xhtml+xml,application/xml;q=0.9,
								image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\r\n" .
								"accept-language: es-ES,es;q=0.9,en;q=0.8,it;q=0.7\r\n" . 
								"accept-encoding: gzip, deflate, br\r\n"
				)
			)
		);

		$image_data = file_get_contents($url, false, $context);
		return $image_data;
	}
	
	$images_url = [];
	
	$pageStart = isset($_GET['start']) ? $_GET['start'] : '' ;
	$pageEnd = isset($_GET['end']) ? $_GET['end'] : '' ;
    $limit = 'LIMIT 0, 50';
	/*if($pageStart!=''){
	    $limit = ' LIMIT '.$pageStart.','.$pageEnd ;
	}*/

	$selectStoresql = "SELECT * FROM stores WHERE image_scraped = 0 AND image LIKE '%img.wethrift.com%' $limit";
	
	$resultStore = $conn->query($selectStoresql);
	if ($resultStore->num_rows > 0) {
		while($row = $resultStore->fetch_assoc()) {
		    $images_url[] = $row['image'];
		}
	}
	//echo "<pre>";print_r($images_url);
	//die;
	$updateTime = date("Y-m-d h:i:s");
	foreach($images_url as $url){
		$image_data = get_image_data($url);
		$downloadedFile = '../framework/public/assets/store_images/'.basename($url);
		file_put_contents( $downloadedFile, $image_data );
		$storeUpdSql = 'UPDATE stores SET image_scraped = 1, image = "'.basename($url).'", updated_at = "'.$updateTime.'"  WHERE image = "'.$url.'"';
		$conn->query($storeUpdSql);
	}
?>