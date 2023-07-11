<?php include "header.php" ?>
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
								
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menü Ad <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value="" id="name" class="form-control col-md-7 col-xs-12" autocomplete="off"  data-validate-words="2" name="menu_ad"  required="required" type="text">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Menü Uzantısı (href) <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value=""  type="text" id="email" name="menu_href" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Menü İcon <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value=""  type="text" id="email2" name="menu_icon" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Menü Altdosyalar <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value=""  type="text" id="number" name="menu_alan" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							

							<div class="form-group">
								<div align="right" class="col-md-6 col-md-offset-3">

									<button name="menu_ekle" id="send" type="submit" class="btn btn-primary">Ekle</button>
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