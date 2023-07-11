<?php require_once "header.php";
include "nebu/production/islem.php";
$slidersor= $db->prepare("SELECT * FROM slider");
$uzantılink="nebu/production/";
$slidersor->execute();
$urun_listele =$db->prepare("SELECT * from ürüns where urun_durum=1 and one_cikar=1 order by rand() limit 10");
$urun_listele->execute();

?>
<br><br><br>
<?php if ($_GET['durum']=="siparis_alındı") {?>

	<div id="siparis_onay_alert" class="alert alert-success text-center"><p><strong><i class="fa-solid fa-circle-check"></i> Başarılı</strong> siparişiniz alınmıştır. Size göderdiğimiz mail ile gereli adamları uygulayarak siparişiniz onaylanıp en kısa sürede elinize ulaşacaktır.</p>

		<p>Bizi tercih etiğğiniz için teşekkür ederiz.</p>
		<p>-----Sevgilerle <?php echo $göster["ayar_title"] ?> <i class="fa-solid fa-face-smile"></i> -----</p>

	</div>

<?php } ?>
<br><br><br>
<div class="jumbotron jumbotron-fluid bg-success">
	<h1 class="display-4">Hoşgeldin <?php echo $göster1["kullanici_ad"] ?></h1>
	<br>
	<p class="lead">2022 yılında kurulmuş olmaktayız. Sitemizin tüm hakları saklıdır. bunlar bir hayal ürünü olup hiçbiri gerçeğe dayanmamaktadır.</p>
	<hr class="my-4">
	<p>Merak  ettiğiniz birşey olursa bana instagram üzerinden  ulaşa bilirsiniz!</p>
	<p class="text-center text-danger">Sevilerle <?php echo $göster["ayar_title"] ?></p>
	<p class="lead">
		<a target="_blank" class="btn btn-primary btn-lg" href="https://www.instagram.com/hamarat.67" role="button">İnstagram</a>
	</p>

</div>
<div class="clearfix"></div>
<div class="lines"></div>
<?php include "slider.php" ?>
<div class="bar"></div>
<br>
</div>
<div class="f-widget featpro">
	<div class="container">
		<div class="row">
		<div class="title-widget-bg">
			<div class="title-widget">Öne Çıkan Ürünler</div>
			<div class="carousel-nav">
				<a class="prev"></a>
				<a class="next"></a>
			</div>
		</div>
		<div id="product-carousel" class="owl-carousel owl-theme">

			<?php while ($urun_göster=$urun_listele->fetch(PDO::FETCH_ASSOC)) {

				?>


				<?php if ($urun_göster["urun_fiyat"]-$urun_göster["urun_indirimli_fiyat"]!=$urun_göster["urun_fiyat"]) {

					?>

					<div class="item">
						<div class="productwrap">
							<div class="pr-img">
								<div class="hot"></div>
								<a href="urun?urun_id=<?php echo $urun_göster["urun_id"] ?> "><img src="nebu/production/<?php echo $urun_göster["urun_resim"] ?>" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $urun_göster["urun_fiyat"] ?>₺</span><?php echo $urun_göster["urun_indirimli_fiyat"] ?>₺</span></div></div>
							</div>
							<span class="smalltitle"><a href="urun?urun_id=<?php echo $urun_göster["urun_id"] ?>  "><?php echo $urun_göster["urun_ad"] ?></a></span>
							<br>
						</div>
					</div>
				<?php }
				elseif ($urun_göster["urun_fiyat"]-$urun_göster["urun_indirimli_fiyat"]==$urun_göster["urun_fiyat"]) {

					?>
					<div class="item">
						<div class="productwrap">
							<div class="pr-img">
								<a href="urun?urun_id=<?php echo $urun_göster["urun_id"] ?>  "><img src="nebu/production/<?php echo $urun_göster["urun_resim"] ?>" alt="" class="img-responsive"></a>
								<div class="pricetag blue"><div class="inner"><span><?php echo $urun_göster["urun_fiyat"] ?>₺</span></div></div>
							</div>
							<span class="smalltitle"><a href="urun?urun_id=<?php echo $urun_göster["urun_id"] ?>  "><?php echo $urun_göster["urun_ad"] ?></a></span>
							<br>
						</div>
					</div>
				<?php } }?>
			</div>
		</div>
	</div>
</div>
</div>



<div class="container">
	
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title">Alış-Veriş Nedir?</div>
			</div>
			<p class="ct">
				Alışveriş, bir mal ya da hizmeti para karşılığı alma ve satma işidir. Eskiden daha çok bakkal ve benzeri küçük esnaftan yapılırken günümüzde daha çok alışveriş merkezlerine kaymıştır. İnsanların kendi üretemedikleri malları ve ihtiyaçları bir bedel karşılığında almalarına dayanır. Tarihte takas ile başlamıştır.,

				
			</p>
			<p class="ct">
				Fiziksel alışverişin yanı sıra günümüzde sık kullanılmaya başlayan E-ticaret( İnternetten Ticaret) yöntemidir. Giyimden,elektroniğe elektronikten oyun ,hediyelik sektörüne kadar yüzlerce sektörde binlerce hatta milyonlarca ürünle karşılaşmanız ve satın almanız mümkündür.
			</p>
			<a href="" class="btn btn-default btn-red btn-sm">Devamını Oku</a>
		</div>
		<?php include "kategori.php" ?>






	</div><!--Products-->
	<div class="spacer"></div>
	<!--Main content-->
	
</div>
</div>

<?php include "foother.php" ?>