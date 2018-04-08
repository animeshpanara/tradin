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
if (!isset($_GET['val'])) {
	header("Location:buy.php");
}
$userName=$_SESSION["userLogged"];
$itype=$_REQUEST['val'];
$info=mysqli_query($dbase,"SELECT * FROM sell WHERE `itype`='$itype' ORDER BY `id` DESC");


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
		
			<?php include_once('header.php'); ?>
			<?php
				foreach($info as $each){
				$iname=$each['iname'];
				$desc=$each['description'];
				$price=$each['price'];
				$id=$each['id'];
				// $fname=$each['fname'];
				// $lname=$each['lname'];
				$uname=$each['uname'];
				$names=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `lname`,`fname` FROM `users` WHERE `uname`='$uname'"));
				$lname=$names['lname'];
				$fname=$names['fname'];
				if($each['img1']!="")
					$img1=$each['img1'];
				else
					$img1="noImg.jpg";

				if($each['img2']!="")
					$img2=$each['img2'];
				else
					$img2="noImg.jpg";

				if($each['img3']!="")
					$img3=$each['img3'];
				else
					$img3="noImg.jpg";

				if($each['img4']!="")
					$img4=$each['img4'];
				else
					$img4="noImg.jpg";


				$iid=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `iid` FROM `interested` WHERE `id`='$id' AND `likedBy`='$userName' "));
				if(empty($iid))
					$intText="Interested";
				else
					$intText="Not Interested";

				if($userName!=$uname)
					$showBtn="
				<tr>
					<td>
						<form method=\"GET\" action=\"chat.php\">
							<input type='hidden' name='chatWith' value='$uname'>
							<input style=\"margin-top:20px;\" type='submit' class='btn btn-success' value='Chat with Seller' name='chat'>
						</form>
					</td>
					<td>
						<button class=\"btn btn-primary\" onclick=\"addForInt($id,this)\">$intText</button>
					</td>
				</tr>";
				
				else 
					$showBtn="";
			    echo "
			    	<div id=\"addBox\" style=\"padding-bottom: 20px;\">
								<table id=\"sellTable\" style=\"width: 90%; margin-top: 10px;\">
									<tr>
										<td rowspan=\"3\"><img src=\"sellpics/$img1\" style=\"width: 150px;height: 150px;cursor: pointer;\"></td>
										<td><label for=\"iname\" class=\"slabels\">Item Name : </label><span class=\"starImp\"><span style=\"font-size: 20px;margin-left: 15px; color: blue\">$iname</span></td>
									</tr>
									<tr>
										<td><label for=\"iname\" class=\"slabels\">Description : </label><span style=\"font-size: 20px;margin-left: 15px;\"><pre>$desc</pre></span></td>
									</tr>
									<tr>
										
										<td><label for=\"iname\" class=\"slabels\">Price : </label><span style=\"font-size: 20px;margin-left: 15px; color: red;\">$price</span></td>
									</tr>
									<tr>
										<td><img src=\"sellpics/$img2\" style=\"width: 40px;height: 40px;margin-left: 5px;margin-right: 5px;cursor: pointer;\"><img src=\"sellpics/$img3\" style=\"width: 40px;height: 40px;margin-left: 5px;margin-right: 5px;cursor: pointer;\"><img src=\"sellpics/$img4\" style=\"width: 40px;height: 40px;margin-left: 5px;margin-right: 5px;cursor: pointer;\"></td>
										<td><label for=\"iname\" class=\"slabels\">Seller Name : </label><span style=\"font-size: 20px;margin-left: 15px;\">$fname $lname </span></td>
									</tr>$showBtn
									
									
				</table>
				
				</div></div></div>";

			}

			?>
				
		</div>
</body>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/int.js"></script>
<script type="text/javascript" src="chatapis/api.js"></script>
<script type="text/javascript" src="js/restapi.js"></script>
</html>

<!-- sendMsg('$userName','$uname','Hey! I am interested in purchasing this item. Please share me your details'); -->