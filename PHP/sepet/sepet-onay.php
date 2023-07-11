
<?php
include "../nebu/production/islem.php";
session_start();
ob_start();

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
	");
$kullanicisor->execute(array(
	"mail"=>$_SESSION['kullanici_mail']
));

$kullanici_göster= $kullanicisor->fetch(PDO::FETCH_ASSOC);

$urun_sepet=$db->prepare("SELECT * FROM sepet where kullanici_id=:kullanici_id and sepet_durum=1 and urun_adet>=1");
$urun_sepet ->execute(array(
	"kullanici_id" => $kullanici_göster["kullanici_id"]
));

$toplam=0;

$say=0;
while ($urun_getir=$urun_sepet->fetch(PDO::FETCH_ASSOC)) {

	$toplam = $toplam + $urun_getir["urun_adet"]*$urun_getir["urun_fiyat"];
	$say= $say+$urun_getir["urun_adet"];

	
}








//Banka çekimi


$banka=$db->prepare("SELECT * from banka_ayarları");
$banka->execute(array());


// ADRES

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
	");
$sor=$kullanicisor->execute(array(
	"mail"=>$_SESSION['kullanici_mail']
));



$göster1=$kullanicisor->fetch(PDO::FETCH_ASSOC);



$adres1= $db->prepare("SELECT * from adress where  kullanici_id=:kullanici_id");

$adres1->execute(array(


	"kullanici_id" => $göster1["kullanici_id"]
));




?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $göster["ayar_description"] ?>">
	<meta name="keywords" content="<?php echo $göster["ayar_keywords"] ?>">
	<meta name="author" content="<?php echo $göster["ayar_author"] ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $göster["ayar_title"] ?> Sepet</title>
	<link rel="icon" href="<?php echo $uzantı.$göster["ayar_logo"] ?>" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
	<br><br><br><br>
	<div class="container">
		<?php if ($say>0) {
			// code...
			?>
			<div class="d-flex align-items-start ">

				<div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<button class="nav-link disabled" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
					<button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Kredi Kartı</button>
					<button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Havale (EFT)</button>

				</div>
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"><p>Sepetinizde <strong>TOPLAM <?php echo $say?> ÜRÜN VE <?php echo $toplam ?>₺ </strong>'lik bir ödemeniz bulunmaktadır. Lütfen ödeme yöntemini yan taraftan seçiniz. </div>
						<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
						<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
							<form action="../nebu/production/islem.php" method="post">
								<div id="banka_1">
									<ul>
										<?php while ($banka_getir=$banka->fetch(PDO::FETCH_ASSOC)) {?>

											<li style="list-style-type: none;">

												<input class="form-check-input" type="radio" value="<?php echo $banka_getir["banka_id"] ?>" name="banka_id" id="flexRadioDefault2" checked>
												<label class="form-check-label" for="flexRadioDefault2">
													<?php echo $banka_getir["banka_ad"] ?>
												</label>
											</li>
										<?php } ?>

									</ul>

									<button id="form-1-button" type="button" class="btn btn-outline-danger form-control">İleri</button>
								</div>
								<div style="display: none;" id="banka_2">
									<br>
									<div >Adress Seçiniz!</div>
									<br>
									<select name="adress" class="form-select" aria-label="Default select example">
										
										<?php  while ($adress= $adres1->fetch(PDO::FETCH_ASSOC)) {?>
											<option value="<?php  echo $adress["adres_id"]  ?>"><?php  echo $adress["adres_ad"]  ?></option>
										<?php } ?>
										
									</select>
									<br>
									<button name="havale_islem" id="form-1-button" class="btn btn-outline-danger form-control">Havale işlemini başlat</button>
								</div>
								
							</form>
						</div>

					</div>
				</div>
			<?php }  
			else {?>
				<div class="alert alert-danger text-center"><i class="fa-solid fa-triangle-exclamation"></i> <strong>Lütfen</strong> sepetenize  ürün ekleyiniz!</div>
			<?php } ?>
		</div>


		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../js/jqery.js"></script>
		<script type="text/javascript" src="../js/islem.js"></script>

	</body>
	</html>