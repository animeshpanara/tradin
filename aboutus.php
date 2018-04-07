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
		<?php include_once('header.php'); ?>
		<div class="rowp"> 
			<div class="icont">
				<div id="aboutBox">
					<div id="aboutWordsDiv">
						<div class="activeUpper"><span class="aboutWords">About Us</span></div>
						<div class="inactiveUpper"><span class="aboutWords">FAQs</span></div>
					</div>
					<div class="col-12">
						<div class="faq"><p>Who can use TradIN?</p><span class="plusminus" onclick="showans(0)"><i class="fa fa-plus"></i></span></div>
						<div class="faqah"><p>Any student of SVNIT can use TradIN for buying and selling things.</p></div>
						<div class="faq"><p>Will TradIn share your personal details with your buyer?</p><span class="plusminus" onclick="showans(1)"><i class="fa fa-plus"></i></span></div>
						<div class="faqah"><p>No,TradIN won't share your personal details apart from your name,unless you explicitly tell TradIn to do so.</p></div>
						<div class="faq"><p>Does TradIN share its users' details with any third party?</p><span class="plusminus" onclick="showans(2)"><i class="fa fa-plus"></i></span></div>
						<div class="faqah"><p>No,TradIn doesn't share its users' details with any third party.</p></div>
						<div class="faq"><p>How much do you need to pay to post an ad on TradIN?</p><span class="plusminus" onclick="showans(3)"><i class="fa fa-plus"></i></span></div>
						<div class="faqah"><p>TradIN is free and will always be.</p></div>
						<div class="faq"><p>Does TradIN spam its user?</p><span class="plusminus" onclick="showans(4)"><i class="fa fa-plus"></i></span></div>
						<div class="faqah"><p>No,TradIn does't spam its users.</p></div>
						<div class="faq"><p>Does TradIN post its users' ads on any other website?</p><span class="plusminus" onclick="showans(5)"><i class="fa fa-plus"></i></span></div>
						<div class="faqah"><p>No,TradIN doesn't post its users ads on any other website.</p></div>
						<div class="faq"><p>Where should you contact for furthur questions?</p><span class="plusminus" onclick="showans(6)"><i class="fa fa-plus"></i></span></div>
						<div class="faqah"><p>Email us at <a href="https://accounts.google.com/" target="_blank" style="text-decoration: underline;">tradininc@gmail.com</a>.</p></div>
					</div>
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