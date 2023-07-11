
<?php
ob_start();
session_start();
require_once "baglan.php";
date_default_timezone_set('Europe/Istanbul');
$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
	");
$sor=$kullanicisor->execute(array(
	"mail"=>$_SESSION['kullanici_mail']
));



$göster1=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>

<?php 


if ($_POST['login']) {

	$kullanici_mail=$_POST['mail'];
	$kullanici_password=md5($_POST['password']);
	

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");

	$kullanicisor1=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");

	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
	));

	


	$kullanicisor1->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 1
	));


	echo $say=$kullanicisor->rowCount();

	echo $kullanicisay1= $kullanicisor1->rowCount();

	if ($say==1) {

		if (isset($_POST['hatırla-beni'])) {
			setcookie("mail",$kullanici_mail,time()+9999999);
			setcookie("sifre",$_POST['password'],time()+9999999);
			

		}
		else {
			setcookie("mail",$kullanici_mail,time()-9999999);
			setcookie("sifre",$_POST['password'],time()-9999999);
		}
		
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../../index");

	}
	

	else if ($kullanicisay1==1) {

		if (isset($_POST['hatırla-beni'])) {
			setcookie("mail",$kullanici_mail,time()+9999999);
			setcookie("sifre",$_POST['password'],time()+9999999);
			

		}
		else {
			setcookie("mail",$kullanici_mail,time()-9999999);
			setcookie("sifre",$_POST['password'],time()-9999999);
		}
		$_SESSION['kullanici_mail']=$kullanici_mail;

		header("Location:../../index");

	}
	
	else {

		header("Location:login/index?durum=no");
		exit;
	}


	
}




