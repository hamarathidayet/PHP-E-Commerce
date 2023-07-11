<?php 
include "baglan.php";

$sil=$db->prepare("DELETE from kullanici where kullanici_id=:kullanici_id");
$silon=$sil->execute(array(
"kullanici_id"=>$_GET['id']
));
if ($silon) {
	header("Location:kullanicilar?durum=ok");
}
else {

	header("Location:kullanicilar?durum=no");
}
 ?>}
