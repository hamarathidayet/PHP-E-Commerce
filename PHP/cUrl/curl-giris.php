<?php 

$ch=curl_init("http://localhost/PHP/cURL/islem.php");
curl_setopt_array($ch,[
	CURLOPT_POST=>true,
	CURLOPT_POSTFIELDS=>[
		"id"=>"hido",
		"pw"=>"1234"
	],
	CURLOPT_FOLLOWLOCATION=>1,
	CURLOPT_COOKIEJAR=>"cookies.txt"
]);
curl_exec($ch);
curl_close($ch);

?>