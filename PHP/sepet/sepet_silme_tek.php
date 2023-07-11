<?php 


include "../nebu/production/islem.php";
session_start();
ob_start();

$adet_sil=$_POST['adet']-1;

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
	");
$kullanicisor->execute(array(
	"mail"=>$_SESSION['kullanici_mail']
));

$kullanici_göster= $kullanicisor->fetch(PDO::FETCH_ASSOC);


$ürün_sepet=$db->prepare("SELECT * FROM sepet where sepet_id=:sepet_id");
$ürün_sepet ->execute(array(
	"sepet_id" => $_POST['id']
));


$ürün_göster=$ürün_sepet->fetch(PDO::FETCH_ASSOC);


if ($ürün_göster["kullanici_id"]==$kullanici_göster["kullanici_id"]) {

	if ($ürün_göster["urun_adet"]==1) {

		$ürün = $db->prepare("DELETE from sepet where sepet_id=:id

			");

		$sepet_sil_sor = $ürün -> execute (array(

			
			"id" => $_POST['id']
			
		));
		
	}
	else {

		$ürün = $db->prepare("UPDATE sepet set 

			urun_adet=:urun_adet where kullanici_id=:kullanici_id and sepet_id=:id

			");

		$sepet_sil_sor = $ürün -> execute (array(

			"kullanici_id" => $kullanici_göster["kullanici_id"],
			"id" => $_POST['id'],
			"urun_adet" => $adet_sil
		));
	}

	if ($sepet_sil_sor) {
		header("Location:index.php?durum=ok");
	}

	else {
		header("Location:index.php?durum=no");
	}
}

else {

	header("Location:index.php?durum=html");

}

?>
?>