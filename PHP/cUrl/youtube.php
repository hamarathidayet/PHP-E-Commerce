<?php 

$ch=curl_init("https://www.amazon.com/dp/B00000IZKX");
curl_setopt_array($ch,[
CURLOPT_SSL_VERIFYPEER =>false,
CURLOPT_REFERER =>"https://www.amazon.com/",
CURLOPT_RETURNTRANSFER=>1

]);
$veri= curl_exec($ch);
curl_close($ch);
//ÜRÜN STOK
preg_match_all("@<div id=\"availability\" class=\"a-section a-spacing-base a-spacing-top-micro }\">(.*?)</div>@", $veri, $sonuc);

//ürün fiyat
preg_match_all("@<div class=\"a-section a-spacing-none aok-align-center\"> (.*?)</div>@", $veri, $sonuc1);

//Ürün AD
preg_match_all("@<span id=\"productTitle\" class=\"a-size-large product-title-word-break\">  (.*?)</span>@", $veri, $sonuc2);

//ÜRÜn FİYAT ÇEKME

foreach ($sonuc1[1] as $key1 ) {
	$bölünmüs=explode("$", $key1);

	echo $bölünmüs[1]."<pre>";
}

//ÜRÜN STOK ÇEKME
foreach ($sonuc[1] as $key ) {
	$bölünmüs1=explode(".", $key);

	echo $bölünmüs1[0]."<pre>";

}
//ÜRÜN AD ÇEKME

foreach ($sonuc2[1] as $key2 ) {
	

	echo $key2."<pre>";

}

 ?>

