<?php  include "nebu/production/islem.php";
$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
	");
$sor=$kullanicisor->execute(array(
	"mail"=>$_SESSION['kullanici_mail']
));



$göster1=$kullanicisor->fetch(PDO::FETCH_ASSOC);


$adres= $db->prepare("SELECT * from adress where kullanici_id=:kullanici_id");

$adres->execute(array(
"kullanici_id" =>$göster1["kullanici_id"]
));




 ?>

<table class="table table-hover table-dark">
		<thead>
			<tr>

				<th scope="col"><center>Adress Ad</center></th>
				<th scope="col"><center>Adress Düzenle</center></th>
				<th scope="col"><center>Adress Sil</center></th>
				
			</tr>
		</thead>

		<tbody>
			<?php while($adres_göster=$adres->fetch(PDO::FETCH_ASSOC)){ ?>
			<tr>
				
				<td scope="row"><center><?php echo $adres_göster["adres_ad"] ?></center></td>
				<td><center><a href="adres-bilgilerim?id=<?php echo $adres_göster["adres_id"] ?>" class="btn btn-danger btn-xs" >Adress Düzenle</a></center></td>
				<td><center><button id="<?php echo $adres_göster["adres_id"] ?>" class="sil-id-al btn btn-warning btn-xs" >Adress Sil</button></center></td>

			</tr>
				<?php } ?>
		</tbody>
	</table>