<?php include "header.php";
if (isset($_POST['arama'])) {



$urun_sayı=0;

$aranan=$_POST['arama'];
$urun_listele = $db->prepare("SELECT * from ürüns where
	urun_ad LIKE ?");
$urun_listele->execute(array("%$aranan%"));

$uzantılink="nebu/production/";

$urun_listeles =$db->prepare("SELECT * from kategori where
	kategori_id=:kategori_id");
$urun_listeles->execute(array(
	"kategori_id" => $_GET["kategori_id"]
));

}

else {
	header("Location:index");
}




?>
<div class="clearfix"></div>
<div class="lines"></div>
</div>

<div class="container">
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			
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
								<a href="satın-alma.php?ürün=<?php echo $urun_göster["urun_id"] ?>"><span class="trolly">&nbsp;</span>Satın al</a>
								<a href="sepet.php?ürün=<?php echo $urun_göster["urun_id"] ?>"><i class="fa fa-plus"></i>Sepete ekle</a>
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
								<a href="satın-alma.php?ürün=<?php echo $urun_göster["urun_id"] ?>"><span class="trolly">&nbsp;</span>Satın al</a>
								<a href="sepet.php?ürün=<?php echo $urun_göster["urun_id"] ?>"><i class="fa fa-plus"></i>Sepete ekle</a>
								<div class="clearfix"></div>
							</div>
						</li>
					<?php }


					?>




				<?php  }?>

			</ul>
		</div>
		<div class="spacer"></div>
		<?php include "kategori.php" ?>
	</div><!--sidebar-->

</div>

<div class="spacer"></div>
</div>

<?php include "foother.php" ?>