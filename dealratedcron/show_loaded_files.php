<?php
ini_set('max_execution_time', 600);

$servername = "localhost";
$username = "dealcron";
$password = "dealcron";
$dbname = "dealrated";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	
	$pageStart = isset($_GET['start']) ? $_GET['start'] : '' ;
	$pageEnd = isset($_GET['end']) ? $_GET['end'] : '' ;
    $limit = '';
	if($pageStart!=''){
	    $limit = ' LIMIT '.$pageStart.','.$pageEnd ;
	}
	$selectStoresql = "SELECT * FROM stores WHERE id >= $pageStart AND id <= $pageEnd";
	$resultStore = $conn->query($selectStoresql);
	
	if ($resultStore->num_rows > 0) {
		while($row = $resultStore->fetch_assoc()) {
		    $pos = strpos($row['image'], 'img.wethrift.com');
            if ($pos === false) {
                $row['image'] = "http://trigvent.com/dealrated/laravelcode/public/assets/store_images/".$row['image'];
            } else {
               $row['image'] = str_replace("https://img.wethrift.com/","http://trigvent.com/dealrated/laravelcode/public/assets/store_images/", $row['image']);
            }
            echo "<img width='30' alt='".$row['id']."' src='".$row['image']."'/><br/><hr>"; 
            
		}
	}
?>