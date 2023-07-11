<?php include "../islem.php" ?>
<?php 

if (isset($_SESSION["kullanici_mail"])) {
	header("Location:../../");

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="guzel.css">

</head>
<body style="background-image: url(./arkaplan.png)">
	<br>
	<div class="container">
		<div align="center" class="col-md-12">
			<?php if ($_GET['durum']=="no") {
				
				?> 
				<div id="alert_hata" class="alert alert-danger text-center">Hatalı kullanıcı adı veya şifre!</div>


			<?php }?>

			<?php if ($_GET['durum']=="kayıt") {
				
				?> 
				<div id="alert_hata" class="alert alert-success text-center">Kayıt başarılı, lütfen giriş yapın!</div>


			<?php }?>


			<?php if ($_SESSION['durum']=="sifre_hatası") {
				
				?> 
				<div id="alert_hata" class="alert alert-danger text-center">Mail Adresi Bulunmuyor!</div>


				<?php

				unset($_SESSION['durum']);
			}
			?>

			<?php if ($_SESSION['sifre_']=="degisti") {
				
				?> 
				<div id="alert_hata" class="alert alert-success text-center">Şifre değiştiriliştir lütfen giriş yapın!</div>


				<?php

				unset($_SESSION['sifre_']);
			}
			?>
		</div>
		<br>

		<div  style="width: 350px ; margin-left: 35% ;  height:600pxpx;background-color: white; border-radius: 15px;">


			<br>
			<img  style="width: 200px;margin-left: 70px;" src="./res1.png">
			<div id="giris_ayar">
				<form  action="../islem.php" method="post">
					<br><br>
					<!--             İNPUTLAR                     -->
					<input required="" name="mail" type="email" class="btn1"
					<?php if (isset($_COOKIE['mail'])) {?>
						value="<?php echo $_COOKIE['mail'] ?>"
					<?php }
					else { ?>

						placeholder="Kullanıcı Adı (Gmail)"<?php } ?>>
						<br><br><br><br>
						<input required="" name="password" type="password" class="btn1"
						<?php if (isset($_COOKIE['mail'])) {?>
							value="<?php echo $_COOKIE['sifre'] ?>"
						<?php }
						else { ?>

							placeholder="Kullanıcı Adı (Gmail)"<?php } ?>>

							<br><br>

							<div align="center">
								<div class="form-check">
									<input class="form-check-input"
									<?php if (isset($_COOKIE['mail'])) {?>
										checked
									<?php }?>
									type="checkbox" name="hatırla-beni" id="defaultCheck1">

								Beni hatırla!</div>
							</div>
							<br>
							<input onclick="s12()" id="deneme" name="login" type="submit" class="btn2" value="Giriş" >
							<br><br>
						</form>

						<button id="tikla_unut" style="color:#A078FF;text-decoration: none; margin-left: 100px;border: none; background:none;cursor: pointer; ">Şefreni mi unuttun ?</button>
					</div>

					<div style="display:none" id="unut_sifre">




						<form method="post" action="../islem.php">
							<br><br>
							<input required="" name="unut_sifre" type="email" class="btn1" placeholder="Mail Adresiniz">

							<br><br><br>

							<input onclick="s12()" id="deneme" name="sifre_unut_login" type="submit" class="btn2" value="Gönder" >
							<br><br>
							<button type="button" id="tikla_giris" style="color:#A078FF;text-decoration: none; margin-left: 130px;border: none; background:none;cursor: pointer; ">Giriş yap!</button>
						</form>

					</div>
					<br><br>
				</div>
			</div>







			<script src="../js/jqery.js"></script>
			<script  src="../js/islem.js"></script>





			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


			<script type="text/javascript">
				$(function(){

				})

			</script>


		</body>
		</html>