<?php include "header.php"; ?>

<div class="container">
	<br><br><br>
	<?php if ($_GET['durum']=="esleme-hatası") {?>
		<div id="alert-da" class="alert alert-danger text-center"><strong>Hata</strong> hatalı Şifre!</div>
	<?php } ?>

	<?php if ($_GET['durum']=="sifre-hatası") {?>
		<div id="alert-da" class="alert alert-danger text-center"><strong>Hata</strong> sifreler uyuşmuyor!</div>
	<?php } ?>

	<?php if ($_GET['durum']=="ok") {?>
		<div id="alert-da" class="alert alert-success text-center"><strong>Başarılı</strong> güncelleme işlemi yapıldı!</div>
	<?php } ?>

	<?php if ($_GET['durum']=="no") {?>
		<div id="alert-da" class="alert alert-danger text-center"><strong>Hata</strong> beklenmedik bir hata oluştu!</div>
	<?php } ?>

	<?php if ($_GET['durum']=="sifre-uzunluk") {?>
		<div id="alert-da" class="alert alert-danger text-center"><strong>Hata</strong> şifrenizi en az 8 (sekiz) karakter girmeniz gerekmektedir!</div>
	<?php } ?>

	<form class="form-horizontal checkout" action="nebu/production/islem.php" method="post" role="form">
		<div class="row">
			<div id="form-ana">
				<div class="col-md-12">
					<div class="title-bg">
						<div class="title text-center">Kişisel Bilgiler</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input  type="text" value="<?php echo $göster1["kullanici_ad"] ?>" autocomplete="off" class="form-control" id="name" name="kullanici_ad" placeholder="Ad">
						</div>
						<div class="col-sm-6">
							<input type="text" value="<?php echo $göster1["kullanici_soyad"] ?>" autocomplete="off" class="form-control" id="Soyad"
							name="kullanici_soyad" placeholder="Soyad">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" value="<?php echo $göster1["kullanici_mail"] ?>" name="kullanici_mail" readonly="" class="form-control" id="email" placeholder="Email">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" value="<?php echo $göster1["kullanici_no"] ?>" name="kullanici_no" autocomplete="off" class="form-control" id="phone" placeholder="Telefon">
						</div>
						
					</div>
					<div class="title-bg">
						<div class="title">Şifre Ayarı</div>
					</div>
					
					<div class="form-group dob">
						<div class="col-sm-6">
							<input name="sifre_1" type="password" class="form-control" id="conpass" placeholder="Yeni Şifre">
						</div>

						<div class="col-sm-6">
							<input name="sifre_2" type="password" class="form-control" id="pass" placeholder="Yeni Şifre Tekrar">
						</div>
						<input type="hidden" value="<?php echo $göster1["kullanici_id"] ?>" name="id">
						
					</div>
					<button type="button" id="btn-1" class="btn btn-danger ">Güncelle</button>
				</div>

				
			</div>
			<div id="form-sifre">

				<div  class="col-sm-12">
					<input required="" name="old_sifre" type="password" class="form-control" id="pass" placeholder="Devam etmek için eski şifrenizi girin">
					<br>
					<button name="k_gün" type="submit" id="onayla" class="btn btn-danger ">Gönder</button>

					<br>
				</div>

			</div>
			<br>
		</form>
	</div>

	<div class="spacer"></div>
</div>
<script type="text/javascript" src="js/jqery.js"></script>
<script type="text/javascript" src="js/islem.js">

</script>
<?php include "foother.php" ?>