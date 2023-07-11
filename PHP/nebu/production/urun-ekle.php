<?php include "header.php";
$menusor= $db->prepare("SELECT * FROM kategori");

$menusor->execute();
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
							<h2>Ürün Ekle <small></small></h2>

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
										<input value="" id="name" class="form-control col-md-7 col-xs-12" autocomplete="off"  data-validate-words="2" name="urun_ad"  required="required" type="text">
									</div>
								</div>

								<div class="item form-group">

									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ürün Açiklama <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<textarea  class="ckeditor" id="editor1" name="icerik"></textarea>
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Fiyat <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input value=""  type="text" id="email" name="urun_fiyat" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">İndirimli Fiyat <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input value=""  type="text" id="email2" name="urun_indirimli_fiyat" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Stok Sayısı <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input value=""  type="text" id="number" name="urun_stok" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Kategori <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select id="_kategori" name="kategori" class="form-control">
											<?php while ($sorgu2= $menusor->fetch(PDO::FETCH_ASSOC)) {
												
												?>
												<option>
													<?php echo $sorgu2["kategori_ad"] ?> <?php   echo $sorgu2["kategori_id"] ?>
												</option>
											<?php } ?>
											
										</select>
									</div>
								</div>
								<div  class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Alt Kategori <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select id="alt_kategori" name="alt_kategori" class="form-control">
											
												<option>
													Alt Kategoriler
												</option>
								
											
										</select>
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


								<div class="form-group">
									<div align="right" class="col-md-6 col-md-offset-3">

										<button name="urun_ekle" id="send" type="submit" class="btn btn-primary">Ekle</button>
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