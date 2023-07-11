<?php 

ob_start();
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 

	if ($_SESSION['kul']) {
		echo "Hoşgeldin ".$_SESSION['kul'];
		?>

		<a href="cikis.php">Çıkış Yap</a>


		<?php
	} 
	else { ?>

		<form method="post" action="islem.php"> 
			<input type="text" name="id">
			<br><br>
			<input type="password" name="pw">
			<br><br>
			<input type="submit" name="btn">
		</form>
		<br><br>
		<a href="curl-giris.php">Bot ile giriş Yap</a>
	<?php } ?>
</body>
</html>