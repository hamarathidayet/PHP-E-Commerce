<?php include "header.php";


$menusor= $db->prepare("SELECT * FROM alt_kategori where kategori_id=:kategori_id");

$menusor->execute(array(

"kategori_id" => $_GET['id']
));


?>
<?php require_once "islem.php" ?>

<div class="right_col" role="main">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Alt Kategori Sayfa Görüntüleme </h2>
				<br><br>
				<div align="right">
					<a class="btn btn-success" href="alt-kategori-ekle.php?kategori_id=<?php echo $_GET['id'] ?>">Ekle</a>
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
							<th>Güncelle</th>
							<th>Sil</th>

						</tr>
					</thead>
					<tbody>
						<?php 
						while ($sorgu2= $menusor->fetch(PDO::FETCH_ASSOC)) {?>

							<tr>
								<td><?php echo $sorgu2["alt_kategori_id"]?></td>
								<td><?php echo $sorgu2["alt_kategori_ad"] ?></td>
								
							
								
								
								
								<td><center> <a href="alt-kategori-update.php?id=<?php echo $sorgu2["kategori_id"] ?>"><button class="btn btn-primary btn-xs">Güncelle</button></a></center></td>
								<td><center><a href="delete-alt-kategori?id=<?php echo $sorgu2["alt_kategori_id"]?>&kategori_id=<?php echo $sorgu2["kategori_id"]?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>

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




