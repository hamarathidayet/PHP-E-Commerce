<?php
//BAŞLATMA INIT
$dosya_ad="kod12.txt";
$dosya=fopen($dosya_ad,"w");
$ch = curl_init();
//ÇEKİLİCEK VE UYGULUANACAK DEGERLER
curl_setopt($ch, CURLOPT_URL, "https://www.amazon.com/dp/B079TWX9SN");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

//dosyaya yazdırma 
curl_setopt($ch,CURLOPT_FILE,$dosya);

//BULMA
if (curl_exec($ch)) {
  echo "Bilgiler ".$dosya_ad." içine taşınmıştır";
}
//KApatama
curl_close($ch);
?>