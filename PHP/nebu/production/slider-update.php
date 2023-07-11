<?php include "header.php" ?>
<?php $slider_getir=$db->prepare("SELECT * from slider where slider_id=:slider_id");
$slider_getir->execute(array(
"slider_id"=> $_GET['id']

));

$slider_göster= $slider_getir->fetch(PDO::FETCH_ASSOC);

 ?>

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
						<h2>Slider Güncelleme</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<form action="islem.php" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left" novalidate>
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
							<input type="hidden" value="<?php echo $_GET['id'] ?>" name="id">
							<div class="item form-group">
								
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slider Ad <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value="<?php echo $slider_göster["slider_ad"] ?>" id="name" class="form-control col-md-7 col-xs-12" autocomplete="off"  data-validate-words="2" name="slider_ad"  required="required" type="text">
								</div>
							</div>
							<div class="item form-group">
								<label name="" class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Slider Açıklama <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									 <textarea  class="ckeditor" id="editor1" name="slider_aciklama"><?php echo $slider_göster["slider_aciklama"]; ?></textarea>
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Fiyat <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value="<?php echo $slider_göster["slider_fiyat"] ?>"  type="mail" id="number" name="slider_fiyat" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">İndirimli Fiyat <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value="<?php echo $slider_göster["slider_indirim_fiyat"] ?>"  type="mail" id="number" name="slider_indirimli_fiyat" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Resim <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<img width="200" src="<?php echo $slider_göster["slider_resim"] ?>">
								</div>
							</div>
							<div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yeni Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="slider_resim"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

							<div class="form-group">
								<div align="right" class="col-md-6 col-md-offset-3">

									<button name="slider_update" id="send" type="submit" class="btn btn-success">Güncelle</button>
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




