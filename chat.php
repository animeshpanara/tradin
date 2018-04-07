<?php 
session_start();
if(isset($_SESSION['notVerified']))
{
	header('Location:verifyMail.php');
}
if (!isset($_SESSION['userLogged'])) {
	header('Location:login.php');
}
if(!isset($_POST['chat']))
{
	header('Location:index.php');
}
include_once('dbconfig.php');
$uname=$_SESSION["userLogged"];
$_SESSION['chatWith']=$_POST['chatWith'];
$chatWith=$_SESSION['chatWith'];
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
<body onload="loadChats('<?php echo $chatWith; ?>','<?php echo $uname; ?>')">
	<div class="containerp">
		<?php include_once('header.php'); ?>
		<div class="rowp">
			<div class="icont">
				<div id="sellBox">
					<div id="sellWordDiv"><span id="sellWord">Chat</span></div>
					<table id="sellTable" class="chatTable" style="width: 90%;">
						
					</table>
					<table id="sellTable" style="width: 90%;">
						<tr>
							<td>
								<textarea id="chatTextArea" onkeyup="handleHeight(this,30)"></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<button onclick="sendMsg('<?php echo $uname ?>','<?php echo $chatWith ?>')" class="btn btn-success" style="margin-bottom: 20px;">Send</button>
							</td>
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
<script type="text/javascript" src="chatapis/api.js"></script>
</html>