<?php
$base = 'http://xml.amazon.com/onca/xml3';


$apikey="";



$baseURL=
 "http://api.nytimes.com/svc/politics/v2/districts.xml?api-key=b2dc6ccc30555ab20b8a9a0e5d743bc8:4:61472269";
echo "$baseURL<br>";
$nyURL="$baseURL$apikey";


$output = file_get_contents("$nyURL");
echo "$output";
?>