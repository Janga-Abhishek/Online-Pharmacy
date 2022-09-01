<?php 
$email = $_GET['email'];

include('smtp/PHPMailerAutoload.php');
$html='Hi Customer, <br><br>Thanks for choosing Online Pharmacy.<br><br>Unfortunatly your Prescription has been <b>"REJECETED"</b> because of the invalid Prescription. <br>Please contact onlinepharmacytest149@gmail.com for more info.<br><br>Thanks,<br>Online Pharmacy';
echo smtp_mailer($email,'Order Rejected',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "onlinepharmacytest149@gmail.com";
	$mail->Password = "OnlinePharmacyTest@149";
	$mail->SetFrom("onlinepharmacytest149@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'sent';
	}
}
?>
<script>
    window.location.href = "user_prescriptions.php";
</script>