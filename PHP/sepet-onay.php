
<?php
include "nebu/production/islem.php";
session_start();
ob_start();

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
	");
$kullanicisor->execute(array(
	"mail"=>$_SESSION['kullanici_mail']
));

$kullanici_göster= $kullanicisor->fetch(PDO::FETCH_ASSOC);


$ürün_sepet=$db->prepare("SELECT * FROM sepet where kullanici_id=:kullanici_id and sepet_durum=1 and urun_adet>=1");
$ürün_sepet ->execute(array(
	"kullanici_id" => $kullanici_göster["kullanici_id"]
));




$ürün_sor=$db->prepare("SELECT * FROM ürüns where urun_id=:urun_id");
$ürün_sor ->execute(array(

	"urun_id"=>$ürün_ön["urun_id"]
));


$ürün_öne=$ürün_sor->fetch(PDO::FETCH_ASSOC);

$göster1=$kullanicisor->fetch(PDO::FETCH_ASSOC);
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
</head>
<body>

	<div class="d-flex align-items-start fixed-top">
		<div class="nav flex-column nav-pills me-3 " id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<button class="nav-link disabled" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
			<button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Kredi Kartı</button>
			<button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Havale (EFT)</button>

		</div>
		<div class="tab-content" id="v-pills-tabContent">
			<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">Lütfen Ödeme Yöntemini Seçiniz</div>
			<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
			<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
				<form>
					<ul>

						<li style="list-style-type: none;">
							
								<input class="form-check-input" type="radio" name="Ş" id="flexRadioDefault2" checked>
								<label class="form-check-label" for="flexRadioDefault2">
									İş Bankası
								</label>
						</li>

							<li style="list-style-type: none;">
								
									<input class="form-check-input" type="radio" name="Ş" id="flexRadioDefault2">
									<label class="form-check-label" for="flexRadioDefault2">
										Garanti Bankası
									</label>
						</li>


								<li style="list-style-type: none;">
									
										<input class="form-check-input" type="radio" name="Ş" id="flexRadioDefault2">
										<label class="form-check-label" for="flexRadioDefault2">
											Ziraat Bankası
										</label>
									</li>
								</ul>
								<button type="button" class="btn btn-link">Link</button>
							</form>
						</div>

					</div>
				</div>


				<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

			</body>
			</html>