<?php include "nebu/production/islem.php";


session_start();
ob_start();

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
	");
$kullanicisor->execute(array(
	"mail"=>$_SESSION['kullanici_mail']
));

$uzantı="nebu/production/";

$göster1=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$say=$kullanicisor->rowCount();

//Kategori_çekme_kodu
$kategori_çek = $db->prepare("SELECT * from kategori");
$kategori_çek -> execute(array());
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $göster["ayar_description"] ?>">
	<meta name="keywords" content="<?php echo $göster["ayar_keywords"] ?>">
	<meta name="author" content="<?php echo $göster["ayar_author"] ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $göster["ayar_title"] ?></title>
	<link rel="icon" href="<?php echo $uzantı.$göster["ayar_logo"] ?>" type="image/x-icon" />

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	
	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">
	
	<!-- owl Style -->
	<link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/load.css">


	<!-- Avasome -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">
	<!-- fancy Style -->
	<link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
    	
    </body>
    <body>
    	<div class="load-screen">
    		
    	</div>
    	<div style="display:none" class="ana-ekran" id="wrapper">
    		<div class="header"><!--Header -->
    			<div class="container">
    				<div class="row">
    					<div class="col-xs-6 col-md-4 main-logo">
    						<a href="index.php"><img src="images\logo.png" alt="logo" class="logo img-responsive"></a>
    					</div>
    					<div class="col-md-8">
    						<div class="pushright">
    							<div class="top">
    								<?php if ($say==0) {
    									?>
    									<a href="#" id="reg" class="btn btn-default btn-dark">Giriş yap <span>-- veya --</span>Kayıt ol</a>
    									<div class="regwrap">
    										<div class="row">
    											<div class="col-md-6 regform">
    												<div class="title-widget-bg">
    													<div class="title-widget">Giriş</div>
    												</div>
    												<form method="post" action="nebu/production/islem.php" role="form">
    													<div class="form-group">
    														<input type="text" placeholder="Kullanıcı Adı (Gmail)" class="form-control" name="mail">
    													</div>
    													<hr>
    													<div class="form-group">
    														<input type="password" placeholder="password" class="form-control" name="password">
    													</div>


    													<div class="form-group">
    														<input type="submit" value="Giriş Yap" name="login" class="btn btn-default btn-red btn-sm">
    													</div>
    												</form>
    											</div>
    											<div class="col-md-6">
    												<div class="title-widget-bg">
    													<div class="title-widget">Kayıt</div>
    												</div>
    												<p>
    													Yeni kullanıcı mısın? Yeni şeyler denemek için, indirimleleri önceden öğrenmek için, korgo takibi için, ...

    												</p>
    												<a href="nebu/production/register/" class="btn btn-default btn-yellow">Kayıt OL!</a>
    											</div>
    										</div>
    									</div>
    									<div class="srch-wrap">
    										<a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
    									</div>
    									<div class="srchwrap">
    										<div class="row">
    											<div class="col-md-12">
    												<form class="form-horizontal" role="form">
    													<div class="form-group">
    														<label for="search" class="col-sm-2 control-label">Search</label>
    														<div class="col-sm-10">
    															<input type="text" class="form-control" id="search">
    														</div>
    													</div>
    												</form>
    											</div>
    										</div>
    									</div>

    									<?php
    								} 
    								else { ?>
    									<a href="#" id="reg" class="btn btn-default btn-dark">Hoşgeldin <?php echo $göster1["kullanici_ad"] ?></a>

    									<div class="regwrap">
    										<div class="row">
    											
    											<div class="col-md-6">
    												<ul>
    													<li><a href="index"  class="btn btn-default btn-yellow">Ana Sayfa</a></li>
    													<br>
    													<li><a href="sepet" class="btn btn-default btn-yellow">Sepetim</a></li>
    													<br>
    													<li><a href="nebu/production/logout.php" class="btn btn-default btn-yellow">Güvenli Çıkış</a></li>
    												</ul>

    												
    											</div>
    											<div class="col-md-6">
    												<ul>
    													<li><a href="siparis.php" class="btn btn-default btn-yellow">Siparişlerim</a></li>
    													<br>
    													<?php if ($göster1["kullanici_yetki"]==5) {
    														// code...
    														?>
    														<li><a  href="nebu/production/index" target="_blank" class="btn btn-default btn-yellow">Yönetim Paneli</a></li>
    													<?php } ?>
    													<br>
    													
    												</ul>

    												
    											</div>
    										</div>
    									</div>
    									<div class="srch-wrap">
    										<a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
    									</div>
    									<div class="srchwrap">
    										<div class="row">
    											<div class="col-md-12">
    												<form class="form-horizontal" action="listele-ara.php" method="post" role="form">
    													<div class="form-group">
    														<label for="search" class="col-sm-2 control-label">Ara</label>
    														<div class="col-sm-10">
    															<input name="arama" minlength="3" autocomplete="off" type="text" class="form-control" id="search">
    														</div>
    													</div>
    												</form>
    											</div>
    										</div>
    									</div>

    								<?php } ?>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="dashed"></div>
    		</div><!--Header -->
    		<div class="main-nav"><!--end main-nav -->
    			<div class="navbar navbar-default navbar-static-top">
    				<div class="container">
    					<div class="row">
    						<div class="col-md-10">
    							<div class="navbar-header">
    								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    									<span class="icon-bar"></span>
    									<span class="icon-bar"></span>
    									<span class="icon-bar"></span>
    								</button>
    							</div>
    							<div class="navbar-collapse collapse">
    								<ul class="nav navbar-nav">
    									<li><a href="index.php" class="active">Ana Sayfa</a><div class="curve"></div></li>
    									<li class="dropdown menu-large">
    										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategoriler</a>
    										<ul class="dropdown-menu megamenu container row">
    											<li class="col-sm-4">
    												
    												<ul>
    													<?php while ($kategori_gel=$kategori_çek->fetch(PDO::FETCH_ASSOC)) {
    														
    														?>
    														<li><a href="listele.php?kategori_id=<?php echo $kategori_gel["kategori_id"] ?>&sayfa=1"><?php echo $kategori_gel["kategori_ad"] ?></a>  <i id="<?php echo $sayı?>" class="fa-solid fa-angle-down kategori_gösterme"></i>  </li>

    														<?php

    														$alt_kategori_çek = $db->prepare("SELECT * from alt_kategori where kategori_id=:kategori_id");
    														$alt_kategori_çek -> execute(array(

    															"kategori_id" => $kt["kategori_id"]

    														));


    														while ($akt=$alt_kategori_çek->fetch(PDO::FETCH_ASSOC)) { ?>

    															<ul style="display:none" id="<?php echo $sayı ?>" class="kategori_gizleme<?php echo $sayı ?>">
    																<li><a href="#"> <?php echo $akt["alt_kategori_ad"] ?></a> </li>					
    															</ul>
    														<?php  } } ?>
    													</ul>











    													<div class="dashed-nav"></div>
    												</li>
    											</ul>
    										</li>

    										<li><a href="lili.php">Hakkımızda</a></li>
    										<li><a href="siparis.php">Siparişlerim</a></li>
    										<?php if ($say==1): ?>
    											
    										
    										<li><a href="nebu/production/logout.php">Çıkış Yap</a></li>
    										<?php endif ?>
    										<?php if ($say==0): ?>
    											<li><a href="nebu/production/login">Giriş Yap</a></li>
    										<?php endif ?>
    									</ul>
    								</div>

    								<?php 
    								$ürün_sepet1=$db->prepare("SELECT * FROM sepet where kullanici_id=:kullanici_id and sepet_durum=1 and urun_adet>=1");
    								$ürün_sepet1 ->execute(array(
    									"kullanici_id" => $göster1["kullanici_id"]
    								));

    								$toplam1=0;


    								while ($urun_sor1 =$ürün_sepet1->fetch(PDO::FETCH_ASSOC)) {
    									$toplam1=$toplam1+$urun_sor1["urun_adet"]*$urun_sor1["urun_fiyat"];
    								}

    								?>


    							</div>
    							<div class="col-md-2 machart">
    								<button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Sepet</span>|<span class="allprice"><?php echo $toplam1 ?>₺</span></button>
    								<div class="popcart">
    									<table class="table table-condensed popcart-inner">
    										<tbody>


    											<?php 
    											$ürün_sepet=$db->prepare("SELECT * FROM sepet where kullanici_id=:kullanici_id and sepet_durum=1 and urun_adet>=1");
    											$ürün_sepet ->execute(array(
    												"kullanici_id" => $göster1["kullanici_id"]
    											));

    											$sayı=0;
    											$toplam=0;

    											while ($urun_sor =$ürün_sepet->fetch(PDO::FETCH_ASSOC)) {
    												$sayı=$sayı+$urun_sor["urun_adet"];
    												$toplam=$toplam+$urun_sor["urun_adet"]*$urun_sor["urun_fiyat"];
    												?>

    												<tr>
    													<td>
    														<a href="urun?urun_id=<?php echo $urun_sor["urun_id"] ?>"><img src="nebu/production/<?php echo $urun_sor["urun_resim"] ?>" alt="" class="img-responsive"></a>
    													</td>
    													<td><a href="product.htm"><?php echo $urun_sor["urun_ad"] ?></a><br></td>
    													<td><?php echo $urun_sor["urun_adet"] ?> Adet </td>

    													<td><?php echo $urun_sor["urun_adet"]*$urun_sor["urun_fiyat"] ?>₺</td>

    												</tr>

    											<?php } ?>
    										</tbody>
    									</table>
    									<span class="sub-tot">Toplam ürün sayısı : <span><?php echo $sayı ?></span>
    									<br>
    									<div class="btn-popcart">

    										<a href="sepet" class="btn btn-default btn-red btn-sm">Sepete Git</a>
    									</div>
    									<div class="popcart-tot">
    										<p>
    											Toplam Fiyat<br>
    											<span><?php echo $toplam ?>₺</span>
    										</p>
    									</div>
    									<div class="clearfix"></div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div><!--end main-nav -->
    			<div class="container">
    				<?php

    				if ($say==1) {

    					?>
    					<ul class="small-menu"><!--small-nav -->
    						<li><a href="hesap-ayari.php" class="myacc">Hesap Ayarı</a></li>
    						<li><a href="adress.php"><i class="fa-solid fa-address-book"></i>  Adres Bilgilerim</a></li>
    						<li><a  href="sepet/index.php" class="mycheck">Sepetim</a></li>
    					</ul><!--small-nav -->
    				<?php } ?>





