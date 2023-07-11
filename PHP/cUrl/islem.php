<?php 
ob_start();
session_start();

if ($_POST['id']=="hido" && $_POST['pw']==1234) {
	$_SESSION['kul']=$_POST['id'];
	header("Location:giris-duzen.php");
}
else {

echo "Yanlış Girdin Lütfen Tekrar Dene "."<a href=\"giris-duzen.php\">Geri Git</a>";

}

 ?>
