<?php include "header.php";


$menusor= $db->prepare("SELECT * FROM ürüns");

$menusor->execute();


?>
<?php require_once "islem.php" ?>

<div class="right_col" role="main">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Ürünler </h2>
				<br><br>
				<div align="right">
					<a class="btn btn-success" href="urun-ekle.php">Ekle</a>
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
							<th>Ürün ID</th>
							<th>Ürün Ad</th>
							<th>Öne Çıkar</th>
							<th>Ürüne yapılan yorumlar</th>
							<th>Ürün Açıklama</th>
							<th>Ürün Eklenme Tarihi</th>
							<th>Ürün Fiyat</th>
							<th>Ürün İndirimli Fiyat</th>
							<th>Ürün Toplu Resim Yükle</th>
							<th>Ürün Durum</th>
							<th>Ürün Stok</th>
							<th>Ürün Resim</th>
							
							<th>Güncelle</th>
							<th>Sil</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
						while ($sorgu2= $menusor->fetch(PDO::FETCH_ASSOC)) {

							$ekme_tarih=explode(" " , $sorgu2["urun_eklenme_tarihi"]);
							?>

							<tr>
								<td><?php echo $sorgu2["urun_id"]?></td>
								<td><?php echo $sorgu2["urun_ad"] ?></td>

									<form method="post" id="asd" >

									<?php if ($sorgu2["one_cikar"]==1) {

										?>
										
										<td><label  class="switch">
											<input class="bas" id="<?php echo $sorgu2["urun_id"]?>" name="radio" type="checkbox" checked>

											<span    class="slider round"></span>
										</label></td>

									<?php }
									else { ?>
										<td><label class="switch">
											<input  class="bas" id="<?php echo $sorgu2["urun_id"]?>"  name="radio" type="checkbox">

											<span   name="radio" class="slider round"></span>
										</label>

										</td>


									<?php } ?>
										</form>
									<td><center><a href="yorum.php?yorum_id=<?php echo $sorgu2["urun_id"]?>" class="btn btn-danger btn-xs">Yorumları Gör</a></center></td>

								<td><?php echo substr($sorgu2["urun_aciklama"],0,9) ?>...</td>
								<td><?php echo $ekme_tarih[0] ?></td>

								<td><?php echo $sorgu2["urun_fiyat"] ?></td>
								<td><?php echo $sorgu2["urun_indirimli_fiyat"] ?></td>
								<td><center><a href="urun-foto-yukle.php?urun_id=<?php echo $sorgu2["urun_id"] ?>" class="btn btn-warning btn-xs">Yükleme ekranına git</a></center></td>


								<?php if ($sorgu2["urun_durum"]==1) {
									
									?>
									<td>Aktif</td>
								<?php }
								else { ?>
									<td>Pasif</td>

								<?php } ?>



								<td><?php echo $sorgu2["urun_kalan"] ?></td>
								<td><img width="200" src="<?php echo $sorgu2["urun_resim"] ?>"></td>


									<td><center> <a href="urun-update.php?id=<?php echo $sorgu2["urun_id"] ?>"><button class="btn btn-primary btn-xs">Güncelle</button></a></center></td>
									<td><center><a href="delete-urun?id=<?php echo $sorgu2["urun_id"]?>"><button class="btn btn-danger btn-xs">Sil</button></a></center>
										
									</td>

								</tr>
								
							<?php } ?>
						

					</tbody>
				</table>
				
			</div>
		</div>
	</div>
</div>
<!-- /page content -->


</script>

<?php require_once "foother.php" ?>




