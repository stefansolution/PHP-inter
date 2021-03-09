<?php
$servername = "localhost";
$username = "trigvent";
$password = "secure@trigvent2018";
$dbname = "dealrated";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

require_once "support/web_browser.php";
require_once "support/tag_filter.php";

$htmloptions = TagFilter::GetHTMLOptions();

$url = "https://www.wethrift.com/";
//$url = "http://localhost/ultimate-web-scraper-master/tests/text.html";
//$url2 = "http://localhost/ultimate-web-scraper-master/tests/text2.html";
$web = new WebBrowser();

/*** Get Categories Start Here 
	$result = $web->Process($url);
	if (!$result["success"]){
		echo "Error retrieving URL.  " . $result["error"] . "\n";
		exit();
	}

	if ($result["response"]["code"] != 200){
		echo "Error retrieving URL.  Server returned:  " . $result["response"]["code"] . " " . $result["response"]["meaning"] . "\n";
		exit();
	}	
	$baseurl = $result["url"];

	$html = TagFilter::Explode($result["body"], $htmloptions);
	$result2 = $html->Find(".nav-expander a[href]");
	if (!$result2["success"]){
		echo "Error parsing/finding URLs.  " . $result2["error"] . "\n";
		exit();
	}	
	
	$selectCatsql = "SELECT * FROM categories";
	$resultCat = $conn->query($selectCatsql);
	if ($resultCat->num_rows > 0) {
		$records = $resultCat->fetch_all(MYSQLI_ASSOC);
		//$columns = array_keys($values[0]);
		$catSlugArr = array_column($records, 'slug');
		//echo "<pre>";print_r($catNameArr);die();
	}
	$executeQuery = false;
	$catSql = 'INSERT INTO categories (catname, slug) VALUES ';	
	foreach ($result2["ids"] as $key=>$id){
		$slug = HTTP::ConvertRelativeToAbsoluteURL($baseurl, $html->nodes[$id]["attrs"]["href"]);
		$name = trim($html->nodes[$id+1]['text']);
		if(!in_array($slug,$catSlugArr)){
			$catSql .= "('".$name."','".$slug."'),";
			$executeQuery = true;
		}
	}	
	if($executeQuery === true){
		$catSql = rtrim($catSql, ',');		
		// Insert Catgeories 
		if ($conn->query($catSql) === TRUE) {
		  echo "Cateories record inserted successfully";
		} else {
		  echo "Error: " . $catSql . "<br>" . $conn->error;
		}
	}
Get Categories End Here ***/
	
/*** Get Stores Start Here 
	$storeSlugArr = array();
	$selectStoresql = "SELECT * FROM stores";
	$resultStore = $conn->query($selectStoresql);
	if ($resultStore->num_rows > 0) {
		$records = $resultStore->fetch_all(MYSQLI_ASSOC);
		$storeSlugArr = array_column($records, 'slug');
	}

	$selectCatsql = "SELECT * FROM categories limit 2";
	$resultCat = $conn->query($selectCatsql);	
	if ($resultCat->num_rows > 0) {
		while($row = $resultCat->fetch_assoc()) {
			$catId = $row['id'];		
			$catSlug = $row['slug'];
			$catPage = $web->Process($catSlug);			
			$html = TagFilter::Explode($catPage["body"], $htmloptions);
			$baseurl = $catPage["url"];
			$storeSlug = $html->Find(".related-stores .related-store");	
			$storeTitle = $html->Find(".related-stores .related-store .related-store-name");		
			$storeLogo = $html->Find(".related-stores .related-store .related-store-logo");
			$storeDomain = $html->Find(".related-stores .related-store .related-store-domain");
				
			foreach ($storeSlug["ids"] as $slugId) {			
				$sSlug[$catId][] = HTTP::ConvertRelativeToAbsoluteURL($baseurl, $html->nodes[$slugId]["attrs"]["href"]);				
			}	
	
			foreach ($storeTitle["ids"] as $titleId) {			
				$sName[$catId][] = $html->nodes[$titleId+1]['text'];
			}		
			foreach ($storeLogo["ids"] as $logoId) {			
				$sLogo[$catId][] = HTTP::ConvertRelativeToAbsoluteURL($baseurl, $html->nodes[$logoId]['attrs']['src']);
			}	
			foreach ($storeDomain["ids"] as $domainId) {			
				$sDomain[$catId][] = $html->nodes[$domainId+1]['text'];
			}			
		}
		// Insert Stores 
		$executeQuery = false;
		$storeSql = 'INSERT INTO stores (catid,storename,logo,domain,slug) VALUES ';
		foreach ($sDomain as $catId=>$domainData) {	
			foreach ($domainData as $k=>$v) {	
				if(!in_array($sSlug[$catId][$k],$storeSlugArr)){			
					$storeSql .= "('".$catId."','".$sName[$catId][$k]."','".$sLogo[$catId][$k]."','".$sDomain[$catId][$k]."','".$sSlug[$catId][$k]."'),";
					$executeQuery = true;
				}
			}
		}
		if($executeQuery === true){
			$storeSql = rtrim($storeSql, ',');
			if ($conn->query($storeSql) === TRUE) {
			  echo "Store record inserted successfully";
			} else {
			  echo "Error: " . $storeSql . "<br>" . $conn->error;
			}
		} 
	}	
	
Get Stores End Here ***/
		
/*** Get Stores Coupons Start Here ***/	
	$selectStoresql = "SELECT * FROM stores LIMIT 2";
	$resultStore = $conn->query($selectStoresql);	 
	if ($resultStore->num_rows > 0) {
		$couponSql = 'INSERT INTO coupons (storeid,code,couponname,lastused,couponused,status) VALUES ';
		while($row = $resultStore->fetch_assoc()) {		
			$storeSlug = $row['slug'];		
			$storeId = $row['id'];		
			$storePage = $web->Process($storeSlug);					
			$html = TagFilter::Explode($storePage["body"], $htmloptions);
			$allscripts = $html->Find("script");					
			$finalcode = array();
			foreach($allscripts['ids'] as $scr){
				$scrtag =  $html->nodes[$scr+1]['text'];				
				if (strpos($scrtag, 'payload') !== false) {
					$finalcode = $scrtag;
					break;
				}
			}
			
			$payload = explode('payload =',$finalcode);
			//echo $payload[1];
			$store = base64_decode(str_replace('/\&\#x3D;/g', "",$payload[1]));
			$store = urldecode($store);
			$couponsArr  = json_decode($store,true);
			//echo "<pre>"; print_r($couponsArr);die();
			foreach($couponsArr['deals'] as $value){
				$desc = $value['deal']['line_1'];
				$desc .= (array_key_exists("line_2",$value['deal'])) ? $value['deal']['line_2'] : '';				
				$lastused =  $value['deal_metrics']['last_used'];
				$usedcount =  $value['deal_metrics']['used_count'];
				$status = 0;
				if(strtolower($value['status']) == "active"){
					$status = 1;	
				}					
				$couponSql .= "('".$storeId."','".$value['deal_code']."','".$desc."','".$lastused."','".$usedcount."','".$status."'),";	
			}
		}
		$couponSql = rtrim($couponSql, ',');
		// Coupons Inserted
		if ($conn->query($couponSql) === TRUE) {
		  echo "Coupons record inserted successfully";
		} else {
		  echo "Error: " . $couponSql . "<br>" . $conn->error;
		}
	}
/*** Get Stores Coupons End Here ***/
?>