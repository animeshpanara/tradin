<?php
session_start();
if (!isset($_SESSION['userLogged'])) {
	header("Location:index.php");
}
include_once('dbconfig.php');
$userName=$_SESSION['userLogged'];
$vercode=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `verified` FROM `users` WHERE `uname`='$userName'"));
$vercode=$vercode['verified'];
if($vercode=="verified")
{
	header("Location:index.php");
}
if (isset($_POST['verifyMail'])) {
	$code=$_POST['password'];
	if($code==$vercode)
	{
		mysqli_query($dbase,"UPDATE `users` SET `verified`='verified' WHERE `uname`='$userName'");
		unset($_SESSION['notVerified']);
		$time=time() + 4.5*60*60*1000;
		mysqli_query($dbase,"UPDATE `users` SET `status`='1' WHERE `uname`='$userName' ");
		header("Location:index.php");
	}
	else
	{
		$errorLog="<span style='color:red; display:block; text-align: center;'>Haha! We are not dumb...your code's incorrect.</span>";
	}
}
if (isset($_POST['resend'])) {
	$mail=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `email` FROM `users` WHERE `uname`='$userName'"));
	$mail=$mail['email'];
	// $vercode="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	// $vercode=str_shuffle($vercode);
	// $vercode=substr($vercode,0,8);
	// mysqli_query($dbase,"UPDATE `users` SET `verified`='$vercode' WHERE `userName`='$userName'");
	$subject = 'Verification for TradIn';
	$headers = "From: admin@tradin.com\r\n";
	$headers .= "Reply-To: comebackgogo7@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($mail,$subject, "Your verification code is $vercode.<br><br>Regards,<br>Team TradIn",$headers);
	$errorLog="<span style='color:green; display:block; text-align: center;'>Successfully resent verification code...</span>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>TradIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/mobtab.css">
</head>
<body>
	<div class="containerp">
		<?php include_once('header.php'); ?>
		<div class="rowp">
			<div class="icont">
				<div id="loginBox">
					<div id="loginWordDiv"><span id="loginWord">Verify Mail</span></div>
					<form method="post" action="verifyMail.php">
						<table id="loginTable">
							<tr>
								<td><?php 
										if(isset($errorLog))
											echo "$errorLog"; 
									?>
								</td>
							</tr>
							<tr>
								<td><label class="slabels" for="verify" style="color: #607d8b;">Verify Your Mail-Id by submitting password that we mailed you to your provided Mail-Id </label></td>
							</tr>
							<tr>
								<td><span class="userLock"><i class="fa fa-envelope"></i></span>
								<input type="password" name="password" class="loginips" placeholder="Password">
							</tr>
							<tr>
								<td><input type="submit" name="verifyMail" class="btn btn-success" value="Verify" style="margin-right: 10px;"><input type="submit" name="resend" class="btn btn-primary" value="Resend" style="margin-left: 10px;"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/int.js"></script>
<script type="text/javascript" src="js/restapi.js"></script>
</html>