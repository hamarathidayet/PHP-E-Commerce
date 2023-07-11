<?php include "header.php";


$siparis=$db->prepare("SELECT * from siparis where siparis_id=:id and kullanici_id=:kullanici_id");

$siparis->execute(array(

"id" => $_GET["siparis_id"],
"kullanici_id" => $göster1["kullanici_id"]

));


$siparis_detay= $siparis->fetch(PDO::FETCH_ASSOC);

$say=$siparis->rowCount();


$böl = explode(",", $siparis_detay["siparis_urun"]);





?>

<?php 
if ($say==0) {
 	// code...
  ?>
<br><br><br>
<div class="alert alert-danger text-center"><strong>Hata</strong> Böyle bir değer bulunmadı...!</div>
 
<?php } 

else {
?>

<br><br><br><br>
<?php for ($i=1; $i < count($böl) ; $i++) {  

$urun = $db->prepare("SELECT * from ürüns where urun_id=:urun_id");

$urun->execute(array(
"urun_id" =>$böl[$i]
));
$urun_göster = $urun->fetch(PDO::FETCH_ASSOC);?>

<div style="background:white;border-radius: 10px;" class="row container ">
	<div align="right" class="col-md-11">
		<label style="cursor:pointer;"><a href="#">Kargom Nerede?</a></label>
	</div>
	<div class="col-md-3">
		<a style="color:black" href="urun?urun_id=<?php echo $urun_göster["urun_id"]; ?>">  <img width="200px" src="nebu/production/<?php echo $urun_göster["urun_resim"]; ?>">
	</div>
	<div class="col-md-5">		
		<label><?php echo $urun_göster["urun_ad"]; ?></label>
		<br>
	</div> 
</a>
		<br>

<br>

<br>



</div>
	<hr style="background-color: black;">
	<?php } ?>
<br><br><br><br><br>
<div class="col-md-3 col-md-offset-9">
	<div class="subtotal-wrap">
		<div class="subtotal">
			<p>Ödeme Yöntemi : <?php echo $siparis_detay["siparis_odeme"] ?></p>
			<p>Toplam Ürün Fiyat : <?php echo $siparis_detay["siparis_fiyat"] ?>₺</p>
			<p>Kargo ücreti : <del>20₺</del></p>
		</div>
		<div class="total">Toplam Tutar : <span class="bigprice"><?php echo $siparis_detay["siparis_fiyat"] ?>₺</span></div>

	</div>
	<div class="clearfix"></div>
</div>

<?php } ?>
<br><br><br><br><br><br><br>

<?php include "foother.php"; ?>