<?php include "header.php";

$urun_getir=$db->prepare("SELECT * from ürüns where urun_id=:urun_id");

$urun_getir->execute(array(
	"urun_id" => $_GET['urun_id']

));
$uzantılink="nebu/production/";
$urun_göster = $urun_getir->fetch(PDO::FETCH_ASSOC);

$say=$urun_getir->rowCount();

$uzantı="nebu/production/";
?>

<?php if ($say==1) {
	// code...
	?>

	<div class="container">

		<div class="row">


			<?php if ($_GET['durum']=="eklendi") {?>
				<br><br><br>
				<div class="alert alert-success text-center"><strong>Başarılı</strong> Ürün sepetinize eklenmiştir!</div>
			<?php } ?>


			<?php if ($_GET['durum']=="yorum-ekle") {?>
				<br><br><br>
				<div class="alert alert-success text-center"><strong>Başarılı</strong> Yorumunuz gönderilmiştir!</div>
			<?php } ?>


			<?php if ($_GET['durum']=="hata") {?>
				<br><br><br>
				<div class="alert alert-danger text-center"><strong>Hata</strong> Daha sonra tekrar deneyiniz!</div>
			<?php } ?>

			<?php if ($_GET['durum']=="adet-az") {?>
				<br><br><br>
				<div class="alert alert-danger text-center"><strong>Ürün stoklarımızda mevcut değildir!</strong></div>
			<?php } ?>

			<?php if ($_GET['durum']=="adet") {?>
				<br><br><br>
				<div class="alert alert-danger text-center"><strong>Hata</strong> HTML kodlarıyla oynamayın...!</div>
			<?php } ?>


			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title"><?php echo $urun_göster["urun_ad"] ?></div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="dt-img">
							<div class="detpricetag"><div class="inner">



								<?php 

								if ($urun_göster["urun_fiyat"]-$urun_göster["urun_indirimli_fiyat"]!=$urun_göster["urun_fiyat"]) {

									echo $urun_göster["urun_indirimli_fiyat"];?>₺
								<?php  }
								elseif ($urun_göster["urun_fiyat"]-$urun_göster["urun_indirimli_fiyat"]==$urun_göster["urun_fiyat"])
								{
									echo $urun_göster["urun_fiyat"];?>₺

								<?php }
								$urun_tarih=explode(" ", $urun_göster["urun_eklenme_tarihi"]);

								?>









							</div></div>
							<a class="fancybox" href="<?php echo $uzantı.$urun_göster["urun_resim"] ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo $uzantı.$urun_göster["urun_resim"] ?>" alt="" class="img-responsive"></a>
						</div>
						<?php 
						$resim_getir=$db->prepare("SELECT * from urunfoto where urun_id=:urun_id");

						$resim_getir->execute(array(

							"urun_id" => $urun_göster["urun_id"]

						));

						while ($urun_resim_göster=$resim_getir->fetch(PDO::FETCH_ASSOC)) {

							?>
							<div class="thumb-img">
								<a class="fancybox" href="nebu/<?php echo $urun_resim_göster["urunfoto_resimyol"] ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="nebu/<?php echo $urun_resim_göster["urunfoto_resimyol"] ?>" alt="" class="img-responsive"></a>
							</div>

						<?php } ?>
					</div>
					<div class="col-md-6 det-desc">
						<div class="productdata">
							<div class="infospan">Ürün Kodu <span><?php echo $urun_göster["urun_id"] ?> </span></div>

							<div class="infospan">Yüklenme Zamanı<span><?php echo $urun_tarih[0] ?> </span></div>



							<form class="form-horizontal ava" role="form" action="nebu/production/islem.php" method="post">
								<br><br>
								<div class="form-group">
									<label for="qty" class="col-sm-2 control-label">Adet</label>
									<div class="col-sm-4">
										
										<input name="adet" type="number" value="1" min="1" max="<?php echo $urun_göster["urun_kalan"] ?>" class="form-control">
									</div>

									<div class="col-sm-4">

										<input type="hidden" value="<?php echo $_GET['urun_id'] ?>"  name="urun_id">
										<?php if ($urun_göster["urun_kalan"]==0) { ?>
											<button type="button" class="btn btn-default btn-red "><del>STOKLARIMIZDA YOK</del></button>

										<?php } 
										else { ?>
											<button type="submit" name="sepet_ekle" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle</span></button>
										<?php } ?>
									</div>

									<div class="clearfix"></div>
								</div>
							</form>

							<div class="sharing">
								
								<div class="avatock"><span>Kalan ürün sayısı : <?php echo $urun_göster["urun_kalan"] ?></span></div>
							</div>
							<br>
							<div class="sharing">

								<?php 


								$ürün_sepet1=$db->prepare("SELECT * FROM sepet where urun_id=:urun_id");
								$ürün_sepet1 ->execute(array(
									"urun_id" => $_GET["urun_id"]));
								$say1=0;

								while($urun_sor1 =$ürün_sepet1->fetch(PDO::FETCH_ASSOC)) {

									$say1=$say1+$urun_sor1["urun_adet"];
								}


        //SEPET SORGULAMA BİTİŞ

								?>
								
								<div class="avatock"><span>Sepetlerde duran ürün sayısı : <?php echo $say1 ?></span></div>
							</div>

						</div>
					</div>
				</div>
				<?php 
				$yorum_getir1=$db->prepare("SELECT * from yorum where urun_id=:urun_id and urun_yorum=1");


				$yorum_getir1->execute(array(

					"urun_id" => $urun_göster["urun_id"]
				));

				$sayı1=0;
				while ($yorum1=$yorum_getir1->fetch(PDO::FETCH_ASSOC)) {
					$sayı1++;
				}







				?>

				<div class="tab-review">
					<ul id="myTab" class="nav nav-tabs shop-tab">
						<li class="active"><a href="#desc" data-toggle="tab">Açıklama</a></li>
						<li class=""><a href="#rev" data-toggle="tab">Yorumlar (<?php echo $sayı1; ?>)</a></li>
					</ul>
					<div id="myTabContent" class="tab-content shop-tab-ct">
						<div class="tab-pane fade active in" id="desc">
							<p>
								<?php echo $urun_göster["urun_aciklama"] ?>
							</p>
						</div>
						<div class="tab-pane fade" id="rev">

							<?php 
							$yorum_getir=$db->prepare("SELECT * from yorum where urun_id=:urun_id and urun_yorum=1 ORDER BY yorum_id DESC");


							$yorum_getir->execute(array(

								"urun_id" => $urun_göster["urun_id"]
							));

							while ($yorum=$yorum_getir->fetch(PDO::FETCH_ASSOC)) {

								?>
								<p class="dash">
									<span> -    <?php echo $yorum["kullanici_ad"]." ".$yorum["kullanici_soyad"]; ?></span> (<?php echo $yorum["yorum_tarih"]?>)<br><br>
									<?php echo $yorum["yorum"]?>
								</p>


							<?php } if (isset($_SESSION['kullanici_mail'])) {

								?>

								<h4>Yorum Yazın</h4>
								<form action="nebu/production/islem.php" method="post" role="form">

									<div class="form-group">
										<textarea name="yorum" style="resize: none;" class="form-control" id="text"></textarea>
									</div>
									<div class="form-group">
										<input type="hidden" name="urun_id" value="<?php echo $urun_göster["urun_id"] ?>">

									</div>
									<button name="yorum_ekle" type="submit" class="btn btn-default btn-red btn-sm">Gönder</button>
								</form>

							<?php } 

							else {
								
								?>
								<div style="cursor: pointer;" class="alert alert-info">Yorum yazabilmek için <a href="nebu/production/login">giriş</a> yapın veya <a href="nebu/production/register">kayıt</a> olun!</div>

							<?php } ?>

						</div>
					</div>
				</div>

				<div id="title-bg">
					<div class="title">Benzer Ürünler</div>
				</div>



				<div class="row prdct"><!--Products-->

					<?php 
					$kategori_id = $urun_göster["kategori_urun_id"];



					$urun_getir1=$db->prepare("SELECT * from ürüns where kategori_urun_id=:kategori_urun_id  ORDER by rand() limit 3 ");

					$urun_getir1->execute(array(
						"kategori_urun_id" => $kategori_id
					));

					while ($urun_göster1=$urun_getir1->fetch(PDO::FETCH_ASSOC)) { 

						if ($urun_göster1["urun_fiyat"]-$urun_göster1["urun_indirimli_fiyat"]!=$urun_göster1["urun_fiyat"]) {?>
							<div class="col-md-4">
								<div class="productwrap">
									<div class="pr-img">
										<div class="hot"></div>
										<a href="urun?urun_id=<?php echo $urun_göster1["urun_id"] ?>"><img src="<?php echo $uzantılink.$urun_göster1["urun_resim"] ?>" alt="" class="img-responsive"></a>
										<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $urun_göster1["urun_fiyat"] ?>₺</span><?php echo $urun_göster1["urun_indirimli_fiyat"] ?>₺</</span></div></div>
									</div>
									<span class="smalltitle"><a href="urun?urun_id=<?php echo $urun_göster1["urun_id"] ?>"><?php echo $urun_göster1["urun_ad"] ?></a></span>

								</div>
							</div>
						<?php 	} 

						else {
							?>
							<div class="col-md-4">
								<div class="productwrap">
									<div class="pr-img">
										<a href="urun?urun_id=<?php echo $urun_göster1["urun_id"] ?>"><img src="<?php echo $uzantılink.$urun_göster1["urun_resim"] ?>" alt="" class="img-responsive"></a>
										<div class="pricetag"><div class="inner"><?php echo $urun_göster1["urun_fiyat"] ?>₺</div></div>
									</div>
									<span class="smalltitle"><a href="urun?urun_id=<?php echo $urun_göster1["urun_id"] ?>"><?php echo $urun_göster1["urun_ad"] ?></a></span>

								</div>
							</div>
						<?php }} ?>
					</div>
					
					</<!--Products-->
					<div class="spacer"></div>
				</div><!--Main content-->
				<?php include "kategori.php" ?>
			</div>
		</div>

		<?php include "foother.php" ?>

	<?php } 


	elseif($say==0)
	{
		?>
		<br><br><br>

		<div class="alert alert-danger text-center"><strong>Hata </strong> böyle bir ürün bulunamadı!</div>
		<?php } ?>