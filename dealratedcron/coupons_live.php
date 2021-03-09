<?php
ini_set('max_execution_time', 600);
//die('wait');
$servername = "localhost";
$username = "adsrwopw_deal";
$password = "deal!@#321";
$dbname = "adsrwopw_deal";

function randomDate(){
    $randomDays = rand(1,30);
    return date("Y-m-d", strtotime("-$randomDays days"));
}

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
require_once "support/web_browser.php";
require_once "support/tag_filter.php";

$htmloptions = TagFilter::GetHTMLOptions();

$web = new WebBrowser();

$test = isset($_GET['test']) ? $_GET['test'] : '' ;

$isCronEnablesql = "SELECT run_cron,cron_stopped_at FROM admins WHERE id = 1";
$resultSet = $conn->query($isCronEnablesql);
$log = $resultSet->fetch_assoc();
if($log['run_cron'] == 0){
    $start_date = new DateTime($log['cron_stopped_at']);
    $since_start = $start_date->diff(new DateTime(date("Y-m-d h:i:s")));
    $mins = (int)$since_start->i;
    if($mins <= 150 && $test == ''){
        die('wait for '. ( 150 - $mins ). " minutes");
    } else {
        $enableCronsql = "UPDATE admins SET run_cron = 1";
        $conn->query($enableCronsql);
    }
}
	
/*** Get Stores Coupons Start Here ***/	
	$storeCouponsArr = array();
	 $selectCouponssql = "SELECT * FROM coupons";
	$resultCoupons = $conn->query($selectCouponssql);
	if ($resultCoupons->num_rows > 0) {
		while($row = $resultCoupons->fetch_assoc()) {
		  $storeCouponsArr[] =  "storeid-".$row['store_id'].'-'.$row['code'];
		}  
		//echo "<pre>"; print_R($storeCouponsArr);die();
	}
	$pageStart = isset($_GET['start']) ? $_GET['start'] : '' ;
	$pageEnd = isset($_GET['end']) ? $_GET['end'] : '' ;
    $limit = 'LIMIT 0,1';
	if($pageStart!=''){
	    $limit = ' LIMIT '.$pageStart.','.$pageEnd ;
	}
	//$selectStoresql = "SELECT * FROM stores ".$limit;
	$selectStoresql = "SELECT * FROM stores WHERE coupon_scraped = 0 AND status = 1 $limit";
	$resultStore = $conn->query($selectStoresql);
	//echo "<pre>"; print_r($resultStore);die();
	$storeIdsArray = [];
	if ($resultStore->num_rows > 0) {
	    $couponSql = 'INSERT INTO coupons (store_id,code,description,coupon_off,last_used,coupon_used,status,deal_id,coupon_id,avg_saving, created_at) VALUES ';
	    $executeQuery = false;
	    $finalcode = '';
		while($row = $resultStore->fetch_assoc()) {	
            //echo "<pre>"; print_r($row);die();
			echo $storeSlug = $row['slug'];		
			$storeId = $row['id'];	
			$storeIdsArray[] = $storeId;
			$storePage = $web->Process("https://www.wethrift.com/".$storeSlug);	
			//echo "<pre>"; print_r($storePage);
			//die("------");				
			$html = TagFilter::Explode($storePage["body"], $htmloptions);
			
			$result2 = $html->Find(".home-tags a[href]");
			//var_dump($result2);die;
			if (COUNT($result2["ids"]) > 0){
			    
        		$storeUpdSql = "UPDATE stores SET coupon_scraped = 1 WHERE id IN (".implode(",",$storeIdsArray).")";
                $conn->query($storeUpdSql);

                $enableCronsql = "UPDATE admins SET run_cron = 1";
                $conn->query($enableCronsql);
                die('Try Next');
			    
			}
			
			$allscripts = $html->Find("script");					
			foreach($allscripts['ids'] as $scr){
				echo $scrtag =  $html->nodes[$scr+1]['text'];				
				if (strpos($scrtag, 'payload') !== false) {
					$finalcode = $scrtag;
					break;
				}
			}
			echo "<br>";
			echo '############################';
			echo "<br>";
			echo $finalcode;
			echo "<br>";
			echo '############################';
			echo "<br>";
			if($finalcode != ''){
				$payload = explode('payload =',$finalcode);
				
				//$store = str_replace('/\&\#x3D;/g', "",$payload[1]);
				$store = html_entity_decode($payload[1]);
				$store = str_replace('/\&\#x3D;/g', "",$store);
				$store = urldecode(base64_decode($store));
				
				$couponsArr  = json_decode($store,true);
	
                //echo "<pre>"; print_r($couponsArr['deals']);
				//die('XXX');
				foreach($couponsArr['deals'] as $value){
				    
					$desc = $value['deal']['line_1'];
					$desc .= (array_key_exists("line_2",$value['deal'])) ? ' '.$value['deal']['line_2'] : '';	
					$desc = addslashes(trim($desc));
					$lastused =  $value['deal_metrics']['last_used'];
					$usedcount =  $value['deal_metrics']['used_count'];
					
					if($usedcount > 0){
					    $tmpUsedCount = $usedcount * (40/100);
					    $tmpUsedCount = ceil($tmpUsedCount);
					}
					
					$avgsaving =  $value['deal_metrics']['avg_saving'];
					$dealid =  $value['deal_id'];
					$status = 0;
					if(strtolower($value['status']) == "active"){
						$status = 1;	
					}

					$arrayFindKey = "storeid-".$storeId.'-'.trim($value['deal_code']);				
					//echo "<pre>"; print_r($storeCouponsArr);die;
					if(!in_array($arrayFindKey,$storeCouponsArr)){ 	
						$couponSql .= "('".$storeId."','".trim($value['deal_code'])."','".$desc."','".(int) filter_var($desc, FILTER_SANITIZE_NUMBER_INT)."','".$lastused."','".$usedcount."','".$status."','".$dealid."','".$storeId.'XL'.$dealid.$storeId.'DR'."','".$avgsaving."','".randomDate()."'),";	
						$executeQuery = true;
					} else {
						$couponUpdSql = "UPDATE coupons SET last_used = '".$lastused."', status = '".$status."', avg_saving = '".$avgsaving."' WHERE deal_id = '".$dealid."' ";
						$conn->query($couponUpdSql);
					}
				}
			}
		}
		echo "<br>";
		echo $couponSql;
		echo "<br>";
		if($executeQuery === true){
			$couponSql = rtrim($couponSql, ',');
			// Coupons Inserted
			if ($conn->query($couponSql) === TRUE) {
			  echo "Coupons record inserted successfully";
			} else {
			  echo "Error: " . $couponSql . "<br>" . $conn->error;
			}
            
		} else { echo "duplicate"; }
		echo "<br>";
		if($finalcode != ''){
    		$storeUpdSql = "UPDATE stores SET coupon_scraped = 1 WHERE id IN (".implode(",",$storeIdsArray).")";
            $conn->query($storeUpdSql);
		} else {
		    echo $disableCronsql = "UPDATE admins SET run_cron = 0, cron_stopped_at = '".date('Y-m-d h:i:s')."'";
            $conn->query($disableCronsql);
		}
		
	} else {
	    $storeUpdSql = "UPDATE stores SET coupon_scraped = 0";
        $conn->query($storeUpdSql);
	}
/*** Get Stores Coupons End Here ***/
?>