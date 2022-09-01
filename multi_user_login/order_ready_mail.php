<?php 
$email = $_GET['email'];

include('smtp/PHPMailerAutoload.php');
$html='Hi Customer, <br><br>Thanks for choosing Online Pharmacy.<br><br><b>Your Order is Ready.</b><br>Please login to our website and choose any of the option below: <br>(1)If you would like to come and pickup the order at store please click "Pick-up at Store". <br>(or)<br>(2)If your would like to choose the delivery option please click on the "Delivery" and choose selected date and time.<br><br>Thanks,<br>Online Pharmacy';
echo smtp_mailer($email,'Order Ready',$html);
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
    window.location.href = "user_order_pharmacist.php";
</script>