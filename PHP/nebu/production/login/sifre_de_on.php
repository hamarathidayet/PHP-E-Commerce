<?php include "../islem.php" ?>
<?php 

if (isset($_SESSION['onay_giris_sifre'])) {
	
}
else {
	header("Location:index.php");
}

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


			<?php if ($_SESSION['sifre_']=="hata") {
				
				?> 
				<div id="alert_hata" class="alert alert-danger text-center">Tekrar DENEYİN!</div>


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
					<input value="<?php echo $_SESSION['kullanici_sifirla'] ?>" name="Sifre" type="text" class="btn1" disabled>
					<br><br><br><br>
					<input required="" autocomplete="off" name="new_pass" type="text" class="btn1" placeholder="Yeni Şifre Giriniz">

					<br><br><br>

					<input onclick="s12()" id="deneme" name="degis_pass" type="submit" class="btn2" value="Gönder" >
					<br><br>
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