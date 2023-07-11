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


$ürün_sepet=$db->prepare("SELECT * FROM sepet where kullanici_id=:kullanici_id and sepet_durum=1 and urun_adet>=1");
$ürün_sepet ->execute(array(
	"kullanici_id" => $kullanici_göster["kullanici_id"]
));



$sayı=0;
$toplam=0;


$ürün_sor=$db->prepare("SELECT * FROM ürüns where urun_id=:urun_id");
$ürün_sor ->execute(array(

	"urun_id"=>$ürün_ön["urun_id"]
));


$ürün_öne=$ürün_sor->fetch(PDO::FETCH_ASSOC);






$uzantı="../nebu/production/";

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
	<link rel="stylesheet" type="text/css" href="../css/load.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
</head>
<body>

	<div class="load-screen">
    		
    	</div>



	<div  class="CartContainer ana-ekran">

		<?php if ($_GET['durum']=="html") {?>
			<br><br><br>
			<div class="alert alert-danger text-center"><strong>Hata</strong> HTML kodlarıyla oynamayın...!</div>
		<?php } ?>


		<?php if ($_GET['durum']=="ok") {?>
			<br><br><br>
			<div class="alert alert-success text-center"><strong>Başarılı</strong> Ürün Silinmiştir!</div>
		<?php } ?>


		<?php if ($_GET['durum']=="ok-toplu") {?>
			<br><br><br>
			<div class="alert alert-success text-center"><strong>Başarılı</strong> Sepetinizdeki Ürünler Silinmiştir!</div>
		<?php } ?>


		<?php if ($_GET['durum']=="sepet-yok") {?>
			<br><br><br>
			<div class="alert alert-danger text-center"><strong>Olumsuz</strong> Sepetinizde ürün bulunmamaktadır!</div>
		<?php } ?>


		<div class="Header">
			<h3 class="Heading">Alışveriş Sepeti</h3>
			<h5><a class="Action" href="sepet_silme.php">Sepeti Boşalt</a></h5>
		</div>
		<?php while ($ürün_ön=$ürün_sepet->fetch(PDO::FETCH_ASSOC) ) {
	// code...

			$sayı=$ürün_ön["urun_adet"]+$sayı;
			$toplam= $toplam+$ürün_ön["urun_fiyat"]*$ürün_ön["urun_adet"];
			?>
			<div class="Cart-Items">
				<div class="image-box">
					<a href="../urun?urun_id=<?php echo $ürün_ön["urun_id"] ?>"><img src="<?php echo $uzantı.$ürün_ön["urun_resim"] ?>" style={{ height="120px" }} /></a>
				</div>
				<div class="about">
					<h1><?php echo substr($ürün_ön["urun_ad"], 0,15)."..." ?></h1>
					<h3 class="subtitle"><?php echo $ürün_ön["urun_fiyat"] ?> ₺</h3>
					<img src="images/veg.png" style={{ height="30px" }}/>
				</div>
				<div class="counter">

					<div class="count"><?php echo $ürün_ön["urun_adet"] ?> Adet</div>

				</div>
				<div class="prices">
					<div class="amount"><?php echo $ürün_ön["urun_adet"]*$ürün_ön["urun_fiyat"] ?> ₺</div>

					<div class="remove"><u><form method="post" action="sepet_silme_tek">
						<input type="hidden" value="<?php echo $ürün_ön["sepet_id"] ?>" name="id">

						<input type="hidden" value="<?php echo $ürün_ön["urun_adet"] ?>" name="adet">

						<button style="border:none;background:none" class="Action">Ürünü Sil</button>

					</form></u></div>
				</div>
			</div>
		<?php } ?>

		<hr> 
		<br><br><br><br>
		
		
		<br>

		<div class="checkout">
			<div class="total">
				<div>
					<div class="Subtotal">Toplam  </div>
					<div class="items"><?php echo $sayı ?> Ürün</div>
				</div>
				<div class="total-amount"><?php echo $toplam ?> ₺</div>
			</div>
			<button type="button" class="btn12" data-bs-toggle="modal" data-bs-target="#exampleModal">Sepeti Onayla</button>
			<br>
			<button class="button btn12"><a style="text-decoration: none; color: black;" href="../index.php">Alış Verişe Devam Et</a></button></div>
			<br><br>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						<?php include "sepet-onay.php" ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>



	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

		<script type="text/javascript" src="../js/jqery.js"></script>
		<script type="text/javascript" src="../js/islem.js"></script>

</body>
</html>