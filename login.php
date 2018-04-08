<?php
session_start();
if (isset($_SESSION['userLogged'])) {
	header("Location:index.php");
}
include_once('dbconfig.php');
include_once('chatConfig.php'); 
$username="";
if (isset($_SESSION['userLogged'])) {
	$result="<span style='color:green'>Successfully LoggedIn</span>";
	$uname=$_SESSION['userLogged'];
}
else{
	$result="";
	$uname="";
}
if (isset($_POST['loginSubmit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$user=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `uname`,`pass`,`verified` FROM `users` WHERE `uname`='$username'"));
	$usernameVal=$user['uname'];
	$passwordVal=$user['pass'];
	$isVerified=$user['verified'];
	if ($usernameVal=='') {
		$result="<span style='color:blue'>You haven't Signed up Yet!</span>";
	}
	else{
		if (md5($password)==$passwordVal) {
			// setcookie('userLogged',$username,time()+60*60*24);
			$_SESSION['userLogged']=$username;

			if($isVerified!="verified")
			{
				header("Location:verifyMail.php");
				$_SESSION['notVerified']="notVerified";
			}
			else
			{
				mysqli_query($dbase,"UPDATE `users` SET `status`='1' WHERE `uname`='$username' ");
				header("Location:index.php");
			}
		}
		else{
			$result="<span style='color:red'>Incorrect Password!</span>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>TradIn</title>
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
					<div id="loginWordDiv"><span id="loginWord">Log In</span></div>
					<form name="login" method="post" action="login.php">
						<table id="loginTable">
							<tr>
								<td colspan="2"><?php echo "$result"; ?></td>
							</tr>
							<tr>
								<td colspan="2"><span class="userLock"><i class="fa fa-user"></i></span><input type="text" name="username" class="loginips" placeholder="User Name" value='<?php echo "$username"; ?>'></td>
							</tr>
							<tr>
								<td colspan="2"><span class="userLock"><i class="fa fa-lock"></i></span><input type="password" name="password" class="loginips" placeholder="Password"></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="loginSubmit" class="btn btn-success" value="LOGIN" id="loginbtn"></td>
							</tr>
						</table>
					</form>
					<table id="extraBtn">
						<tr>
							<td colspan="2"><button class="btn btn-primary logbtns" onclick="location.href='signup.php'">SIGNUP
							</button><button class="btn btn-danger logbtns" name="resetBtn"  onclick="location.href='resetp.php'" >FORGOT PASSWORD?</button></td>
						</tr>
					</table>
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