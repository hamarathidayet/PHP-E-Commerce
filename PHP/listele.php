<?php include "header.php";


if ($_GET["atk"]) {
$sayı=5;

if ($_GET["sayfa"] == 1) {
	$baslangıc=0;
}

else {

	$sayfa_cıkar=$_GET["sayfa"]-1;
$baslangıc=$sayı*$sayfa_cıkar;
}

$urun_sayı=0;




$urun_listele =$db->prepare("SELECT * from ürüns where
	alt_kategori=:kategori_id and urun_durum=1 limit $baslangıc,$sayı");
$urun_listele->execute(array(
	"kategori_id" => $_GET["atk"],
	
));
date_default_timezone_set('Europe/Istanbul');
$uzantılink="nebu/production/";

$urun_listeles =$db->prepare("SELECT * from ürüns where
	alt_kategori=:kategori_id and urun_durum=1");
$urun_listeles->execute(array(
	"kategori_id" => $_GET["atk"]
));

while($urun_yazdır = $urun_listeles->fetch(PDO::FETCH_ASSOC)){
	$urun_sayı++;
}





$sayfa=$_GET['sayfa'];



?>
<div class="clearfix"></div>
<div class="lines"></div>
</div>

<div class="container">
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				

			</div>

			<ul class="gridlist">


				
				<?php while ($urun_göster=$urun_listele->fetch(PDO::FETCH_ASSOC)) {

					
					
					if ($urun_göster["urun_fiyat"]-$urun_göster["urun_indirimli_fiyat"]!=$urun_göster["urun_fiyat"]) {?>
						<li class="gridlist-inner">
							<div class="white">
								<div class="row clearfix">
									<div class="col-md-4">
										<div class="pr-img">
											<div class="hot"></div>
											<a href="urun?urun_id=<?php echo $urun_göster["urun_id"] ?>"><img src="<?php echo $uzantılink.$urun_göster["urun_resim"]?>" alt="" class="img-responsive"></a>
										</div>
									</div>
									<div class="col-md-6">
										<div class="gridlisttitle"><?php echo $urun_göster["urun_ad"]?></div>
										<p class="gridlist-desc">
											<?php echo substr($urun_göster["urun_aciklama"],3,50)."..."?>
										</p>
									</div>
									<div class="col-md-2">
										<div class="gridlist-pricetag on-sale"><div class="inner"><span><span class="oldprice"><?php echo $urun_göster["urun_fiyat"]?>₺</span><?php echo $urun_göster["urun_indirimli_fiyat"]?>₺</span></div></div>
									</div>
								</div>
							</div>
							<div class="gridlist-act">


								
							</form>
								<div class="clearfix"></div>
							</div>
						</li>


					<?php } 

					elseif ($urun_göster["urun_fiyat"]-$urun_göster["urun_indirimli_fiyat"]==$urun_göster["urun_fiyat"]) {


						?>


						<li class="gridlist-inner">
							<div class="white">
								<div class="row clearfix">
									<div class="col-md-4">
										<div class="pr-img">
											<a href="urun?urun_id=<?php echo $urun_göster["urun_id"] ?>"><img src="<?php echo $uzantılink.$urun_göster["urun_resim"] ?>" alt="" class="img-responsive"></a>
										</div>
									</div>
									<div class="col-md-6">

										<div class="gridlisttitle"><?php echo $urun_göster["urun_ad"] ?></div>
										<p class="gridlist-desc">
											<?php echo substr($urun_göster["urun_aciklama"],3,50)."..."?>
										</p>
									</div>
									<div class="col-md-2">
										<div class="gridlist-pricetag blue"><div class="inner"><span><?php echo $urun_göster["urun_fiyat"] ?>₺</span></div></div>
									</div>
								</div>
							</div>
							<div class="gridlist-act">
								

								
							</form>
								<div class="clearfix"></div>
							</div>
						</li>
					<?php }


					?>




				<?php  }


				$sayfa_numara = ceil($urun_sayı/$sayı);

				?>

			</ul>

			<ul class="pagination shop-pag">
				<?php if ($_GET['sayfa']-1<=0) {
					
				} 
				else { ?>

					<li><a href="listele.php?kategori_id=<?php echo $_GET['kategori_id'] ?>&sayfa=<?php echo $_GET['sayfa']-1 ?>"><i class="fa fa-caret-left"></i></a></li>

				<?php } for ($i=1; $i <= $sayfa_numara ; $i++) { 
					
					?>
					<li><a href="listele.php?kategori_id=<?php echo $_GET['kategori_id'] ?>&sayfa=<?php echo $i ?>"><?php echo $i; ?></a></li>
				<?php }
				if ($_GET['sayfa']+1>=$i) {

				

				}
				else {
					?>
					<li><a href="listele.php?kategori_id=<?php echo $_GET['kategori_id'] ?>&sayfa=<?php echo $_GET['sayfa']+1 ?>"><i class="fa fa-caret-right"></i></a></li>
				<?php } ?>
			</ul><!--pagination-->
		</div>

		<div class="spacer"></div>
		<?php include "kategori.php" ?>
	</div>
	




</div>

<div class="spacer"></div>
</div>

<?php include "foother.php"; }




else {
	$sayı=5;

if ($_GET["sayfa"] == 1) {
	$baslangıc=0;
}

else {

	$sayfa_cıkar=$_GET["sayfa"]-1;
$baslangıc=$sayı*$sayfa_cıkar;
}

$urun_sayı=0;




$urun_listele =$db->prepare("SELECT * from ürüns where
	kategori_urun_id=:kategori_id and urun_durum=1 limit $baslangıc,$sayı");
$urun_listele->execute(array(
	"kategori_id" => $_GET["kategori_id"],
	
));
date_default_timezone_set('Europe/Istanbul');
$uzantılink="nebu/production/";

$urun_listeles =$db->prepare("SELECT * from ürüns where
	kategori_urun_id=:kategori_id and urun_durum=1");
$urun_listeles->execute(array(
	"kategori_id" => $_GET["kategori_id"]
));

while($urun_yazdır = $urun_listeles->fetch(PDO::FETCH_ASSOC)){
	$urun_sayı++;
}





$sayfa=$_GET['sayfa'];



?>
<div class="clearfix"></div>
<div class="lines"></div>
</div>

<div class="container">
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				

			</div>

			<ul class="gridlist">


				
				<?php while ($urun_göster=$urun_listele->fetch(PDO::FETCH_ASSOC)) {

					
					
					if ($urun_göster["urun_fiyat"]-$urun_göster["urun_indirimli_fiyat"]!=$urun_göster["urun_fiyat"]) {?>
						<li class="gridlist-inner">
							<div class="white">
								<div class="row clearfix">
									<div class="col-md-4">
										<div class="pr-img">
											<div class="hot"></div>
											<a href="urun?urun_id=<?php echo $urun_göster["urun_id"] ?>"><img src="<?php echo $uzantılink.$urun_göster["urun_resim"]?>" alt="" class="img-responsive"></a>
										</div>
									</div>
									<div class="col-md-6">
										<div class="gridlisttitle"><?php echo $urun_göster["urun_ad"]?></div>
										<p class="gridlist-desc">
											<?php echo substr($urun_göster["urun_aciklama"],3,50)."..."?>
										</p>
									</div>
									<div class="col-md-2">
										<div class="gridlist-pricetag on-sale"><div class="inner"><span><span class="oldprice"><?php echo $urun_göster["urun_fiyat"]?>₺</span><?php echo $urun_göster["urun_indirimli_fiyat"]?>₺</span></div></div>
									</div>
								</div>
							</div>
							<div class="gridlist-act">
								

								
							</form>
								<div class="clearfix"></div>
							</div>
						</li>


					<?php } 

					elseif ($urun_göster["urun_fiyat"]-$urun_göster["urun_indirimli_fiyat"]==$urun_göster["urun_fiyat"]) {


						?>


						<li class="gridlist-inner">
							<div class="white">
								<div class="row clearfix">
									<div class="col-md-4">
										<div class="pr-img">
											<a href="urun?urun_id=<?php echo $urun_göster["urun_id"] ?>"><img src="<?php echo $uzantılink.$urun_göster["urun_resim"] ?>" alt="" class="img-responsive"></a>
										</div>
									</div>
									<div class="col-md-6">

										<div class="gridlisttitle"><?php echo $urun_göster["urun_ad"] ?></div>
										<p class="gridlist-desc">
											<?php echo substr($urun_göster["urun_aciklama"],3,50)."..."?>
										</p>
									</div>
									<div class="col-md-2">
										<div class="gridlist-pricetag blue"><div class="inner"><span><?php echo $urun_göster["urun_fiyat"] ?>₺</span></div></div>
									</div>
								</div>
							</div>
							<div class="gridlist-act">
								
							</form>
								<div class="clearfix"></div>
							</div>
						</li>
					<?php }


					?>




				<?php  }


				$sayfa_numara = ceil($urun_sayı/$sayı);

				?>

			</ul>

			<ul class="pagination shop-pag">
				<?php if ($_GET['sayfa']-1<=0) {
					
				} 
				else { ?>

					<li><a href="listele.php?kategori_id=<?php echo $_GET['kategori_id'] ?>&sayfa=<?php echo $_GET['sayfa']-1 ?>"><i class="fa fa-caret-left"></i></a></li>

				<?php } for ($i=1; $i <= $sayfa_numara ; $i++) { 
					
					?>
					<li><a href="listele.php?kategori_id=<?php echo $_GET['kategori_id'] ?>&sayfa=<?php echo $i ?>"><?php echo $i; ?></a></li>
				<?php }
				if ($_GET['sayfa']+1>=$i) {

				

				}
				else {
					?>
					<li><a href="listele.php?kategori_id=<?php echo $_GET['kategori_id'] ?>&sayfa=<?php echo $_GET['sayfa']+1 ?>"><i class="fa fa-caret-right"></i></a></li>
				<?php } ?>
			</ul><!--pagination-->
		</div>

		<div class="spacer"></div>
		<?php include "kategori.php" ?>
	</div>
	




</div>

<div class="spacer"></div>
</div>

<?php include "foother.php"; }?>


