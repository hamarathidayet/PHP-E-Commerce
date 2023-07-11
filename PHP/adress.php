<?php include "header.php";

$adres= $db->prepare("SELECT * from adress");

$adres->execute(array());




 ?>
<div class="clearfix"></div>
<div class="lines"></div>
</div>
<div class="container">
	<br>
	<div align="right"><a href="adres-ekle" class="btn btn-primary btn-xs ">Yeni adress ekle</a></div>
	<br><br>
<div id="kayıt-sil" style="display: none;" class="alert alert-success text-center"><strong>Başarılı</strong> Kayıt Silinmiştir</div>
	<br><br>
	<div id="adres-tablo-ana"></div>
</div>
<div class="container">

	

</div>
<div class="clearfix"></div>
</div>
</div>
</form>
<div class="spacer"></div>
</div>

<?php include "foother.php" ?>