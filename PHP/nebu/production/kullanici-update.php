<?php 
include "header.php";

$kullanici12= $db->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
$kullanici12->execute(array(

  "kullanici_id" => $_GET['id']
));

$kul=$kullanici12->fetch(PDO::FETCH_ASSOC);

?>
<?php require_once "islem.php" ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kullanıcı Düzenle </h2>

            
            <div class="clearfix"></div>

          </div>
          <div class="x_content">

            <form action="islem.php?id=<?php echo $kul["kullanici_id"] ?>" method="post" class="form-horizontal form-label-left" novalidate>

              <div class="item form-group">
                <?php 
                if ($_GET['durum']=="ok") {

                  ?>
                  <b style="color:green">İşlem Başarılı...</b><?php
                }

                elseif ($_GET['durum']=="no") {
                  ?>
                  <b style="color:red">Birşeyler ters gitti...</b>
                  <?php 
                }
                ?>
                <br><br>
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kullanıcı ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="name" class="form-control col-md-7 col-xs-12"  value="<?php echo $kul["kullanici_ad"] ?>" data-validate-words="2" name="ad" placeholder="" required="required" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label name="" class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Kullanıcı soyad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $kul["kullanici_soyad"] ?>" type="email" id="email" name="soyad" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Kullanıcı TC kimlik no <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $kul["kullanici_tc"] ?>" type="text" id="email2" name="tc" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Kullanıcı mail adresi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input disabled="" type="text" id="number" required="required" value="<?php echo $kul["kullanici_mail"]?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Kullanıcı yetkisi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input value="<?php echo $kul["kullanici_yetki"] ?>" type="url" id="website" name="yetki" required="required"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Durum <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" name="durum" class="form-control" required>
                  <?php if ($kul["durum"]==1) {
                    // code...
                   ?>
                   <option name="1" value="">Aktif</option>
                   <option name="0" value="press">Pasif</option>
                 <?php }
                 else {
                   ?>
                   <option name="1" value="">Pasif</option>
                   <option name="0" value="press">Aktif</option>
                 <?php } ?>

               </select>
             </div>
           </div>

           <div class="ln_solid"></div>
           <div class="form-group">
            <div align="right" class="col-md-6 col-md-offset-3">
              <input id="hidden" hidden="" type="text"  value=""  name="kullanici_id">
              <button value="ad" id="send" name="kullanici" type="submit" class="btn btn-success">Güncelle</button>
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

<script type="text/javascript">


</script>