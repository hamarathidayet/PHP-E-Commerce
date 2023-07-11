<?php 

include "../nebu/production/islem.php";
session_start();
ob_start();

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
	");
$kullanicisor->execute(array(
	"mail"=>$_SESSION['kullanici_mail']
));

$kullanici_göster= $kullanicisor->fetch(PDO::FETCH_ASSOC);

$ürün = $db->prepare("DELETE from sepet where 

	kullanici_id=:kullanici_id

	");

$sepet_sil_sor = $ürün -> execute (array(

	"kullanici_id" => $kullanici_göster["kullanici_id"]
));

$ürün_say = $ürün->rowCount();
if ($ürün_say==0) {
	header("Location:index.php?durum=sepet-yok");
}
else{

	if ($sepet_sil_sor) {
		header("Location:index.php?durum=ok-toplu");
	}

	else {
		header("Location:index.php?durum=no");
	}
}


?>