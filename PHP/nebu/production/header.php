<?php 
ob_start();
session_start();
include "baglan.php";


$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
  ");
$kullanicisor->execute(array(
  "mail"=>$_SESSION['kullanici_mail']
));
$kullanicigöster= $kullanicisor->fetch(PDO::FETCH_ASSOC);
$sor=$kullanicisor->rowCount();

if ($sor==0 || $kullanicigöster["kullanici_yetki"]==1) {
  header("Location:../../index?durum=izinsiz");
  exit;
}

header('Set-Cookie: same-site-cookie=foo; SameSite=Lax');
header('Set-Cookie: cross-site-cookie=bar; SameSite=None; Secure');
?>

<!DOCTYPE html>
<?php require_once "islem.php"  ?>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo $göster["ayar_logo"]  ?>" type="image/x-icon" />

  <title><?php echo $göster["ayar_title"] ?></title>
  <!-- Ck Editör-->
  <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- Avasome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Dropzone.js -->

  <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



  <!-- Dropzone.js -->

  <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
  <!-- Ck Editör -->
  <script src="ckeditör/src/ckeditor.js"></script>
  
  
  

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/radio.css">


 
  <script  src="./js/islem.js"></script>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title fixed-top" style="border: 0;">
            <a href="index.php" class="site_title"><img align="center" style="height:30px; width:35px" src="https://findicons.com/files/icons/977/rrze/720/user_admin.png"><span>  Yönetim Paneli</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Hoşgeldin,</span>
              <h2><?php echo $kullanicigöster["kullanici_ad"]." ".$kullanicigöster["kullanici_soyad"] ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">

              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i> Ana Sayfa </a></li>
                <li><a><i class="fa fa-gears"></i>  Ayarlar <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="setting.php">Genel Ayarlar</a></li>
                    <li><a href="iletisim.php">İletisim Ayarları</a></li>
                    <li><a href="sosyal-medya.php">Sosyal Medya Hesap Ayarları</a>
                     <li><a href="adres.php">Adres - Konum Ayarları</a></li>
                     <li><a href="lili.php">Hakkımızda Ayarı</a></li>
                   </ul>
                 </li>

                 <li><a><i class="fa fa-bars-staggered"></i>  Ürün Ayarları <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="kategori.php">Kategoriler</a></li>
                    <li><a href="uruns.php">Ürünler</a></li>
                    
                  </ul>
                </li>


                <li><a href="kullanicilar"><i class="fa fa-users"></i> Kullanıcılar </a></li>

                <li><a href="menuler.php"><i class="fa fa-elementor"></i> Menüler </a></li>

                <li><a href="slider.php"><i class="fa fa-image"></i> Slider </a></li>



                
              </ul>

            </li>
            
          </ul>
        </li>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="images/img.jpg" alt=""><?php echo $kullanicigöster["kullanici_ad"]." ".$kullanicigöster["kullanici_soyad"] ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
          </a>
        </li> 
        <li><a href="../../index.php"><i class="fa fa-sign-out pull-right"></i> Alış Veriş Yap</a></li>         
        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Çıkış Yap</a></li>

      </ul>
    </li>

    <li role="presentation" class="dropdown">


    </li>
  </ul>
</nav>
</div>
</div>
<!-- /top navigation -->


</body>
</html>