<?php include "header.php";

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
							<h2>Kategori Ekle <small></small></h2>

							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<form action="islem.php" method="post" class="form-horizontal form-label-left" novalidate>
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

									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Alt Kategori Ad <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input value="" id="name" class="form-control col-md-7 col-xs-12" autocomplete="off"  data-validate-words="2" name="alt_kategori_ad"  required="required" type="text">
									</div>
								</div>


								<input type="hidden" value="<?php echo $_GET['kategori_id']?>"  name="id" >

								<div class="form-group">
									<div align="right" class="col-md-6 col-md-offset-3">

										<button name="alt_kategori_ekle" id="send" type="submit" class="btn btn-success">Ekle</button>
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