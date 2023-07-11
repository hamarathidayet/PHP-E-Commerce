<?php 
$veri=[
"id"=>"hamarat",
"pass" =>"12345678",
"button" =>"Tıkla"

];
$ch=curl_init();

curl_setopt_array($ch,[
CURLOPT_URL=>"http://localhost/PHP/cURL/3-post.php?durum=ok",
CURLOPT_POST => true,
CURLOPT_POSTFIELDS=>$veri

]);
curl_exec($ch);
curl_close($ch);

 ?>