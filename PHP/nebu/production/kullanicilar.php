<?php include "header.php";


$kullanicisor= $db->prepare("SELECT * FROM kullanici where kullanici_yetki=:kullanici_yetki");

$kullanicisor->execute(array(

"kullanici_yetki"=>1
));


?>
<?php require_once "islem.php" ?>

<div class="right_col" role="main">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Kullanıcılar </h2>

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
							<th>Ad (Name)</th>
							<th>Soyad (Last Name)</th>
							<th>Türkiye Cumhuriyeti kimlik numarası</th>
							<th>Mail Adresi</th>
							<th>Yetki Düzeyi</th>
							<th>Güncelle</th>
							<th>Sil</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						while ($sorgu1= $kullanicisor->fetch(PDO::FETCH_ASSOC)) {?>

							<tr>
								<td><?php echo $sorgu1["kullanici_ad"]?></td>
								<td><?php echo $sorgu1["kullanici_soyad"] ?></td>
								<td><?php echo $sorgu1["kullanici_tc"] ?></td>
								<td><?php echo $sorgu1["kullanici_mail"] ?></td>
								<td><?php echo $sorgu1["kullanici_yetki"] ?></td>
								<td><center> <a href="kullanici-update.php?id=<?php echo $sorgu1["kullanici_id"] ?>"><button class="btn btn-primary btn-xs">Güncelle</button></a></center></td>
								<td><center><a href="delete?id=<?php echo $sorgu1["kullanici_id"] ?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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




