<?php include "header.php";


$slidersor= $db->prepare("SELECT * FROM slider");

$slidersor->execute();


?>
<?php require_once "islem.php" ?>

<div class="right_col" role="main">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Slider</h2>
				<br><br>
				<div align="right">
					<a class="btn btn-success" href="slider-ekle.php">Ekle</a>
				</div>
				<div class="clearfix"></div>
				<?php if ($_GET['durum']=="ok") {
					
					?>
					<br>
					<div class="alert alert-success text-center">Silme İşlemi Başarılı!	</div>
					<br>
				<?php }
				elseif($_GET['durum']=="no") { ?>
					<br>
					<div class="alert alert-warning text-center">Hay Aksi Bir Şeyler Ters Gitti!	</div>
					<br>
				<?php } ?>
			</div>

			<div class="x_content">

				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Slider ID</th>
							<th>Slider Ad</th>
							<th>Slider Açıklama</th>
							<th>Slider Link</th>
							<th>Slider Resim</th>
							<th>Güncelle</th>
							<th>Sil</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						while ($sorgu2= $slidersor->fetch(PDO::FETCH_ASSOC)) {?>

							<tr>
								<td><?php echo $sorgu2["slider_id"]?></td>
								<td><?php echo $sorgu2["slider_ad"] ?></td>
								<td><?php echo $sorgu2["slider_aciklama"] ?></td>
								<td><?php echo substr($sorgu2["slider_resim"], 26) ?></td>
								<td><img width="150" src="<?php echo  $sorgu2["slider_resim"] ?>"></td>
								<td><center> <a href="slider-update.php?id=<?php echo $sorgu2["slider_id"] ?>"><button class="btn btn-primary btn-xs">Güncelle</button></a></center></td>
								<td><center><a href="delete-slider?id=<?php echo $sorgu2["slider_id"]?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
								<td></td>
								<td></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
<!-- /page content -->

<?php require_once "foother.php" ?>




