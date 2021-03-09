<?php
$servername = "localhost";
$username = "dealcron";
$password = "dealcron";
$dbname = "dealratedcron";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
require_once "support/web_browser.php";
require_once "support/tag_filter.php";

$htmloptions = TagFilter::GetHTMLOptions();

$web = new WebBrowser();
	
/*** Get Stores Coupons Start Here ***/	
	$storeCouponsArr = array();
	 $selectCouponssql = "SELECT * FROM cron_coupons";
	$resultCoupons = $conn->query($selectCouponssql);
	if ($resultCoupons->num_rows > 0) {
		while($row = $resultCoupons->fetch_assoc()) {
		  $storeCouponsArr[] =  "storeid-".$row['storeid'].'-'.$row['code'];
		}  
		//echo "<pre>"; print_R($storeCouponsArr);die();
	}
	$pageStart = isset($_GET['start']) ? $_GET['start'] : '' ;
	$pageEnd = isset($_GET['end']) ? $_GET['end'] : '' ;
    $limit = '';
	if($pageStart!=''){
	    $limit = ' LIMIT '.$pageStart.','.$pageEnd ;
	}
	echo $selectStoresql = "SELECT * FROM cron_stores ".$limit;
	$resultStore = $conn->query($selectStoresql);
	if ($resultStore->num_rows > 0) {
		$couponSql = 'INSERT INTO cron_coupons (storeid,code,couponname,lastused,couponused,status,dealid,avgsaving) VALUES ';
		while($row = $resultStore->fetch_assoc()) {	
            //echo "<pre>"; print_r($row);die();
			$storeSlug = $row['slug'];		
			$storeId = $row['id'];		
			$storePage = $web->Process($storeSlug);					
			$html = TagFilter::Explode($storePage["body"], $htmloptions);
			$allscripts = $html->Find("script");					
			$finalcode = '';
			foreach($allscripts['ids'] as $scr){
				$scrtag =  $html->nodes[$scr+1]['text'];				
				if (strpos($scrtag, 'payload') !== false) {
					$finalcode = $scrtag;
					break;
				}
			}
			if($finalcode != ''){
				$payload = explode('payload =',$finalcode);
				
				//$store = str_replace('/\&\#x3D;/g', "",$payload[1]);
				$store = html_entity_decode($payload[1]);
				$store = str_replace('/\&\#x3D;/g', "",$store);
				$store = urldecode(base64_decode($store));
				
				$couponsArr  = json_decode($store,true);
	
                //echo "<pre>"; print_r($couponsArr);
				//die('XXX');
				$executeQuery = false;
				foreach($couponsArr['deals'] as $value){
				    
					$desc = $value['deal']['line_1'];
					$desc .= (array_key_exists("line_2",$value['deal'])) ? ' '.$value['deal']['line_2'] : '';	
					$desc = addslashes(trim($desc));
					$lastused =  $value['deal_metrics']['last_used'];
					$usedcount =  $value['deal_metrics']['used_count'];
					$avgsaving =  $value['deal_metrics']['avg_saving'];
					$dealid =  $value['deal_id'];
					$status = 0;
					if(strtolower($value['status']) == "active"){
						$status = 1;	
					}

					$arrayFindKey = "storeid-".$storeId.'-'.trim($value['deal_code']);				
					
					if(!in_array($arrayFindKey,$storeCouponsArr)){ 	
						$couponSql .= "('".$storeId."','".trim($value['deal_code'])."','".$desc."','".$lastused."','".$usedcount."','".$status."','".$dealid."','".$avgsaving."'),";	
						$executeQuery = true;
					} else {
						$couponUpdSql = "UPDATE cron_coupons SET couponname = '".$desc."', lastused = '".$lastused."', couponused = '".$usedcount."', status = '".$status."', avgsaving = '".$avgsaving."' WHERE deal_id = '".$dealid."' ";
						$conn->query($couponUpdSql);
					}
				//	echo $arrayFindKey;echo "<br/>";

				}
					//echo "<pre>"; print_r($storeCouponsArr);
					
					//echo $couponSql;
					//die("-------------------------");
			}
		}
		if($executeQuery === true){
			$couponSql = rtrim($couponSql, ',');
			// Coupons Inserted
			if ($conn->query($couponSql) === TRUE) {
			  echo "Coupons record inserted successfully";
			} else {
			  echo "Error: " . $couponSql . "<br>" . $conn->error;
			}
		} else { echo "duplicate"; }
	} 
/*** Get Stores Coupons End Here ***/
?>