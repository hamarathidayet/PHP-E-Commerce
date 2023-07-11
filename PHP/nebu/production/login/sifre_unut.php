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
			
			<?php if ($_SESSION['pass_']=="uyumsuz") {
				
				?> 
				<div id="alert_hata" class="alert alert-danger text-center">Kod uyuşmazlığı!</div>


			<?php
unset($_SESSION['pass_']);

			 }
			?>
		</div>
		<br>

		<div  style="width: 350px ; margin-left: 35% ;  height:600pxpx;background-color: white; border-radius: 15px;">
<br><br>
<div class="text-center">Mail adresinize bir kod gönderilmişdir. İlerlemek için doğru bir şekilde giriniz.</div>

<div><?php echo $_SESSION['rand_'] ?></div>

			<br>
			<img  style="width: 200px;margin-left: 70px;" src="./res1.png">
			<div id="giris_ayar">
				<form  action="../islem.php" method="post">

					<br><br>
					<!--             İNPUTLAR                     -->
					<input autocomplete="off"  name="reset_password" type="text" class="btn1" placeholder="Kod">
					
					
					<br><br><br>

					<input onclick="s12()" id="deneme" name="onay_sifre" type="submit" class="btn2" value="Gönder" >
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