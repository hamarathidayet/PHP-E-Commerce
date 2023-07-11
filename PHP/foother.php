<?php include "nebu/production/islem.php" ?>

<div class="f-widget"><!--footer Widget-->
	<div class="container">
		<div class="row">
			<div class="col-md-4"><!--footer twitter widget-->
				<div class="title-widget-bg">
					<div class="title-widget">Yenilikleri takip et</div>
				</div>
				<ul class="tweets">
					<li>Check out this great #themeforest item for you
						'Simpler Landing' <a href="#">http://t.co/LbLwldb6 </a>
						<span>2 hours ago</span></li>
						<li class="lastone">Check out this great #themeforest item for you
							'Simpler Landing' <a href="#">http://t.co/LbLwldb6 </a>
							<span>2 hours ago</span></li>
						</ul>
						<div class="clearfix"></div>
						<a target="_blank" href="<?php echo $göster["ayar_twitter"] ?>" class="btn btn-default btn-follow"><i class="fa-brands fa-twitter-square"></i><div>Twitter'dan takip et</div></a>
					</div><!--footer twitter widget-->
					<div class="col-md-4"><!--footer newsletter widget-->
						<div class="title-widget-bg">
							<div class="title-widget">Yeni kayıt oluştur</div>
						</div>
						<div class="newsletter">
							<p>
								Kargo takip, hızlı ve güvenli alış-veriş,
								teslimat bilgileri için kayıt olun.
							</p>
							<form role="form" action="nebu/production/register/index.php" method="post">
								<div class="form-group">
									<label>E-Mail Adres'</label>
									<input name="mail67" type="email" class="form-control newstler-input" id="exampleInputEmail1" placeholder="shoping@gmail.com gibi">
									<button type="post" class="btn btn-default btn-red btn-sm">Kayıt ol</button>
								</div>
							</form>
						</div>
					</div><!--footer newsletter widget-->
					<div class="col-md-4"><!--footer contact widget-->
						<div class="title-widget-bg">
							<div class="title-widget-cursive">İletişim Bilgilerim</div>
						</div>
						<ul class="contact-widget">
							<li class="fphone">Ev Telefonu <br> <? echo $göster["ayar_tel"]?></li>
							<li class="fmobile">Cep Telefonu<br><? echo $göster["ayar_tel"]?></li>
							<li class="fmail lastone">Mail Adresi<br><?php echo $göster["ayar_mail"] ?></li>
						</ul>
					</div><!--footer contact widget-->
				</div>
				<div class="spacer"></div>
			</div>
		</div><!--footer Widget-->
		<div class="footer"><!--footer-->
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<ul class="footermenu"><!--footer nav-->
							<li><a href="index.php">Home</a></li>
							<li><a href="cart.htm">My Cart</a></li>
							<li><a href="checkout.htm">Checkout</a></li>
							<li><a href="order.htm">Completed Orders</a></li>
							<li><a href="contact.htm">Contact us</a></li>
						</ul><!--footer nav-->
						<div class="f-credit">&copy;  <?php echo $göster["ayar_description"] ?></div>
						<a href="#"><div class="payment visa"></div></a>
						<a href="#"><div class="payment paypal"></div></a>
						<a href="#"><div class="payment mc"></div></a>
						<a href="#"><div class="payment nh"></div></a>
					</div>
					<div class="col-md-3"><!--footer Share-->
						<div class="followon">Sosyal medya hesaplarımız</div>
						<div class="fsoc">
							<a href="<?php echo $göster["ayar_twitter"] ?>" class="ftwitter">twitter</a>
							<a href="<?php echo $göster["ayar_facebook"] ?>" class="ffacebook">facebook</a>
							<a href="<?php echo $göster["ayar_youtube"] ?>" class="fflickr">Youtube</a>
							<a href="<?php echo $göster["ayar_google"] ?>" class="ffeed">google</a>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div><!--footer Share-->
				</div>
			</div>
		</div><!--footer-->
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="bootstrap\js\bootstrap.min.js"></script>
		
		<!-- map -->
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
		<script type="text/javascript" src="js\jquery.ui.map.js"></script>
		<script type="text/javascript" src="js\demo.js"></script>
		
		<!-- owl carousel -->
		<script src="js\owl.carousel.min.js"></script>
		
		<!-- rating -->
		<script src="js\rate\jquery.raty.js"></script>
		<script src="js\labs.js" type="text/javascript"></script>
		
		<!-- Add mousewheel plugin (this is optional) -->
		<script type="text/javascript" src="js\product\lib\jquery.mousewheel-3.0.6.pack.js"></script>
		
		<!-- fancybox -->
		<script type="text/javascript" src="js\product\jquery.fancybox.js?v=2.1.5"></script>
		
		<!-- custom js -->
		<script src="js\shop.js"></script>
		<script type="text/javascript" src="js/jqery.js"></script>
		<script type="text/javascript" src="js/islem.js"></script>
			</div>
			</body>
			</html>
