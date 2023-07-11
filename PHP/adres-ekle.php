<?php include "header.php";

$adres= $db->prepare("SELECT * from adress where adres_id=:adres_id");

$adres->execute(array(

"adres_id"=>$_GET['id']
));

$adress= $adres->fetch(PDO::FETCH_ASSOC);

?>
<div class="clearfix"></div>
<div class="lines"></div>
</div>

<div class="container">
	<br>
	<?php if ($_GET['durum']=="ok") {?>
		<div id="alert-da" class="alert alert-success text-center"><strong>Başarılı</strong> ekleme işlemi yapıldı!</div>
	<?php } ?>

	<?php if ($_GET['durum']=="no") {?>
		<div id="alert-da" class="alert alert-danger text-center"><strong>Hata</strong> beklenmedik bir hata oluştu!</div>
	<?php } ?>

	<form  id="form-güncelle" action="nebu/production/islem.php"  method="post" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-12 bill">
				<div class="title-bg">
					<div class="title">Adress bilgileri</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" value="<?php echo $adress["adres_ad"] ?>" class="form-control" id="company" name="_adres_ad" placeholder="Adress takma adı">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" name="_alici_ad" value="<?php echo $adress["alici_ad"] ?>" class="form-control" id="name" placeholder="Alıcı ad">
					</div>
					<div class="col-sm-6">
						<input type="text" name="_alici_soyad" value="<?php echo $adress["alici_soyad"] ?>" class="form-control" id="last_name" placeholder="Alıcı soyad">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="_adres" value="<?php echo $adress["adres"] ?>" class="form-control" id="address" placeholder="Adress">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" name="_sehir" class="form-control" value="<?php echo $adress["sehir"] ?>" id="city" placeholder="Şehir">
					</div>
					<div class="col-sm-6">
						<input type="text" name="_posta kodu" value="<?php echo $adress["posta_kodu"] ?>" class="form-control" id="post_code" placeholder="Posta Kodu">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" name="_ilce" value="<?php echo $adress["ilce"] ?>" class="form-control" id="country" placeholder="İlçe">
					</div>
					<div class="col-sm-6">
						<input type="text" name="_mahalle" value="<?php echo $adress["mahalle"] ?>" class="form-control" id="state" placeholder="Mahalle">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="text" name="mail_adres" value="<?php echo $adress["mail"] ?>" class="form-control" id="email" placeholder="Email">
					</div>
					<div class="col-sm-6">
						<input type="text" name="_no" value="<?php echo $adress["no"] ?>" class="form-control" id="phone" placeholder="Telefon Numarası">
						<input type="hidden"  value="<?php echo $adress["adres_id"] ?>" name="id">
					</div>
				</div>
			</div>

		</div>




		<div class="total"><button name="kullanici_akle_adres" id="btn-adres-ekle" class="btn btn-danger btn-lg">Ekle</button></div>

	</form>
<div class="spacer"></div>
</div>

<?php include "foother.php" ?>