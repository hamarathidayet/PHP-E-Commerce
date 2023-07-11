<?php 

include "baglan.php";

$sil=$db->prepare("DELETE from menu where menu_id=:id");

$silonayla=$sil->execute(array(
"id" => $_GET['id']

));

if ($silonayla) {
	header("Location:menuler?durum=ok");
}
else {

	header("Location:menuler?durum=no");
}


 ?>