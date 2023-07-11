<?php include "header.php";


$menusor= $db->prepare("SELECT * FROM yorum where urun_id=:yorum_id");

$menusor->execute(array(

	"yorum_id"=> $_GET['yorum_id']
));


?>
<?php require_once "islem.php" ?>

<div class="right_col" role="main">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Menüler </h2>
				<br><br>
				<div align="right">
					<a class="btn btn-success" href="menu-ekle.php">Ekle</a>
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
							<th>Yorum ID</th>
							<th>Yorum Tarih</th>
							<th>Yorum Yapan</th>
							<th>Yorum</th>
							
							<th>Yorum Onay</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
						while ($sorgu2= $menusor->fetch(PDO::FETCH_ASSOC)) {?>

							<tr>
								<td><?php echo $sorgu2["yorum_id"]?></td>
								<td><?php echo $sorgu2["yorum_tarih"] ?></td>
								<td><?php echo $sorgu2["kullanici_ad"]." ".$sorgu2["kullanici_soyad"] ?></td>
								<td><?php echo $sorgu2["yorum"] ?></td>
								
								<td><center>
									<div class="form-check form-check-inline">
										<?php if ( $sorgu2["urun_yorum"]==1) {
											
											?>

											<input  class="yorum" checked="enable" type="checkbox" id="<?php echo $sorgu2["yorum_id"]?>" value="option1">


										<?php }

										else {
											?>
											<input class="yorum" type="checkbox" id="<?php echo $sorgu2["yorum_id"]?>" value="option1">

										<?php } ?>

									</div></center></td>


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




