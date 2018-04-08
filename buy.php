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
include_once('chatConfig.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>TradIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/mobtab.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
	<div class="containerp">
		<?php include_once('header.php'); ?>
		<div class="rowp" id="buyRowMob">
			<div class="icont">
				<div class="col-3 col-sl-12 imgBoxc">
					<a href="add.php?val=Book"><img src="images/study-material.jpg" class="buyimg3"><br><span class="buyNames">BOOKS</span></a>
				</div>
				<div class="col-3 col-sl-12 imgBoxc">
					<a href="add.php?val=Drawing Instrument"><img src="images/drawins.png" class="buyimg3"><br><span class="buyNames">DRAWING INSTRUMENTS</span></a>
				</div>
				<div class="col-3 col-sl-12 imgBoxc">
					<a href="add.php?val=Musical Instrument"><img src="images/musicop.gif" class="buyimg3"><br><span class="buyNames">MUSICAL INSTRUMENTS</span></a>
				</div>
				<div class="col-3 col-sl-12 imgBoxc">
					<a href="add.php?val=Electronic Gadget"><img src="images/egads.jpg" class="buyimg3"><br><span class="buyNames">ELECTRONIC GADGETS</span></a>
				</div>
			</div>
		</div>
		<div class="rowp">
			<div class="icont"> 
				<div class="col-4 col-sl-12" id="imgBoxl">
					<a href="add.php?val=Cycle"><img src="images/cycleop.jpg" class="buyimg4"><br><span class="buyNames" id="leftName">CYCLES</span></a>
				</div>
				<div class="col-4 col-sl-12 imgBoxc">
					<a href="add.php?val=Lab Equipment"><img src="images/lab.jpg" class="buyimg4"><br><span class="buyNames">LAB EQUIPMENTS</span></a>
				</div>
				<div class="col-4 col-sl-12" id="imgBoxr">
					<a href="add.php?val=other"><img src="images/other.jpg" class="buyimg4"><br><span class="buyNames" id="rightName">OTHER</span></a>
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