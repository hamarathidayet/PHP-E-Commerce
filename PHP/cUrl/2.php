<?php 

$ch=curl_init("https://www.amazon.com/dp/B09P4Q7K9X?th=1");
curl_setopt_array($ch,[	
	CURLOPT_SSL_VERIFYPEER =>false,
	CURLOPT_REFERER =>"https://www.youtube.com/",
	CURLOPT_HTTPHEADER=>array('Host: https://www.youtube.com'),
	CURLOPT_FOLLOWLOCATION=>1,



]);
$veri= curl_exec($ch);
curl_close($ch);

