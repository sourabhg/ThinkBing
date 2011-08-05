<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

$address= $_POST['address'];
echo "<br />";
$zipcode= $_POST['zip'];
echo "<br />";

$baseurl="http://www.nysenate.gov/nyss_senator_search/";
$add="$address"."%2C"."$zipcode";
$queryurl=$baseurl.$add;
echo "$queryurl";
//$adddr=urlencode($add);
//echo "$add";

$html = file_get_contents('page.htm');

//$dom = new DOMDocument;
 
//Parse the HTML. The @ is used to suppress any parsing errors
//that will be thrown if the $html string isn't valid XHTML.
//@$dom->loadHTML($html);
 
//$links = $dom->getElementsByTagName('div');
 
//Iterate over the extracted links and display their URLs
//foreach ($links as $link){
	//Extract and show the "href" attribute. 
	//echo $link->getAttribute("class=item-list"), '<br>';
	
	
	$html = file_get_contents('page.htm');
//Parse it. Here we use loadHTML as a static method
//to parse the HTML and create the DOM object in one go.
@$dom = DOMDocument::loadHTML($html);
 
//Init the XPath object
$xpath = new DOMXpath($dom);
 
//Query the DOM
$links = $xpath->query( '//div[contains(@class, "item-list")]' );
 
//Display the results as in the previous example
if (!is_null($links)) {
  foreach ($links as $link) {
    echo "<br/>[". $link->nodeName. "]";

    $nodes = $link->childNodes;
    foreach ($nodes as $node) {
      echo $node->nodeValue. "\n";
    }
  }
	
	
}
 



?>
</body>
</html>