<?php include "header.php"  ?>
<?php require_once "islem.php" ?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Sosyal Medya Ayarları <small>sub title</small></h2>


						<div class="clearfix"></div>

					</div>
					<div class="x_content">

						<form action="islem.php" method="post" class="form-horizontal form-label-left" novalidate>

							<div class="item form-group">
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
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">İl <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  value="<?php echo $göster["ayar_il"] ?>" data-validate-words="2" name="il" placeholder="" required="required" type="text">
								</div>
							</div>
							<div class="item form-group">
								<label name="" class="control-label col-md-3 col-sm-3 col-xs-12" for="email">İlçe <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value="<?php echo $göster["ayar_ilce"] ?>" type="email" id="email" name="ilce" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Adres <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value="<?php echo $göster["ayar_adres"] ?>" type="text" id="email2" name="adres1" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Google Harita <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value="<?php echo $göster["ayar_maps"] ?>" type="text" id="email2" name="harita" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							

							<div class="form-group">
								<div align="right" class="col-md-6 col-md-offset-3">

									<button value="ad" id="send" name="adres" type="submit" class="btn btn-success">Güncelle</button>
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

<?php include "foother.php" ?>