<?php include "nebu/production/islem.php";

$sayı_toggle=0;

$kategori_çek = $db->prepare("SELECT * from kategori");
$kategori_çek -> execute(array());



?>

<div class="col-md-3">
	<div class="title-bg">
		<div class="title">Kategoriler</div>
	</div>

	<div style="height:900px" class="categorybox">
		<ul>
			<?php while ($kt=$kategori_çek->fetch(PDO::FETCH_ASSOC)) {
				$sayı++;
				?>
				
				<li><a href="listele.php?kategori_id=<?php echo $kt["kategori_id"] ?>&sayfa=1"><?php echo $kt["kategori_ad"] ?></a> <i style="cursor: pointer;" id="<?php echo $sayı?>" class="fa-solid fa-angle-down kategori_gösterme"></i></li>

				<?php

				$alt_kategori_çek = $db->prepare("SELECT * from alt_kategori where kategori_id=:kategori_id");
				$alt_kategori_çek -> execute(array(

					"kategori_id" => $kt["kategori_id"]

				));


				while ($akt=$alt_kategori_çek->fetch(PDO::FETCH_ASSOC)) { ?>

					<ul style="display:none" id="<?php echo $sayı ?>" class="kategori_gizleme<?php echo $sayı ?>">
						<li><a href="listele?kategori_id=<?php echo $akt["kategori_id"] ?>&atk=<?php echo $akt["alt_kategori_id"] ?>&sayfa=1"> <?php echo $akt["alt_kategori_ad"] ?></a> </li>					
					</ul>
				<?php  } } ?>
			</ul>
		</div>


	</div>
</div><!--sidebar-->
