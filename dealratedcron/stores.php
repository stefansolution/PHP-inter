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
	
/*** Get Stores Start Here ***/
	$storeSlugArr = $storeCatSlugArr = array();
	$selectStoresql = "SELECT id,slug FROM cron_stores";
	$resultStore = $conn->query($selectStoresql);
	if ($resultStore->num_rows > 0) {
		while($row = $resultStore->fetch_assoc()) {
		  $storeSlugArr[$row['id']] =  $row['slug'];

		}
	}	
	
	$catStoresql = "SELECT s.slug,sc.cat_id as catid FROM `cron_stores` s JOIN `store_categories` sc ON s.id = sc.store_id";
	$resultCatStore = $conn->query($catStoresql);
	if ($resultCatStore->num_rows > 0) {
		while($row = $resultCatStore->fetch_assoc()) {
		  $storeCatSlugArr[] =  "cat-".$row['catid'].'-'.$row['slug'];
		}	
	}
//echo "<pre>";print_r($storeSlugArr);
//echo "<pre>";print_r($storeCatSlugArr);
//echo "----------------------------------";
	$selectCatsql = "SELECT * FROM cron_categories";
	$resultCat = $conn->query($selectCatsql);	
	
	if ($resultCat->num_rows > 0) {
		$newSlug = array();
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
				
				
			foreach ($storeSlug["ids"] as $key=>$slugId) {
				$chkSlug = addslashes(trim(HTTP::ConvertRelativeToAbsoluteURL($baseurl, $html->nodes[$slugId]["attrs"]["href"])));
				
				if(!in_array($chkSlug,$storeSlugArr) && !in_array($chkSlug,$newSlug) ){ 
					$storeslug = $chkSlug;
					
					$titleId = 	$storeTitle["ids"][$key];						
					$storename = addslashes(trim($html->nodes[$titleId+1]['text']));
					
					$logoId = 	$storeLogo["ids"][$key];	
					$storelogo = addslashes(trim(HTTP::ConvertRelativeToAbsoluteURL($baseurl, $html->nodes[$logoId]['attrs']['src'])));

					$domainId  = 	$storeDomain["ids"][$key];	
					$storedomain = addslashes(trim($html->nodes[$domainId+1]['text']));
					
					$storeSql = "INSERT INTO cron_stores (storename,logo,domain,slug) VALUES ('".$storename."','".$storelogo."','".$storedomain."','".$storeslug."')";echo "<br/>";
					$conn->query($storeSql);
					$storeId = $conn->insert_id;
					
					$storeCatRelSql = "INSERT INTO store_categories (cat_id,store_id) VALUES ('".$catId."','".$storeId."')";	
					$conn->query($storeCatRelSql);
					//echo "<br/>";echo "<br/>";echo "<br/>";
					$newSlug[] = $storeslug;
					
				} else { 
					$arrayFindKey = "cat-".$catId.'-'.$chkSlug;					
					if(!in_array($arrayFindKey,$storeCatSlugArr)){	
						$storeId = array_search($chkSlug,$storeSlugArr);
						$storeCatRelSql = "INSERT INTO store_categories (cat_id,store_id) VALUES ('".$catId."','".$storeId."')";	
						$conn->query($storeCatRelSql);	
					}					
				}	
				

			}

		}			
	}
	echo "Store record updated successfully";

	
/*** Get Stores End Here ***/
?>