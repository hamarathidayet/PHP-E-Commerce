<?php 
include "baglan.php";

$urun_sil=$db->prepare("DELETE from ürüns where urun_id=:urun_id
	");
$urun_onayla= $urun_sil->execute(array(
	"urun_id" => $_GET["id"]
));
if ($urun_onayla) {
	header("Location:uruns.php?durum=ok");
}
else {
	header("Location:uruns.php?durum=no");
}
?>
