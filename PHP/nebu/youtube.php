  <?php
$site=file_get_contents("http://www.kentselhaber.com/V1");
 
preg_match_all("/<a href=\"(.*?)\"><font style=\"(.*?)\">(.*?)<\/font>(.*?)<\/a>/im",$site,$veri);
 
print_r($veri);
