<?php include "header.php" ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title">Tanıtım Videosu</div>
			</div>
			
				<iframe width="700" height="315" src="https://www.youtube.com/embed/<?php echo $hakkımdagöster["video"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			



			<div class="title-bg">
				<div class="title">Misyon</div>
			</div>
			
				<blockquote><?php echo $hakkımdagöster["misyon"] ?></blockquote>
			



			<div class="title-bg">
				<div class="title">Vizyon</div>
			</div>
			
				<blockquote>
					<?php echo $hakkımdagöster["vizyon"] ?>

				</blockquote>
			



			<div class="title-bg">
				<div class="title"><?php echo $hakkımdagöster["title"] ?></div>
			</div>
			<div class="page-content">
				<p>
					<?php echo $hakkımdagöster["icerik"] ?>
				</p>
			</div>
		</div>

		
			<?php include "kategori.php" ?>
		
		
	</div>
	<div class="spacer"></div>
</div>

<?php include "foother.php" ?>