<?php include "header.php"  ?>
<?php require_once "islem.php" ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Genel Ayarlar <small>sub title</small></h2>

            
            <div class="clearfix"></div>


          </div>
          <div class="x_content">
             <?php 
              if ($_GET['durum']=="ok") {

                ?>
                <b style="color:green">İşlem Başarılı...</b><?php
              }?>
              <?php 
              if ($_GET['durum']=="yuksek-boyut") {

                ?>
                <b style="color:red">Dosya boyutu fazla...</b><?php
              } ?>

                <?php 
              if ($_GET['durum']=="farklı-uzantı") {

                ?>
                <b style="color:red">Lütfen sadece "png,gif,jpeg" formatları yükleyeniz...</b>
                <?php
              }


              elseif ($_GET['durum']=="no") {
                ?>
                <b style="color:red">Birşeyler ters gitti...</b>
                <?php 
              }
              ?>
<br><br>
            <form action="islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo<br><span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <?php 
                  if (strlen($göster['ayar_logo'])>0) {?>

                    <img width="200"  src="<?php echo $göster['ayar_logo']; ?>">

                  <?php } else {?>


                    <img width="200"  src="image/resim-yok.png">


                  <?php } ?>


                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name"  name="ayar_logo"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <input type="hidden" name="eski_yol" value="<?php echo $göster['ayar_logo']; ?>">

              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="logoduzenle" class="btn btn-primary">Güncelle</button>
              </div>

            </form>

            <hr>

          </div>
          <br> 


          <form action="islem.php" method="post" class="form-horizontal form-label-left" novalidate>

            <div class="item form-group">
             
              <br><br>
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ana Başlık <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12"  value="<?php echo $göster["ayar_title"] ?>" data-validate-words="2" name="ayar_tel" placeholder="" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Açılama <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input value="<?php echo $göster["ayar_description"] ?>" type="text" id="email2" name="ayar_mail" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Mesia Saatleri <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input  type="text" id="number" name="ayar_mesai" required="required" value="<?php echo $göster["ayar_mesai"]?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Anahtar Kelimeler <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input value="<?php echo $göster["ayar_keywords"] ?>" type="url" id="website" name="ayar_facebook" required="required"  class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Site Admin Adı <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input value="<?php echo $göster["ayar_author"]  ?>" id="occupation" type="text" name="ayar_twitter" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Bakım</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="password2" value="<?php echo $göster["ayar_clock"] ?>" type="text" name="ayar_clock" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">

              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div align="right" class="col-md-6 col-md-offset-3">

                <button value="ad" id="send" name="güncelle" type="submit" class="btn btn-success">Güncelle</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->

<?php include "foother.php" ?>