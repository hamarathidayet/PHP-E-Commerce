<?

require("class.phpmailer.php");






$mail = new PHPMailer();
$mail->IsSMTP();  
	$mail->CharSet="SET NAMES UTF8";                               // send via SMTP
	$mail->Host     = "mail.hostinger.com"; // SMTP servers
	$mail->SMTPAuth = false;     // turn on SMTP authentication
	$mail->Username = "info@hidayethamarat.ga";  // SMTP username
	$mail->Password = "Hamarat67.";// SMTP password
	$mail->Port     = 25;
	$mail->From     = "info@hidayethamarat.ga"; // smtp kullanýcý adýnýz ile ayný olmalý
	$mail->Fromname = "info@hidayethamarat.ga";
	//Çoklu mail için bu satırı çoğal
	$mail->AddAddress("hamarat.hidayet@gmail.com","Form Mail");
	

	$mail->Subject  =  "Hidayet Hamarat";
	$mail->Body     =  "Merhaba Hidayet Bubir denemedir";

	if(!$mail->Send())
	{
		echo "Mesaj Gönderilemedi <p>";
		echo "Mailer Error: " . $mail->ErrorInfo;
		exit;
	}
	else {
		echo "Mesaj Gönderildi";
		exit;
	}

	?>
<!--<meta http-equiv="refresh" content="0;URL=../iletisim.php?durum=ok">-->