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

$url = "https://www.wethrift.com/";
$web = new WebBrowser();

/*** Get Categories Start Here ***/
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
	$catSlugArr = array();
	$selectCatsql = "SELECT * FROM cron_categories";
	$resultCat = $conn->query($selectCatsql);
	if ($resultCat->num_rows > 0) {
		/*$records = $resultCat->fetch_all(MYSQLI_ASSOC);
		$catSlugArr = array_column($records, 'slug');*/
		while($row = $resultCat->fetch_assoc()) {
		  $catSlugArr[] =  $row['slug'];

		}		
	}
	$executeQuery = false;
	$catSql = 'INSERT INTO cron_categories (catname, slug) VALUES ';	
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
	} else {
	    echo "Duplicate";
	}
/*** Get Categories End Here ***/
?>