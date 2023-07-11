<!DOCTYPE html>
<html>
<head>

	<?php 
	session_start();
	ob_start();

	if (isset($_SESSION["kullanici_mail"])) {
		header("Location:../../");
	}
	?>
	<?php 
	include "../baglan.php";
	require_once "../islem.php"; 
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo $göster["ayar_logo"]  ?>" type="image/x-icon" />

	<title><?php echo $göster["ayar_title"] ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Island+Moments&family=Luxurious+Roman&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="./register.css">





</head>
<body>
	<img  class="bg-dark col-md-12" style="height: 100px;"src="./person1.png">
	<div   class="container">
		<br>
		<?php if ($_GET['durum']=="no") {
			?>
			<div class="alert alert-danger text-center col-md-12 ">Girmiş olduğunuz mail önceden alınmıştır...</div>
		<?php } ?>
		<div  class="div-color text-center col-md-12">
			<br>

			<br>
			<form action="../islem.php" method="post" class="container">
				<h1 style="color:white;">Kayıt Ol!</h1>
				<hr class="bg-white">
				<br>
				<label  style="color:white">Kullanıcı adı:</label><br>
				<input autocomplete="off" required="" value="" class="input-text text-center" type="text" name="kullanici_ad">
				<br>	<br>
				<label  style="color:white">Kullanıcı soyad:</label><br>
				<input autocomplete="off" required="" class="input-text text-center" type="text" name="kullanici_soyad">
				<br>	<br>
				<label style="color:white">E-Posta:</label><br>
				<input autocomplete="off" value="<?php echo $_POST['mail67'] ?>" required="" class="input-text text-center" type="email" name="kullanici_mail">
				
				<br>	<br>
				<label style="color:white">Şifre:</label><br>
				<input id="sifre" required="" class="input-text text-center" type="password" name="kullanici_password">

				<label class="" id="selam"></label>


				<br>
				<hr class="bg-white">
				<br>
				<input required=""  type="checkbox" name="">
				<a class="a-href" href="#">Okudum & Kabul Ediyorum</a>
				<br><br>
				<button id="kayıt-button" name="kayıt_ol" type="button" class="kayıt-ol"><img class="resim1" src="./peron.png"> Kayıt Ol ! </button>
				<br><br>
			</form>
		</div>		
		<br><br>
	</div>
	
	<script type="text/javascript" src="./jqery.js"></script>
	<script type="text/javascript" src="./registers.js"></script>

	
</body>
</html>