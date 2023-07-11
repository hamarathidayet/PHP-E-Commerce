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
						<h2>Hakkımda Ayarlar <small>sub title</small></h2>


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
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ana Başlık <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  value="<?php echo $hakkımdagöster["title"] ?>" data-validate-words="2" name="baslık" placeholder="" required="required" type="text">
								</div>
							</div>
							<div class="item form-group">
								<label name="" class="control-label col-md-3 col-sm-3 col-xs-12" for="email">İçerik <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									 <textarea  class="ckeditor" id="editor1" name="icerik"><?php echo $hakkımdagöster['icerik']; ?></textarea>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Video <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value="<?php echo $hakkımdagöster["video"] ?>" type="text" id="email2" name="video" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Vizyon <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  type="text" id="number" name="vizyon" required="required" value="<?php echo $hakkımdagöster["vizyon"]?>" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Misyon <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value="<?php echo $hakkımdagöster["misyon"] ?>" type="url" id="website" name="misyon" required="required"  class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div align="right" class="col-md-6 col-md-offset-3">

									<button value="ad" id="send" name="hakkımda" type="submit" class="btn btn-success">Güncelle</button>
								</div>
							</div>
							 <script type="text/javascript">

               CKEDITOR.replace( 'editor1',

               {

                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                forcePasteAsPlainText: true

              } 

              );

            </script>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

<?php include "foother.php" ?>