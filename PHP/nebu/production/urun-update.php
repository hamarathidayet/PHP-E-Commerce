<?php include "header.php";
$menusor= $db->prepare("SELECT * FROM kategori");

$menusor->execute();

$kullanici12= $db->prepare("SELECT * FROM ürüns where urun_id=:urun_id");
$kullanici12->execute(array(

	"urun_id" => $_GET['id']
));

$kul=$kullanici12->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
				</div>

				<div class="title_right">
					<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					</div>
				</div>
			</div>
			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Menu Ekle <small></small></h2>

							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<form  enctype="multipart/form-data"  action="islem.php" method="post" class="form-horizontal form-label-left" novalidate>
								<?php 
								if ($_GET['durum']=="ok") {

									?>
									<b style="color:green">İşlem Başarılı...</b><?php
								}

								elseif ($_GET['durum']=="no") {
									?>
									<b style="color:red">Birşeyler ters gitti...</b>
									<?php 
								}
								?>
								<br><br>
								<div class="item form-group">

									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ürün Ad <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input value="<?php echo $kul["urun_ad"] ?>" id="name" class="form-control col-md-7 col-xs-12" autocomplete="off"  data-validate-words="2" name="urun_ad"  required="required" type="text">
									</div>
								</div>

								<div class="item form-group">

									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ürün Açiklama <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<textarea  class="ckeditor" id="editor1" name="icerik"><?php echo $kul["urun_aciklama"] ?></textarea>
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Fiyat <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input value="<?php echo $kul["urun_fiyat"] ?>"  type="text" id="email" name="urun_fiyat" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">İndirimli Fiyat <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input value="<?php echo $kul["urun_indirimli_fiyat"] ?>"  type="text" id="email2" name="urun_indirimli_fiyat" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Stok Sayısı <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input value="<?php echo $kul["urun_kalan"] ?>"  type="text" id="number" name="urun_stok" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
									</div>
									<input type="hidden" name="id" value="<?php echo $kul["urun_id"] ?>">
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim<br><span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">

										<?php 
										if (strlen($göster['ayar_logo'])>0) {?>

											<img width="200"  src="<?php echo $kul["urun_resim"] ?>">

										<?php } else {?>


											<img width="200"  src="image/resim-yok.png">


										<?php } ?>


									</div>
								</div>
								<div class="form-group">
									
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="file" id="first-name"  name="slider_resimyol"  class="form-control col-md-7 col-xs-12">
										</div>
									</div>

								</div> 

								<div class="item form-group">

									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ürün Durum <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<?php if ($kul["urun_durum"]==1) {
									
									?>
									<label   class="switch">
										<input name="radio" type="checkbox" checked>

										<span  class="slider round"></span>
									</label>

								<?php }
								else { ?>
									<label class="switch">
										<input name="radio" type="checkbox">
										
										<span name="radio" class="slider round"></span>
									</label>

								<?php } ?>
									</div>
								</div>


								<div class="form-group">
									<div align="right" class="col-md-6 col-md-offset-3">

										<button name="urun_guncelle" id="send" type="submit" class="btn btn-success">Güncelle</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page content -->

	<?php require_once "foother.php" ?>