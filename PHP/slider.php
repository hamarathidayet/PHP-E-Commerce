<div class="main-slide">
	<div id="sync1" class="owl-carousel">


		<?php 
		include "nebu/production/islem.php";
		$slidersor=$db->prepare("SELECT * FROM slider");
		$slidersor->execute();
		$uzantılink="nebu/production/";

		while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {

			?>


		<div class="item">
					<div class="slide-desc">
						<div class="inner">
							<h1><?php echo $slidercek["slider_ad"] ?></h1>
							<p>
								<?php echo $slidercek["slider_aciklama"] ?>
							</p>
							<button class="btn btn-default btn-red btn-lg">Sepete Ekle</button>
						</div>
						<div class="inner">
							<div class="pro-pricetag big-deal">
								<div class="inner">
										<span class="oldprice"><?php echo $slidercek["slider_fiyat"]."₺" ?></span>
										<span ><?php echo $slidercek["slider_indirim_fiyat"]."₺" ?></span>
										<span class="ondeal">Kanpanya</span>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-type-1">
						<a href="#">
						<img width="400" height="100" src="<?php echo $uzantılink.$slidercek["slider_resim"] ?>" alt="" class="img-responsive"></a>
					</div>
				</div>

		<?php } ?>




	</div>
</div>

		<!-- Alt Bar 


		<div class="bar"></div>
		<div id="sync2" class="owl-carousel">
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Stylish Jacket</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Stylish Jacket</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Nike Airmax</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Unique smaragd ring</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Stylish Jacket</h3>
					<p>Description here here here</p>
				</div>
			</div>
			<div class="item">
				<div class="slide-type-1-sync">
					<h3>Nike Airmax</h3>
					<p>Description here here here</p>
				</div>
			</div>
		</div>

		-->