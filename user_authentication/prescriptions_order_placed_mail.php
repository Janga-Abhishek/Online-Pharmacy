<?php session_start();

include "connection.php";
if (isset($_SESSION['u_id']) && isset($_SESSION['id'])) {
     $username = $_SESSION['u_id'];}
	 echo $username;
	 $email = $_SESSION['email'];
	 echo $email;
	 $id = $_GET['orderId'];
    echo $id;

include('smtp/PHPMailerAutoload.php');
$html='Hi Customer, <br><br>Thanks for choosing Online Pharmacy.<br><b>Your Prescription has been uploaded.<br>You check the status of the order in the PRESCRIPTIONS on our website</b><br><br>Thanks,<br>Online Pharmacy';
echo smtp_mailer($email,'Order Placed',$html);
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
    window.location.href = "prescriptions.php";
</script>