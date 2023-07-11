<?php include "header.php";



$siparis = $db->prepare("SELECT * from siparis where kullanici_id=:kullanici_id");
$siparis->execute(array(
	"kullanici_id" => $göster1["kullanici_id"]

));
$sayı=0;

$say = $siparis->rowCount();

?>
<br><br><br><br><br><br>
<div class="table-responsive">
	<table class="table table-bordered chart">
		<thead>
			<tr>
				<th>Siparis</th>
				<th>Siparis Kodu</th>
				<th>Siparis Toplam Fiyat</th>
				<th>Siparis Tarihi</th>
				<th>Siparis Saati</th>
				<th>Siparis Durum</th>
				<th>Detay</th>
			</tr>
		</thead>
		<tbody>

			<?php

			if ($say==0) {

				?>

				<tr>
					<td>Siparişiniz Bulunmamaktadır...</td>
				</tr>


				<?php 
			}
			else {


				while ($siparis_getir =$siparis->fetch(PDO::FETCH_ASSOC)) {  
					$sayı++;
					$tarih_böl = explode(" ", $siparis_getir["tarih"]);
					?>

					<tr>
						<td><?php echo $sayı ?></td>
						<td><?php echo $siparis_getir["siparis_id"] ?></td>
						<td><?php echo $siparis_getir["siparis_fiyat"] ?>₺</td>					
						<td><?php echo $tarih_böl[0] ?></td>
						<td><?php echo $tarih_böl[1] ?></td>
						<td><?php echo $siparis_getir["siparis_durum"] ?></td>
						<td><a style="color:white" href="siparis-detay?siparis_id=<?php echo $siparis_getir["siparis_id"] ?>" class="btn btn-primary btn-xs">Siparis Detay</a></td>
					</tr>
				<?php }
			}  ?>
		</tbody>
	</table>
</div>
<br><br><br><br><br><br>

<?php include "foother.php" ?>