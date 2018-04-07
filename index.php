<?php
session_start();
include_once('dbconfig.php');
if (isset($_POST['logoutBtn'])) {
	setcookie('userLogged','',time()-60);
	header('Location:index.php');
}
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
		<div class="rowp" id="homeImgs">
			<div class="wraper">
				<h1 id="title">TradIn</h1>
			</div>
			<div class="cont">
				<div class="col-12">
					<div id="slider">
						<ul id="slideul">
							<li class="slideli"><img src="images/buySell.jpg" alt="buy sell tradin" class="pics"></li>
							<li class="slideli"><img src="images/book.jpg" alt="book" class="pics"></li>
							<li class="slideli"><img src="images/drawing.jpg" alt="drawing instruments" class="pics"></li>
							<li class="slideli"><img src="images/music.jpg" alt="music instruments" class="pics"></li>
							<li class="slideli"><img src="images/elec.jpg" alt="electronic instruments" class="pics"></li>
							<li class="slideli"><img src="images/cycle.jpg" alt="cycle" class="pics"></li>
							<li class="slideli"><img src="images/labeq.jpg" alt="lab equipments" class="pics"></li>
							<li class="slideli"><img src="images/buySell.jpg" alt="buy sell tradin" class="pics"></li>
						</ul>
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