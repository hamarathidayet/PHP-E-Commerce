<?php 

include "baglan.php";

$kategori_sil = $db -> prepare("DELETE from kategori where kategori_id=:kategori_id");
$kategori_sil_göster=$kategori_sil->execute(array(
"kategori_id" => $_GET["id"]
));

if ($kategori_sil_göster) {
			header("Location:kategori.php?durum=ok&id=");
		}
		else {

			header("Location:kategori.php?durum=no&id=");

		}

 ?>