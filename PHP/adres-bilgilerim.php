<?php include "header.php";



$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
	");
$sor=$kullanicisor->execute(array(
	"mail"=>$_SESSION['kullanici_mail']
));



$göster1=$kullanicisor->fetch(PDO::FETCH_ASSOC);



$adres1= $db->prepare("SELECT * from adress where adres_id=:adres_id and kullanici_id=:kullanici_id");

$adres1->execute(array(

"adres_id"=>$_GET['id'],
"kullanici_id" => $göster1["kullanici_id"]
));

$adress= $adres1->fetch(PDO::FETCH_ASSOC);	
$say_adres = $adres1->rowCount();

?>
<div class="clearfix"></div>
<div class="lines"></div>
</div>
<input type="hidden" class="adres-id-al" id="<?php echo $_GET["id"] ?>" name="">
<div class="container">
	<br><br>
	<div id="alert-adres" style="display: none;" class="alert alert-success text-center"><strong>Başarılı</strong> Biligler Güncellendi</div>
	<?php if ($say_adres==1) {?>

<div id="tablo-adres">
	
			<div class="total"><button type="button" id="btn-adres-güncelle" class="btn btn-primary btn-lg">Güncelle</button></div>

	</form>
</div>
<?php }

else { ?>
<div class="alert alert-danger text-center"><strong>Hata</strong> SANA AİT BÖYLE BİR ADRES BULUNAMADI</div>
	<?php } ?>
	</div>
	<div class="clearfix"></div>
</div>
</div>
</form>
<div class="spacer"></div>
</div>

<?php include "foother.php" ?>