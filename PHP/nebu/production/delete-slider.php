<?php 
include "baglan.php";

$slider_sil=$db->prepare("DELETE from slider where slider_id=:slider_id
	");
$slider_onayla= $slider_sil->execute(array(
	"slider_id" => $_GET["id"]
));
if ($slider_onayla) {
	header("Location:slider.php?durum=ok");
}
else {
	header("Location:slider.php?durum=no");
}
?>
