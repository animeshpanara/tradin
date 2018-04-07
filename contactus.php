<?php
session_start();
include_once('dbconfig.php');
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
		<?php  include_once('header.php'); ?>
		<div class="rowp"> 
			<div class="icont">
				<div id="conBox">
					<div id="conWordDiv"><span id="conWord">Mail Us</span></div>
					<div class="col-12">
						<form name="contact">
							<table id="contactTable">
								<tr>
									<td class="contactTd"><label class="contactlbl">Email-Id:</label></td>
									<td><input type="text" name="emailContact" class="contactips" placeholder="Your Email-Id"></td>
								</tr>
								<tr>
									<td class="contactTd"><label class="contactlbl">Subject:</label></td>
									<td><input type="text" name="subject" class="contactips" placeholder="Subject of Message"></td>
								</tr>
								<tr>
									<td class="contactTd"><label class="contactlbl">Message:</label></td>
									<td><textarea name="msg" class="tacontact" rows="10"></textarea></td>
								</tr>
								<tr>
									<td class="contactTd"></td>
									<td><input type="submit" name="msgsub" class="btn btn-success"></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="rowp"> 
			<div class="icont">
				<div id="conBox2">
					<div id="conWordDiv"><span id="conWord">Contact Developers</span></div>
					<div class="cont">
						<div class="col-6 col-sl-12 devCol">
							<div class="imgwraper vdmwrap">
								<span class="devslinks"><i class="fa fa-google-plus"></i></span><span class="devslinks"><i class="fa fa-facebook"></i></span>
							</div>
							<img src="images/vdm.png" class="developers vdmImg">
							<div class="devInfo">
								<h1 id="vdm">Vatsal Mehta</h1>
								<p class="devP">Mobile : <a href="tel:+919726843869" class="mobmail">+91 9726843869</a></p>
								<p class="devP">Email-Id : <a class="mobmail" href="https://www.google.com/gmail" target="_blank">
									mehtavatsald02@mail.com</a></p>
							</div>
						</div>
						<div class="col-6 col-sl-12 devCol">
							<div class="imgwraper akswrap">
								<span class="devslinks1"><i class="fa fa-google-plus"></i></span><span class="devslinks1"><i class="fa fa-facebook"></i></span>
							</div>
							<img src="images/aks.jpg" class="developers aksImg">
							<div class="devInfo">
								<h1 id="aks">Aksh Patel</h1>
								<p class="devP">Mobile : <a href="tel:+919408669033" class="mobmail">+91 9408669033</a></p>
								<p class="devP">Email-Id : <a class="mobmail" href="https://www.google.com/gmail" target="_blank">akshkpatel@gmail.com</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/int.js"></script>
</html>