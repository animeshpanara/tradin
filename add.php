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
if (!isset($_GET['val'])) {
	header("Location:buy.php");
}
$itype=$_REQUEST['val'];
$info=mysqli_query($dbase,"SELECT * FROM sell WHERE `itype`='$itype'");

include_once('header.php');
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
		<div class="rowp">
			<div class="icont">
			<?php include_once('header.php'); ?>
			<?php
				foreach($info as $each){
				$iname=$each['iname'];
				$desc=$each['description'];
				$price=$each['price'];
				$uname=$each['uname'];
			    echo "
			    	<div id=\"addBox\" style=\"padding-bottom: 20px;\">
								<table id=\"sellTable\" style=\"width: 90%\">
									<tr>
										<td rowspan=\"3\"><img src=\"propics/client.png\" style=\"width: 150px;height: 150px;cursor: pointer;\"></td>
										<td><label for=\"iname\" class=\"slabels\">Item Name : </label><span class=\"starImp\"><span style=\"font-size: 20px;margin-left: 15px; color: blue\">Hello</span></td>
									</tr>
									<tr>
										<td><label for=\"iname\" class=\"slabels\">Description : </label><span style=\"font-size: 20px;margin-left: 15px;\">Hello</span></td>
									</tr>
									<tr>
										
										<td><label for=\"iname\" class=\"slabels\">Price : </label><span style=\"font-size: 20px;margin-left: 15px; color: red;\">Hello</span></td>
									</tr>
									<tr>
										<td rowspan=\"1\"><img src=\"propics/client.png\" style=\"width: 40px;height: 40px;margin-left: 5px;margin-right: 5px;cursor: pointer;\"><img src=\"propics/client.png\" style=\"width: 40px;height: 40px;margin-left: 5px;margin-right: 5px;cursor: pointer;\"><img src=\"propics/client.png\" style=\"width: 40px;height: 40px;margin-left: 5px;margin-right: 5px;cursor: pointer;\"></td>
										<td><label for=\"iname\" class=\"slabels\">Seller Name : </label><span style=\"font-size: 20px;margin-left: 15px;\">Hello</span></td>
									</tr>
									<tr><td><form method=\"post\" action=\"chat.php\">
										<input type='hidden' name='chatWith' value='$uname'>
										<input type='submit' class='btn btn-success' value='Chat with Seller' name='chat'>
										</form></td>
									</tr>
				</table>
				
				</div>";

			}

			?>
				</div>		
			</div>
		</div>
</body>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/int.js"></script>
<script type="text/javascript" src="chatapis/api.js"></script>
</html>