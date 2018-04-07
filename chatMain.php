<?php 
session_start();
if(isset($_SESSION['notVerified']))
{
	header('Location:verifyMail.php');
}
if (!isset($_SESSION['userLogged'])) {
	header('Location:login.php');
}
include_once('dbconfig.php');
$uname=$_SESSION["userLogged"];
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
<body onload="">
	<div class="containerp">
		<?php include_once('header.php'); ?>
		<div class="rowp">
			<div class="icont">
				<div id="sellBox">
					<div id="sellWordDiv"><span id="sellWord">Recent Chats</span></div>
					<table id="sellTable" style="margin-bottom: 20px; " style="width: 90%;">
						<?php
							$myChats = mysqli_query($dbase,"SELECT DISTINCT `msgfrom` FROM `chats` WHERE `msgfrom`<>'$uname' ORDER BY `time` DESC");
							while($myChat=mysqli_fetch_assoc($myChats))
							{
								$from=$myChat["msgfrom"];
								echo "
								<tr>
									<td style=\"font-size:20px;\"><span style=\"margin:20px;\">$from</span></td>
									<td><form method=\"get\" action=\"chat.php\">
										<input type='hidden' name='chatWith' value='$from'>
										<input type='submit' class='btn btn-success' value='Chat with Buyer' name='chat'>
										</form></td>
								</tr>
								";
							}
						?>
					</table>
					
				</div>
			</div>
		</div>
	</div>


</body>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/int.js"></script>
<script type="text/javascript" src="chatapis/api.js"></script>
<script type="text/javascript" src="js/restapi.js"></script>
</html>