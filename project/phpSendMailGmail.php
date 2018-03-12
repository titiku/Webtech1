<html>
<head>
</head>
<body>
<?php
	require_once('class.phpmailer.php');
	require 'vendor/autoload.php';
	use Oop\Database;

	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();
	// $mail->SMTPDebug = 2;
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username = "SuratGardens@gmail.com"; // GMAIL username
	$mail->Password = "SuratGardens123456"; // GMAIL password
	$mail->From = "SuratGardens@gmail.com"; // "name@yourdomain.com";
	//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
	$mail->FromName = 'Surat Events.'  ;// set from Name
	$mail->Subject = "Surat Events.";
	if (isset($_GET['username'])){
		if ($_GET['type'] == "regis"){
			$mail->Body = 'Your link : <a href="http://localhost/project/verifyUser.php?username='.$_GET['username'].'">http://localhost/project/verifyUser.php</a>';
		} else if ($_GET['type'] == "forgotPassword") {
			$database = new Database();
		  $user = $database->loadProfile($_GET['username']);
			$_GET['email'] = $user->getEmail();
			$mail->Body = 'Your link : <a href="http://localhost/project/newPassword.php?username='.$_GET['username'].'">http://localhost/project/newPassword.php</a>';
		}
	} else if ($_GET['type'] == "acceptEvent"){
		$mail->Body = 'You can join '.$_GET['name'].'.';
	} else if ($_GET['type'] == "unacceptEvent"){
		$mail->Body = 'Sorry, You can not join '.$_GET['name'].'.';
	} else {
		echo '<script type="text/javascript">window.location.href = "index.php";</script>';
	}

	$mail->AddAddress($_GET['email'], "asdasd"); // to Address



	//$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
	//$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

	$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

	if($mail->Send()){
		echo 'ส่งเรียบร้อย';
	} else {
		echo 'ไม่';
	}
	if (isset($_GET['id_ev'])){
		echo '<script type="text/javascript">console.log("id_ev");</script>';
		echo '<script type="text/javascript">window.location.href = "manageevent/attendantstable.php?id_ev='.$_GET['id_ev'].'";</script>';
	}
	echo '<script type="text/javascript">window.location.href = "login.php";</script>';
?>
</body>
</html>