//SELECT BAŞLANGIÇ
$baglantı = $db -> prepare("SELECT * from ayar where ayar_id=:id
	");
$baglantı->execute(array(
	"id"=>0,
));

$göster= $baglantı->fetch(PDO::FETCH_ASSOC);

//SELECT BİTİŞ
?>

<?php


if (isset($_POST['güncelle']))
{

	$ayarkaydet= $db -> prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_mesai=:ayar_mesai,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author,
		ayar_clock=:ayar_clock
		WHERE ayar_id=0");

	
	$update=$ayarkaydet->execute(array(

		'ayar_title' => $_POST['ayar_tel'],
		
		'ayar_description' => $_POST['ayar_mail'],
		'ayar_mesai' => $_POST['ayar_mesai'],
		'ayar_keywords' => $_POST['ayar_facebook'],
		'ayar_author' => $_POST['ayar_twitter'],
		'ayar_clock' => $_POST['ayar_clock']
	));
	if ($update) {
		
		header("Location:setting.php?durum=ok");
	}
	else{
		header("Location:setting.php?durum=no");
	}

}
?>


<?php 

if (isset($_POST['iletisim1'])) {
	$iletisimayar = $db-> prepare("UPDATE ayar SET

		ayar_tel=:ayar_tel,
		ayar_faks=:ayar_faks,
		ayar_gms=:ayar_gms,
		ayar_mail=:ayar_mail,
		ayar_zopim=:ayar_zopim


		where ayar_id=0
		");

	$iletisimonay = $iletisimayar->execute(array(

		"ayar_tel" => $_POST["telefon"],
		"ayar_faks" => $_POST["faks"],
		"ayar_gms" => $_POST["gsm"],
		"ayar_mail" => $_POST["mail"],
		"ayar_zopim" => $_POST["zopim"]

	));

	if ($iletisimonay) {
		header("Location:iletisim.php?durum=ok");	
	}
	else{
		header("Location:iletisim.php?durum=no");
	}
}

?>




<?php 

if (isset($_POST['sosyal-medya'])) {
	$sosyal= $db-> prepare("UPDATE ayar SET

		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_youtube=:ayar_youtube,
		ayar_google=:ayar_google
		where ayar_id=0

		");

	$sosyalayar= $sosyal->execute(array(
		"ayar_facebook" => $_POST['facebook'],
		"ayar_twitter" => $_POST['twitter'],
		"ayar_youtube" => $_POST['youtube'],
		"ayar_google" => $_POST['google']
	));

	if ($sosyalayar) {
		header("Location:sosyal-medya.php?durum=ok");
	}

	else {
		header("Location:sosyal-medya.php?durum=no");

	}
}
?>


<?php 

if (isset($_POST['adres'])) {
	$adres= $db->prepare("UPDATE ayar set 
		ayar_il=:ayar_il,
		ayar_ilce=:ayar_ilce,
		ayar_adres=:ayar_adres,
		ayar_maps=:ayar_maps
		where ayar_id=0
		");
	$adresolumlu= $adres->execute(array(
		"ayar_il" => $_POST['il'],
		"ayar_ilce" => $_POST['ilce'],
		"ayar_adres" => $_POST['adres1'],
		"ayar_maps" => $_POST['harita']

	));

	if ($adresolumlu) {
		header("Location:adres.php?durum=ok");
	}
	else {
		header("Location:adres.php?durum=no");
	}
}
?>





<?php 

$hakkımdacek= $db->prepare("SELECT * from hakkımda where hakkımda_id=0");

$hakkımdacek->execute(array());

$hakkımdagöster = $hakkımdacek -> fetch(PDO::FETCH_ASSOC);

?>



<?php 
if ($_POST["hakkımda"]) {
	$hakkımdagün = $db-> prepare("UPDATE hakkımda set 
		title=:title,
		icerik=:icerik,
		video=:video,
		vizyon=:vizyon,
		misyon=:misyon

		where hakkımda_id=0

		");
	$hakkımdah = $hakkımdagün -> execute(array(
		"title" => $_POST['baslık'],
		"icerik" => $_POST['icerik'],
		"video" => $_POST['video'],
		"vizyon" => $_POST['vizyon'],
		"misyon" => $_POST['misyon']


	));

	if ($hakkımdah) {
		header("Location:lili.php?durum=ok");
	}
	else{
		header("Location:lili.php?durum=no");
	}
}


//Kullanıcı GÜNCELLEME ÇEKME İŞLEMİ



if (isset($_POST["kullanici"])) {
	$kullanicigün= $db->prepare("UPDATE kullanici set 
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_tc=:kullanici_tc,
		kullanici_yetki=:kullanici_yetki
		where kullanici_id=:kullanici_id

		");

	$kullanicigün=$kullanicigün->execute(array(
		"kullanici_id" => $_GET['id'],
		"kullanici_ad" => $_POST['ad'],
		"kullanici_soyad" => $_POST['soyad'],
		"kullanici_tc" => $_POST['tc'],
		"kullanici_yetki" => $_POST['yetki']
		
	));
	$asd=$_POST['kallanici_id'];
	if ($kullanicigün) {
		header("Location:kullanici-update.php?durum=ok&id=".$_GET['id']);
	}
	else
	{
		header("Location:kullanici-update.php?durum=no".$_GET['id']);
	}
}




if (isset($_POST['menu_ekle'])) {

	$menu_seo=seo($_POST("menu_ad"));
	$menuekle= $db->prepare("INSERT INTO menu set 

		menu_ad=:menuad,
		menu_href=:menuhref,
		menu_icon=:menuicon,
		menu_alan=:menualan,
		menu_seo=:menuseo
		");
	$menueklesorgu=$menuekle->execute(array(
		"menuad" => $_POST['menu_ad'],
		"menuhref" => $_POST['menu_href'],
		"menuicon" => $_POST['menu_icon'],
		"menualan" => $_POST['menu_alan'],
		"menuseo"=>$menu_seo

	));

	if ($menueklesorgu) {
		header("Location:menu-ekle?durum=ok");
	}
	else {
		header("Location:menu-ekle?durum=no");	}
	}
	if (isset($_POST['logoduzenle'])) {

		if (87849<$_FILES['ayar_logo']['size']) {
			Header("Location:setting.php?durum=yuksek-boyut");

		} 

		else {

			$uzantı_resim=array("jpeg","png","gif","ico");

			$ext = explode(".", $_FILES['ayar_logo']["name"] );

			
			if (in_array($ext[1],$uzantı_resim)=== false) {
				Header("Location:setting.php?durum=farklı-uzantı");
			}
			else {

				$uploads_dir = 'image';

				@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
				@$name = $_FILES['ayar_logo']["name"];

				$benzersizsayi4=rand(20000,32000);
				$refimgyol=$uploads_dir."/".$benzersizsayi4.$name;

				@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");


				$duzenle=$db->prepare("UPDATE ayar SET
					ayar_logo=:logo
					WHERE ayar_id=0");
				$update=$duzenle->execute(array(
					'logo' => $refimgyol
				));



				if ($update) {

					$resimsilunlink=$_POST['eski_yol'];
					unlink("image/$resimsilunlink");

					Header("Location:setting.php?durum=ok");

				} else {

					Header("Location:setting.php?durum=no");
				}
			}
		}
	}

//Slider Ekleme

	if (isset($_POST['slider_ekle'])) {	
		$uploads_dir = 'slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);	
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=$uploads_dir."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$slider_ekle= $db-> prepare("INSERT into slider set 
			slider_ad=:slider_ad,
			slider_aciklama=:slider_aciklama,
			slider_resim=:slider_resim,
			slider_indirim_fiyat=:slider_indirim_fiyat,
			slider_fiyat=:slider_fiyat
			");
		$slider_ekle_sor= $slider_ekle->execute(array(
			"slider_ad" => $_POST["slider_ad"],
			"slider_aciklama" => $_POST['slider_aciklama'],
			"slider_fiyat" => $_POST['slider_fiyat'],
			"slider_indirim_fiyat" => $_POST['slider_indirimli_fiyat'],
			"slider_resim" => $refimgyol

		));
		if ($slider_ekle_sor) {
			header("Location:slider-ekle.php?durum=ok");
		}
		else {
			header("Location:slider-ekle.php?durum=no");
		}
	}



	if (isset($_POST['slider_update'])) {

		$uploads_dir = 'slider';
		@$tmp_name = $_FILES['slider_resim']["tmp_name"];
		@$name = $_FILES['slider_resim']["name"];
	//resmin isminin benzersiz olması
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);	
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=$uploads_dir."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
		if ($name=="") {
			$slider_ekle= $db-> prepare("UPDATE slider set 
				slider_ad=:slider_ad,
				slider_aciklama=:slider_aciklama,
				
				slider_indirim_fiyat=:slider_indirim_fiyat,
				slider_fiyat=:slider_fiyat
				where slider_id=:slider_id
				");
			$slider_ekle_sor= $slider_ekle->execute(array(
				"slider_ad" => $_POST["slider_ad"],
				"slider_aciklama" => $_POST['slider_aciklama'],
				"slider_fiyat" => $_POST['slider_fiyat'],
				"slider_indirim_fiyat" => $_POST['slider_indirimli_fiyat'],
				
				"slider_id" => $_POST['id']

			));
			if ($slider_ekle_sor) {
				header("Location:slider-update.php?durum=ok&id=".$_POST['id']);
			}
			else {
				header("Location:slider-update.php?durum=no");
			}
		}
		else {

			$slider_ekle= $db-> prepare("UPDATE slider set 
				slider_ad=:slider_ad,
				slider_aciklama=:slider_aciklama,
				slider_resim=:slider_resim,
				slider_indirim_fiyat=:slider_indirim_fiyat,
				slider_fiyat=:slider_fiyat
				where slider_id=:slider_id
				");
			$slider_ekle_sor= $slider_ekle->execute(array(
				"slider_ad" => $_POST["slider_ad"],
				"slider_aciklama" => $_POST['slider_aciklama'],
				"slider_fiyat" => $_POST['slider_fiyat'],
				"slider_indirim_fiyat" => $_POST['slider_indirimli_fiyat'],
				"slider_resim" => $refimgyol,
				"slider_id" => $_POST['id']

			));
			if ($slider_ekle_sor) {
				header("Location:slider-update.php?durum=ok&id=".$_POST['id']);
			}
			else {
				header("Location:slider-update.php?durum=no");
			}
		}
	}
	

	//----------Yeni Kullanıcı Kayıtı-------------------//

	if (isset($_POST["kayıt_ol"])) {

	//Mail Sorgulama
		$baglantı=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:kullanici_mail");
		$baglantı->execute(array(
			"kullanici_mail"=>$_POST['kullanici_mail']

		));

		$sor= $baglantı->rowCount();

		if ($sor==1) {
			header("Location:register/index?durum=no");
			exit;
		}

	 //Mail Sorgulama bitiş
		else {
			$password=md5($_POST['kullanici_password']);

			$kullanici_ekle = $db->prepare("INSERT into kullanici set 
				kullanici_ad=:kullanici_ad,
				kullanici_soyad=:kullanici_soyad,
				kullanici_password=:kullanici_password,
				kullanici_mail=:kullanici_mail,
				kullanici_yetki=:kullanici_yetki,
				durum=:durum
				");

			$kullanici_ad=htmlspecialchars($_POST['kullanici_ad']);
			$kullanici_soyad=htmlspecialchars($_POST['kullanici_soyad']);
			$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
			$kullanici_sor=$kullanici_ekle->execute(array(
				"kullanici_ad"=> $kullanici_ad ,
				"kullanici_soyad"=> $kullanici_soyad ,
				"kullanici_password"=> $password,
				"kullanici_mail"=> $kullanici_mail,
				"kullanici_yetki" => 1,
				"durum" => 1

			));

			if ($kullanici_sor) {
				header("Location:Login/index?durum=kayıt");
			}
			else {
				header("Location:register/index?durum=no1");
			}
		}
	}
//------------------------KATEGORİ EKLEME İŞLEMİ_-------------------
	if (isset($_POST["kategori_ekle"])) {
		$kategori_ekle=$db->prepare("INSERT into kategori set 
			kategori_ad=:kategori_ad,
			kategori_durum=:kategori_durum,
			kategori_seourl=:kategori_seourl");


		$kategori_ekle_sorgu=$kategori_ekle->execute(array(
			"kategori_ad" => $_POST['kategori_ad'],
			"kategori_durum"=>1,
			"kategori_seourl" => $_POST['kategori_seourl']


		));

		if ($kategori_ekle_sorgu) {
			header("Location:kategori.php?durum=eklendi");
		}
		else {

			header("Location:kategori-ekle.php?durum=no");

		}
	}
	//------------------------KATEGORİ güncelleme İŞLEMİ_-------------------
	if (isset($_POST["kategori_güncelle"])) {

		$durum=$_POST['radio'];
		
		if ($durum=="on") {
			$durum=1;
		}
		
		else {
			$durum=0;
		}

		
		$kategori_ekle=$db->prepare(" UPDATE kategori set 
			kategori_ad=:kategori_ad,
			kategori_durum=:kategori_durum
			where kategori_id=:kategori_id");
		$kategori_ekle_sorgu=$kategori_ekle->execute(array(
			"kategori_ad" => $_POST['kategori_ad'],
			"kategori_durum" => $durum,
			"kategori_id" =>$_POST['id']

		));

		if ($kategori_ekle_sorgu) {
			header("Location:kategori-update.php?durum=ok&id=".$_POST["id"]);
		}
		else {

			header("Location:kategori-update.php?durum=no&id=".$_POST["id"]);

		}
	}

	//Kendi Bİlgilerini Güncelleme

	if (isset($_POST['k_gün'])) {
		$sifre=md5($_POST["old_sifre"]);


		$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id
			");
		$kullanicisor->execute(array(
			"kullanici_id"=>$_POST['id']
		));



		$göster1=$kullanicisor->fetch(PDO::FETCH_ASSOC);


		if ($göster1["kullanici_password"]==$sifre) {


			
			if ($_POST['sifre_1']==$_POST['sifre_2']) {
				$sifre_uzunluk=strlen($_POST['sifre_2']);

				if ($sifre_uzunluk==0) {

					$kullanici_gün=$db->prepare("UPDATE kullanici set 
						kullanici_ad=:kullanici_ad,
						kullanici_soyad=:kullanici_soyad,
						kullanici_no=:kullanici_no
						
						where kullanici_id=:kullanici_id");
					$kullanici_gün_sor= $kullanici_gün->execute(array(
						"kullanici_ad"=>$_POST['kullanici_ad'],
						"kullanici_soyad" =>$_POST['kullanici_soyad'],
						"kullanici_no"=>$_POST['kullanici_no'],
						
						"kullanici_id" => $_POST['id']
					));



					if($kullanici_gün_sor) {
						header("Location:../../hesap-ayari?durum=ok");
					}
					else {
						header("Location:../../hesap-ayari?durum=no");
					}
				}


				elseif ($sifre_uzunluk>7) {

					$sifre_yeni=md5($_POST['sifre_1']);
					$kullanici_gün=$db->prepare("UPDATE kullanici set 
						kullanici_ad=:kullanici_ad,
						kullanici_soyad=:kullanici_soyad,
						kullanici_no=:kullanici_no,
						kullanici_password=:kullanici_password
						where kullanici_id=:kullanici_id

						");
					$kullanici_gün_sor= $kullanici_gün->execute(array(
						"kullanici_ad"=>$_POST['kullanici_ad'],
						"kullanici_soyad" =>$_POST['kullanici_soyad'],
						"kullanici_no"=>$_POST['kullanici_no'],
						"kullanici_password"=>$sifre_yeni,
						"kullanici_id" => $_POST['id']
					));

					if($kullanici_gün_sor) {
						header("Location:../../hesap-ayari?durum=ok");
					}
					else {
						header("Location:../../hesap-ayari?durum=no");
					}


				}
				else {
					header("Location:../../hesap-ayari?durum=sifre-uzunluk");
				}
					// code...

			}
			else{
				header("Location:../../hesap-ayari?durum=sifre-hatası");
			}

		}

		else {
			header("Location:../../hesap-ayari?durum=esleme-hatası");
		}
	}

	//Ürün Ekleme
	if (isset($_POST['urun_ekle'])) {

		$uploads_dir = 'urun-resim';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);	
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=$uploads_dir."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$kategori_id=explode(" ",$_POST['kategori']);

		$saat= date('d.m.Y H:i:s');

		$urun_ekle=$db->prepare("INSERT into ürüns set 

			urun_ad=:urun_ad,
			urun_aciklama=:urun_aciklama,
			urun_eklenme_tarihi=:urun_eklenme_tarihi,
			urun_fiyat=:urun_fiyat,
			urun_indirimli_fiyat=:urun_indirimli_fiyat,
			urun_durum=:urun_durum,
			urun_kalan=:urun_kalan,
			kategori_urun_id=:kategori_urun_id,
			urun_resim=:urun_resim,
			alt_kategori=:alt_kategori	");

		$urun_ekle_sorgu = $urun_ekle->execute(array(
			"urun_ad" => $_POST['urun_ad'],
			"urun_aciklama" => $_POST['icerik'],
			"urun_eklenme_tarihi" => $saat,
			"urun_fiyat" => $_POST['urun_fiyat'],
			"urun_indirimli_fiyat" => $_POST['urun_indirimli_fiyat'],
			"urun_durum" => 1,
			"urun_kalan" => $_POST['urun_stok'],
			"kategori_urun_id" => $kategori_id[1],
			"urun_resim" => $refimgyol,
			"alt_kategori" => $_POST['alt_kategori']

		));
		if ($urun_ekle_sorgu) {
			header("Location:urun-ekle.php?durum=ok");
		}
		else {

			header("Location:urun-ekle.php?durum=no");

		}

	}

	if (isset($_POST['urun_guncelle'])) {

		$uploads_dir = 'urun-resim';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);	
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=$uploads_dir."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");



		if ($name=="") {
			
			$kategori_id=explode(" ",$_POST['kategori']);
			$saat= date('d.m.Y H:i:s');

			$durum=$_POST['radio'];

			if ($durum=="on") {
				$durum=1;
			}

			else {
				$durum=0;
			}



			$urun_ekle=$db->prepare("UPDATE ürüns set 

				urun_ad=:urun_ad,
				urun_aciklama=:urun_aciklama,
				urun_fiyat=:urun_fiyat,
				urun_indirimli_fiyat=:urun_indirimli_fiyat,
				urun_durum=:urun_durum,
				urun_kalan=:urun_kalan
				where urun_id=:urun_id

				");

			$urun_ekle_sorgu = $urun_ekle->execute(array(
				"urun_ad" => $_POST['urun_ad'],
				"urun_aciklama" => $_POST['icerik'],				
				"urun_fiyat" => $_POST['urun_fiyat'],
				"urun_indirimli_fiyat" => $_POST['urun_indirimli_fiyat'],
				"urun_durum" => $durum,
				"urun_kalan" => $_POST['urun_stok'],
				"urun_id" => $_POST['id']
				
				

			));
			if ($urun_ekle_sorgu) {
				header("Location:urun-update.php?durum=ok&id=".$_POST['id']);
			}
			else {

				header("Location:urun-update.php?durum=no&id=".$_POST['id']);

			}
		}
		else {



			$kategori_id=explode(" ",$_POST['kategori']);
			$saat= date('d.m.Y H:i:s');

			$durum=$_POST['radio'];

			if ($durum=="on") {
				$durum=1;
			}

			else {
				$durum=0;
			}



			$urun_ekle=$db->prepare("UPDATE ürüns set 

				urun_ad=:urun_ad,
				urun_aciklama=:urun_aciklama,
				urun_fiyat=:urun_fiyat,
				urun_indirimli_fiyat=:urun_indirimli_fiyat,
				urun_durum=:urun_durum,
				urun_kalan=:urun_kalan,
				urun_resim=:urun_resim
				where urun_id=:urun_id

				");

			$urun_ekle_sorgu = $urun_ekle->execute(array(
				"urun_ad" => $_POST['urun_ad'],
				"urun_aciklama" => $_POST['icerik'],				
				"urun_fiyat" => $_POST['urun_fiyat'],
				"urun_indirimli_fiyat" => $_POST['urun_indirimli_fiyat'],
				"urun_durum" => $durum,
				"urun_kalan" => $_POST['urun_stok'],
				"urun_resim" => $refimgyol,
				"urun_id" => $_POST['id']

				
				

			));
			if ($urun_ekle_sorgu) {
				header("Location:urun-update.php?durum=ok&id=".$_POST['id']);
			}
			else {

				header("Location:urun-update.php?durum=no&id=".$_POST['id']);

			}
		}

	}

//SEPETE ÜRÜN EKLEME

	if (isset($_POST['sepet_ekle'])) {

		//KULLANICI
		$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
			");
		$kullanicisor->execute(array(
			"mail"=>$_SESSION['kullanici_mail']
		));
		$kullanicigöster= $kullanicisor->fetch(PDO::FETCH_ASSOC);

        //KULLANICI BİTİŞ


        //ÜRÜN

		$urun_getir=$db->prepare("SELECT * from ürüns where urun_id=:urun_id");

		$urun_getir->execute(array(
			"urun_id" => $_POST["urun_id"]
		));

		$urun_göster = $urun_getir-> fetch(PDO::FETCH_ASSOC);

		//ÜRÜN BİTİŞ




 //Ürün sorgulama

		$urun_getir=$db->prepare("SELECT * from ürüns where urun_id=:urun_id");

		$urun_getir->execute(array(
			"urun_id" => $_POST["urun_id"]));


		$urun_göster = $urun_getir->fetch(PDO::FETCH_ASSOC);


		//ÜRÜN SORGULAMA BİTİŞ


		//Sepet sorgulama

		$ürün_sepet1=$db->prepare("SELECT * FROM sepet where urun_id=:urun_id");
		$ürün_sepet1 ->execute(array(
			"urun_id" => $_POST["urun_id"]));
		$say=0;

		while($urun_sor1 =$ürün_sepet1->fetch(PDO::FETCH_ASSOC)) {

			$say=$say+$urun_sor1["urun_adet"];
		}


        //SEPET SORGULAMA BİTİŞ

		$cıkarma = $urun_göster["urun_kalan"] -  $say ;

		

		if ($cıkarma >= $_POST['adet']) {
			


			if ($urun_göster["urun_kalan"] < $_POST['adet']) {
				

				header("Location:../../urun?durum=adet&urun_id=".$urun_göster["urun_id"]);

			}



			else{

				if ($urun_göster["urun_fiyat"]-$urun_göster["urun_indirimli_fiyat"]!=$urun_göster["urun_fiyat"])
				{
					$urun_fiyat = $urun_göster["urun_indirimli_fiyat"];
				}

				else {
					$urun_fiyat = $urun_göster["urun_fiyat"];

				}

//SEPET EKLEME İŞLEMLERİ
				$sepet_ekle = $db->prepare("INSERT into sepet set 

					urun_id=:urun_id,
					kullanici_id=:kullanici_id,
					urun_adet=:urun_adet,
					urun_fiyat=:urun_fiyat,
					urun_resim=:urun_resim,
					urun_ad=:urun_ad,
					sepet_durum=1

					");
				$sepet_ekle_sor=$sepet_ekle->execute(array(
					"urun_id" => $urun_göster["urun_id"],
					"kullanici_id" => $kullanicigöster["kullanici_id"],
					"urun_adet" => $_POST['adet'],
					"urun_fiyat" => $urun_fiyat,
					"urun_resim" => $urun_göster["urun_resim"],
					"urun_ad" => $urun_göster["urun_ad"]
				));

				if ($sepet_ekle_sor) {
					header("Location:../../urun?durum=eklendi&urun_id=".$urun_göster["urun_id"]);
				}
				else {
					header("Location:../../urun?durum=hata&urun_id=".$urun_göster["urun_id"]);
				}
			}

		}

		else {
			header("Location:../../urun.php?durum=adet-az&urun_id=".$_POST['urun_id']);
		}
	}


	if(isset($_POST['urunfotosil'])) {

		$urun_id=$_POST['urun_id'];


		echo $checklist = $_POST['urunfotosec'];


		foreach($checklist as $list) {

			$sil=$db->prepare("DELETE from urunfoto where urunfoto_id=:urunfoto_id");
			$kontrol=$sil->execute(array(
				'urunfoto_id' => $list
			));
		}

		if ($kontrol) {

			Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=ok");

		} else {

			Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=no");
		}
	}
	


	if (isset($_POST["yorum_ekle"])) {
		session_start();
		ob_start();

		//Kullanıcı Sorgulama

		$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail
			");
		$kullanicisor->execute(array(
			"mail"=>$_SESSION['kullanici_mail']
		));




		$saat= date('d.m.Y');


		$göster1=$kullanicisor->fetch(PDO::FETCH_ASSOC);



		$yorum_ekle=$db->prepare("INSERT into yorum set 
			kullanici_ad=:kullanici_ad,
			kullanici_soyad=:kullanici_soyad,
			yorum=:yorum,
			yorum_tarih=:yorum_tarih,
			urun_id=:urun_id

			");
		$yorum_sp=htmlspecialchars($_POST['yorum']);
		$yorum_urun=htmlspecialchars($_POST["urun_id"]);

		$yorum=$yorum_ekle->execute(array(

			"kullanici_ad" => $göster1["kullanici_ad"],
			"kullanici_soyad" => $göster1["kullanici_soyad"],
			"yorum" =>$yorum_sp,
			"yorum_tarih" => $saat,
			"urun_id" => $yorum_urun


		));
		if ($yorum) {
			header("Location:../../urun.php?durum=yorum-ekle&urun_id=".$_POST['urun_id']);
		}

	}

	if (isset($_POST["ön_düzen"])) {
		$düzen=$db->prepare("SELECT * from ürüns where urun_id=:urun_id");
		$düzen->execute (array(
			"urun_id" => $_POST['ön_düzen']
		));
		$ön=$düzen->fetch(PDO::FETCH_ASSOC);

		if ($ön["one_cikar"]==1) {
			$update_ön=$db->prepare("UPDATE ürüns set 
				one_cikar=0
				where urun_id=:urun_id");
			$update_ön->execute(array(
				"urun_id" => $_POST['ön_düzen']
			));
		} 

		else {
			$update_ön=$db->prepare("UPDATE ürüns set 
				one_cikar=1
				where urun_id=:urun_id");
			$update_ön->execute(array(
				"urun_id" => $_POST['ön_düzen']
			));
		}

	}


	if (isset($_POST["yorum_onay"])) {
		$menusor= $db->prepare("SELECT * FROM yorum where yorum_id=:yorum_id");

		$menusor->execute(array(

			"yorum_id"=> $_POST['yorum_onay']
		));

		$yorum_sor= $menusor->fetch(PDO::FETCH_ASSOC);

		if ($yorum_sor["urun_yorum"]==1) {


			$yorum_düzen= $db->prepare("UPDATE yorum set 
				urun_yorum=0
				where yorum_id=:yorum_id");

			$yorum_düzen->execute(array(

				"yorum_id"=> $_POST['yorum_onay']
			));
		}
		else {

			$yorum_düzen= $db->prepare("UPDATE yorum set 
				urun_yorum=1
				where yorum_id=:yorum_id");

			$yorum_düzen->execute(array(

				"yorum_id"=> $_POST['yorum_onay']
			));

		}
		
	}
	if (isset($_POST["_adres_ad"])) {
		$adres_ayar=$db->prepare("UPDATE adress set 
			alici_ad=:alici_ad,
			alici_soyad=:alici_soyad,
			adres=:adres,
			sehir=:sehir,
			ilce=:ilce,
			posta_kodu=:posta_kodu,
			mail=:mail,
			mahalle=:mahalle,
			no=:no,
			adres_ad=:adres_ad where adres_id=:adres_id and kullanici_id=:kullanici_id
			");
		$adres_ayar->execute(array(
			"alici_ad" => $_POST["_alici_ad"],
			"alici_soyad" => $_POST["_alici_soyad"],
			"adres" => $_POST["_adres"],
			"sehir" => $_POST["_sehir"],
			"ilce" => $_POST["_ilce"],
			"posta_kodu" => $_POST["_posta_kodu"],
			"mail" => $_POST["mail_adres"],
			"mahalle" => $_POST["_mahalle"],
			"no" => $_POST["_no"],
			"adres_ad" => $_POST["_adres_ad"],
			"adres_id" => $_POST["id"],
			"kullanici_id" => $göster1["kullanici_id"]
		));
	}

	if (isset($_POST['sil_adres_onay'])) {


		$sil=$db->prepare("DELETE from adress where adres_id=:adres_id and kullanici_id=:kullanici_id");
		$sil->execute(array(
			"adres_id"=>$_POST['sil_adres_onay'],
			"kullanici_id" => $göster1["kullanici_id"]
		));


	}
	if (isset($_POST['kullanici_akle_adres'])) {


		

		$adres_ayar=$db->prepare("INSERT into adress set 
			alici_ad=:alici_ad,
			alici_soyad=:alici_soyad,
			adres=:adres,
			sehir=:sehir,
			ilce=:ilce,
			posta_kodu=:posta_kodu,
			mail=:mail,
			mahalle=:mahalle,
			no=:no,
			adres_ad=:adres_ad,
			kullanici_id=:kullanici_id
			");
		$adres_ek=$adres_ayar->execute(array(
			"alici_ad" => $_POST["_alici_ad"],
			"alici_soyad" => $_POST["_alici_soyad"],
			"adres" => $_POST["_adres"],
			"sehir" => $_POST["_sehir"],
			"ilce" => $_POST["_ilce"],
			"posta_kodu" => $_POST["_posta_kodu"],
			"mail" => $_POST["mail_adres"],
			"mahalle" => $_POST["_mahalle"],
			"no" => $_POST["_no"],
			"adres_ad" => $_POST["_adres_ad"],
			"kullanici_id" => $göster1["kullanici_id"]
			
		));

		if ($adres_ek) {

			Header("Location:../../adres-ekle?durum=ok");

		} else {

			Header("Location:../../adres-ekle?durum=no");
		}


	}

	if (isset($_POST['havale_islem'])) {
		$ch=rand(300,900);
		$ch1=rand(100,300);
		$ch2=rand(500,900);
		$ch3=rand(100,300);
		$ch4=rand(1000,232424242);
		$rand = $ch.$ch1.$ch2.$ch3.$ch4;

		$siparis_kod = md5($rand);

		echo $siparis_kod;


		$urun=$db->prepare("SELECT * from sepet where kullanici_id=:kullanici_id and sepet_durum=1");
		$urun->execute(array(
			"kullanici_id" => $göster1["kullanici_id"]
		));

		$ürünler;
		$toplam_adet;
		$toplam_fiyat;

		while ($urun_göster= $urun->fetch(PDO::FETCH_ASSOC)) {
			$ürünler=$ürünler.",".$urun_göster["urun_id"];
			$toplam_adet=$toplam_adet+$urun_göster["urun_adet"];
			$toplam_fiyat=$toplam_fiyat+$urun_göster["urun_adet"]*$urun_göster["urun_fiyat"];

			$urun_se=$db -> prepare("SELECT * from ürüns where urun_id=:urun_id");
			$urun_se->execute(array(
				"urun_id" => $urun_göster["urun_id"]
			));

			$urun_sec = $urun_se->fetch(PDO::FETCH_ASSOC);

			$kalan_adet_urun = $urun_sec["urun_kalan"]-$urun_göster["urun_adet"];


			$update_ürün = $db->prepare("UPDATE ürüns set 
				urun_kalan=:urun_kalan where urun_id=:urun_id"
			);

			$update_ürün->execute(array(
				"urun_kalan"=> $kalan_adet_urun,
				"urun_id" => $urun_göster["urun_id"]
			));
		}

		$tarih_getir=date("Y-m-d H:i"); 


		$siparis=$db->prepare("INSERT into siparis set 
			siparis_adet=:adet,
			siparis_fiyat=:fiyat,
			siparis_odeme=:odeme,
			siparis_durum=:durum,
			siparis_urun=:urun,
			siparis_onay=0,
			kullanici_id=:kullanici_id,
			banka=:banka,
			adres_id=:adres,
			siparis_onay_kod=:siparis_onay_kod,
			tarih=:tarih
			");

		$siparis_onay=$siparis->execute(array(
			"adet"=>$toplam_adet,
			"fiyat"=>$toplam_fiyat,
			"odeme" => "Havale",
			"durum" => "Ödeme Bekleniyor...",
			"urun" => $ürünler,
			"kullanici_id" => $göster1["kullanici_id"],
			"banka" => $_POST['banka_id'],
			"adres" => $_POST['adress'],
			"siparis_onay_kod" => $siparis_kod,
			"tarih" => $tarih_getir

		));


		$ürün_sil=$db->prepare("DELETE from sepet where kullanici_id=:kullanici_id ");
		$ürün_sil->execute(array(
			"kullanici_id"=>$göster1["kullanici_id"]
		));

		header("Location:../../index.php?durum=siparis_alındı");
	}
	if ($_POST['alt_ketegori_id']) {

		$alt_kategori=$db->prepare("SELECT * from alt_kategori where kategori_id=:id");
		$alt_kategori->execute(array(
			"id" => $_POST['alt_ketegori_id']
		));

		$ad="";
		$id="";

		while ($alt_kategori_göster= $alt_kategori->fetch(PDO::FETCH_ASSOC)) {
			$ad=$ad.",".$alt_kategori_göster["alt_kategori_ad"];
			$id=$id."-".$alt_kategori_göster["alt_kategori_id"];
		}
		echo $ad;
		echo "x";
		echo $id;
	}
	if (isset($_POST['alt_kategori_güncelle'])) {

		$alt_kategori_ekle=$db->prepare("UPDATE alt_kategori set 
			alt_kategori_ad=:alt_kategori_ad
			where alt_kategori_id=:id
			");
		$alt_kategori_ekle_sor = $alt_kategori_ekle->execute(array(
			"id" => $_POST['id'],
			"alt_kategori_ad" => $_POST['alt_kategori_ad']
		));

		if ($alt_kategori_ekle_sor) {
			header("Location:alt-kategori-update.php?durum=ok&id=".$_POST["id"]);
		}
		else {
			header("Location:alt-kategori-update.php?durum=no&id=".$_POST["id"]);
		}
	}

	if (isset($_POST['alt_kategori_ekle'])) {

		$alt_kategori_ekle=$db->prepare("INSERT into alt_kategori set 
			alt_kategori_ad=:alt_kategori_ad,
			kategori_id=:id
			");
		$alt_kategori_ekle_sor = $alt_kategori_ekle->execute(array(
			"id" => $_POST['id'],
			"alt_kategori_ad" => $_POST['alt_kategori_ad']
		));

		if ($alt_kategori_ekle_sor) {
			header("Location:alt-kategori.php?durum=ok&id=".$_POST['id']);
		}
		else {
			header("Location:alt-kategori.php?durum=no&id=".$_POST['id']);
		}
	}
	if (isset($_POST["sifre_unut_login"])) {
		

		$sorgu_yaz =$db->prepare("SELECT * from kullanici where kullanici_mail=:kullanici_mail");

		$sorgu_yaz->execute(array(
			"kullanici_mail" => $_POST['unut_sifre']
		));
		$say_sorgu = $sorgu_yaz->rowCount();

		if ($say_sorgu==0) {
			$_SESSION['durum'] ="sifre_hatası";
			header("Location:login");
		}
		else {
			$rand1=rand(0,9);
			$rand2=rand(0,9);
			$rand3=rand(0,9);
			$rand4=rand(0,9);
			$rand5=rand(0,9);
			$rand6=rand(0,9);
			$toplam_rand=$rand1.$rand2.$rand3.$rand4.$rand5.$rand6;

			$_SESSION['rand_'] = $toplam_rand;
			$_SESSION['kullanici_sifirla'] = $_POST['unut_sifre'];
			header("Location:login/sifre_unut.php");
		}
	}

	if (isset($_POST['onay_sifre'])) {

		if ($_SESSION['rand_']==$_POST['reset_password']) {
			
			$_SESSION['onay_giris_sifre']="sadas";
			header("Location:login/sifre_de_on.php");
		}
		else {
			$_SESSION['pass_']="uyumsuz";
			header("Location:login/sifre_unut.php");
		}
	}

	if (isset($_POST["degis_pass"])) {
		$new_pass = md5($_POST['new_pass']);

		$update_pass=$db->prepare("UPDATE kullanici set 

			kullanici_password=:kullanici_password
			where kullanici_mail=:kullanici_mail");

		$olumlu_=$update_pass->execute(array(
			"kullanici_password"=>$new_pass,
			"kullanici_mail" => $_SESSION['kullanici_sifirla']
		));
		if ($olumlu_) {
			unset($_SESSION['rand_']);
			unset($_SESSION['onay_giris_sifre']);
			unset($_SESSION['kullanici_sifirla']);
			$_SESSION['sifre_']="degisti";
			header("Location:login");
		}
		else {
			$_SESSION['sifre_']="hata";
			header("Location:login/sifre_de_on.php");
		}
	}
?>