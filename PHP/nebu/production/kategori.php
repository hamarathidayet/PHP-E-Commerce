<?php include "header.php";


$menusor= $db->prepare("SELECT * FROM kategori");

$menusor->execute();


?>
<?php require_once "islem.php" ?>

<div class="right_col" role="main">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Kategori Sayfa Görüntüleme </h2>
				<br><br>
				<div align="right">
					<a class="btn btn-success" href="kategori-ekle.php">Ekle</a>
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


				<?php if ($_GET['durum']=="eklendi") {
					
					?>
					<br>
					<div class="alert alert-success text-center"><strong>Başarılı</strong> Ekleme işlemi gerçekleşti!	</div>
					<br>
				<?php } ?>

			</div>

			<div class="x_content">

				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Kategori ID</th>
							<th>Kategori AD</th>
							<th>Kategori SeoUrl</th>
							<th>Kategori DURUM</th>

							<th>Alt Kategoriler</th>
							<th>Güncelle</th>
							<th>Sil</th>

						</tr>
					</thead>
					<tbody>
						<?php 
						while ($sorgu2= $menusor->fetch(PDO::FETCH_ASSOC)) {?>

							<tr>
								<td><?php echo $sorgu2["kategori_id"]?></td>
								<td><?php echo $sorgu2["kategori_ad"] ?></td>
								<td><?php echo $sorgu2["kategori_seourl"] ?></td>
								<?php if ($sorgu2["kategori_durum"]==1) {
									
									?>
									<td>Aktif</td>
								<?php }
								else { ?>
									<td>Pasif</td>

								<?php } ?>
								<td><center> <a href="alt-kategori.php?id=<?php echo $sorgu2["kategori_id"] ?>"><button class="btn btn-success btn-xs">Alt Kategori Listesine Git</button></a></center></td>
								
								
								<td><center> <a href="kategori-update.php?id=<?php echo $sorgu2["kategori_id"] ?>"><button class="btn btn-primary btn-xs">Güncelle</button></a></center></td>
								<td><center><a href="delete-kategori?id=<?php echo $sorgu2["kategori_id"]?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>

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




