<?php 
include "baglan.php";
$sil=$db->prepare("DELETE from alt_kategori where alt_kategori_id=:kullanici_id");
$silon=$sil->execute(array(
"kullanici_id"=>$_GET['id']
));
if ($silon) {
	header("Location:alt-kategori?durum=ok&id=".$_GET['kategori_id']);
}
else {

	header("Location:alt-kategori?durum=no&id=".$_GET['kategori_id']);
}

 ?>