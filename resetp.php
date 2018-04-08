<?php
session_start();
if (isset($_SESSION['userLogged'])) {
	header('Location:index.php');
}
include_once('dbconfig.php');
include_once('chatConfig.php'); 
if (isset($_POST['sendMail'])) {
	$uname=$_POST['uname'];
	$email=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `email` FROM `users` WHERE `uname`='$uname' "));
	$email=$email['email'];
	$verifyPass='0123456789';
	$verifyPass=str_shuffle($verifyPass);
	$verifyPass=substr($verifyPass,4);
	$message="You received this email as you requested for Password change.Your Verification password is <b>$verifyPass</b>.This is required to know that you are original user having this email id.";
	mail($email,"Reset Password", $message);
	$form='
	<form method="post" action="resetp.php">
		<table id="loginTable">
			<tr>
				<td colspan="2"><span class="userLock"><i class="fa fa-key"></i></span><input type="password" name="vpass" class="loginips" placeholder="Verification Password"><input type="hidden" value="'.$uname.'" name="uname"><input type="hidden" value="'.$verifyPass.'" name="check"></td>
			</tr>
			<tr>
				<td colspan="2"><span class="userLock"><i class="fa fa-key"></i></span><input type="password" name="npass" class="loginips" placeholder="Enter New Password"></td>
			</tr>
			<tr>
				<td colspan="2"><span class="userLock"><i class="fa fa-lock"></i></span><input type="password" name="ncpass" class="loginips" placeholder="Confirm Password"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="btn btn-danger" name="reset" value="RESET PASSWORD" id="loginbtnr"></td>
			</tr>
		</table>
	</form>';
}
else if (isset($_POST['reset'])) {
	$uname=$_POST['uname'];
	$vpass=$_POST['vpass'];
	$npass=$_POST['npass'];
	//$ncpass=$_POST['ncpass'];
	$check=$_POST['check'];
	if ($npass==$check) {
		$pass=md5($pass);
		mysqli_query($dbase,"UPDATE `users` SET `pass`='$pass' WHERE `uname`='$uname' ");
		header("Location:login.php");
	}
	else{
		$result='<span style="color:red">Invalid Code...!</span>';
	}
	$form='
	<form method="post" action="resetp.php">
		<table id="loginTable">
			<tr>
				<td>'.
					$result.'
				</td>
			</tr>
			<tr>
				<td colspan="2"><span class="userLock"><i class="fa fa-key"></i></span><input type="password" name="vpass" class="loginips" placeholder="Verification Password"><input type="hidden" value="'.$uname.'" name="uname"><input type="hidden" value="'.$verifyPass.'" name="check"></td>
			</tr>
			<tr>
				<td colspan="2"><span class="userLock"><i class="fa fa-key"></i></span><input type="password" name="npass" class="loginips" placeholder="Enter New Password"></td>
			</tr>
			<tr>
				<td colspan="2"><span class="userLock"><i class="fa fa-lock"></i></span><input type="password" name="ncpass" class="loginips" placeholder="Confirm Password"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="btn btn-danger" name="reset" value="RESET PASSWORD" id="loginbtnr"></td>
			</tr>
		</table>
	</form>';
}
else{
	$form='
	<form method="post" action="resetp.php">
		<table id="loginTable">
			<tr>
				<td colspan="2"><span class="userLock"><i class="fa fa-user"></i></span><input type="text" name="uname" class="loginips" placeholder="Enter User Name"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="sendMail" class="btn btn-danger" value="SEND MAIL" id="loginbtnr"></td>
			</tr>
		</table>
	</form>';
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
		<?php  include_once('header.php'); ?>
		<div class="rowp">
			<div class="icont">
				<div id="loginBoxr">
					<div id="loginWordDivr"><span id="loginWordr">Reset Password</span></div>
					<?php echo "$form"; ?>
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