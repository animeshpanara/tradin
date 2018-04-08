<?php 
session_start();
if(isset($_SESSION['notVerified']))
{
	header('Location:verifyMail.php');
}
if (!isset($_SESSION['userLogged'])) {
	header('Location:login.php');
}
$userName=$_SESSION['userLogged'];
include_once('dbconfig.php');
include_once('chatConfig.php'); 
$auctions=mysqli_query($dbase,"SELECT * FROM `auctions`");


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
	<!-- <style>
		body {font-family: Arial, Helvetica, sans-serif;}


		/* The Modal (background) */
		.modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    padding-top: 100px; /* Location of the box */
		    left: 0;
		    top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}

		/* Modal Content (image) */
		.modal-content {
		    margin: auto;
		    display: block;
		    width: 80%;
		    max-width: 700px;
		}

		/* Caption of Modal Image */
		#caption {
		    margin: auto;
		    display: block;
		    width: 80%;
		    max-width: 700px;
		    text-align: center;
		    color: #ccc;
		    padding: 10px 0;
		    height: 150px;
		}

		/* Add Animation */
		.modal-content, #caption {    
		    -webkit-animation-name: zoom;
		    -webkit-animation-duration: 0.6s;
		    animation-name: zoom;
		    animation-duration: 0.6s;
		}

		@-webkit-keyframes zoom {
		    from {-webkit-transform:scale(0)} 
		    to {-webkit-transform:scale(1)}
		}

		@keyframes zoom {
		    from {transform:scale(0)} 
		    to {transform:scale(1)}
		}

		/* The Close Button */
		.close {
		    position: absolute;
		    top: 15px;
		    right: 35px;
		    color: #f1f1f1;
		    font-size: 40px;
		    font-weight: bold;
		    transition: 0.3s;
		}

		.close:hover,
		.close:focus {
		    color: #bbb;
		    text-decoration: none;
		    cursor: pointer;
		}

		/* 100% Image Width on Smaller Screens */
		@media only screen and (max-width: 700px){
		    .modal-content {
		        width: 100%;
		    }
		}
		</style> -->
</head>
<body>
	<div class="containerp">
		
			<?php include_once('header.php'); ?>
			<?php
				foreach($auctions as $data){
					$aid=$data['aid'];
					$id=$data['id'];
					$topPrice=$data['topPrice'];
					$topBidder=$data['topBidder'];
					$basePrice=$data['basePrice'];
					$total=$data['total'];
					if($topPrice=="0")
					{
						$topPrice=$basePrice;
					}
					if(empty($topBidder))
					{
						$topBidder=" - ";
					}
					$time=$data['startTime'];
					$startsAt="";

					$startTime=floor($time/1000)+3.5*60*60;
					$currentTime=time()+3.5*60*60;
					$endTime=$startTime+$total;
					echo "<script>console.log($startTime)</script>";
					echo "<script>console.log($currentTime)</script>";
					echo "<script>console.log($endTime)</script>";
					$options="";

					$each=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT * FROM `sell` WHERE `id`='$id'"));
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

					if($startTime>$currentTime)
					{
						$startsAt="<span style='color:blue;'>Auction starts at : ".date("h:i:sa d-m-Y",floor($time/1000)+3.5*60*60)."</span>";


					}
					else if($endTime<$currentTime)
					{
						$startsAt="<span style='color:red;'>Auction Ended!</span>";
					}
					else
					{
						$startsAt="<span style='color:green;'>Active...</span>"."<span style='color:blue;'> Auction Ends at : ".date("h:i:sa d-m-Y",$endTime)."</span>";
						if($userName!=$uname)
							$options="<tr>
										<td>
											<input type='text' class='bidInput' id='bidInput$aid' placeholder='Enter Bid Price'>
										</td>
										<td>
											<button class='btn btn-primary' onclick=\"haveBid($aid)\">Bid</button>
										</td>
										<tr>
										<td colspan='2'><span id='bidError$aid' style='color:red;'></span></td>
										</tr>
									</tr>";

					}
					
				
			    echo "
			    	<div id=\"addBox\" style=\"padding-bottom: 20px;\">
								<table id=\"sellTable\" style=\"width: 90%; margin-top: 10px;\">
									<tr><td colspan='2'>$startsAt</td></tr>
									<tr>
										<td rowspan=\"3\"><img onclick=\"myMode(this.src)\" src=\"sellpics/$img1\" style=\"width: 150px;height: 150px;cursor: pointer;\"></td>
										<td><label for=\"iname\" class=\"slabels\">Item Name : </label><span class=\"starImp\"><span style=\"font-size: 20px;margin-left: 15px; color: blue\">$iname</span></td>
									</tr>
									<tr>
										<td><label for=\"iname\" class=\"slabels\">Description : </label><span style=\"font-size: 20px;margin-left: 15px;\"><pre>$desc</pre></span></td>
									</tr>
									<tr>
										
										<td><label for=\"iname\" class=\"slabels\">Base Price : </label><span style=\"font-size: 20px;margin-left: 15px; color: red;\">$price</span></td>
									</tr>
									<tr>
										<td><img onclick=\"myMode(this.src)\" src=\"sellpics/$img2\" style=\"width: 40px;height: 40px;margin-left: 5px;margin-right: 5px;cursor: pointer;\"><img onclick=\"myMode(this.src)\" src=\"sellpics/$img3\" style=\"width: 40px;height: 40px;margin-left: 5px;margin-right: 5px;cursor: pointer;\"><img onclick=\"myMode(this.src)\" src=\"sellpics/$img4\" style=\"width: 40px;height: 40px;margin-left: 5px;margin-right: 5px;cursor: pointer;\"></td>
										<td><label for=\"iname\" class=\"slabels\">Seller Name : </label><span style=\"font-size: 20px;margin-left: 15px;\">$fname $lname </span></td>
									</tr>
									<tr>
										
										<td><label for=\"iname\" class=\"slabels\">Top Price Bidded : </label><span id='topPrice$aid' style=\"font-size: 20px;margin-left: 15px; color: red;\">$topPrice</span></td>
										<td>
											<label for=\"iname\" class=\"slabels\">Top Bidder : </label><span  id='topBidder$aid' style=\"font-size: 20px;margin-left: 15px; color: red;\">$topBidder</span>
										</td>
									</tr>$options
									
				</table>
				
				</div></div></div>
				<div id=\"myModal\" class=\"modal\">
  <span class=\"close\">&times;</span>
  <img class=\"modal-content\" id=\"img01\">
  <div id=\"caption\"></div>
</div> ";

			}

			?>
				
		</div>
</body>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/int.js"></script>
<script type="text/javascript" src="chatapis/api.js"></script>
<script type="text/javascript" src="js/restapi.js"></script>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption

function myMode(srcc){
	// alert(srcc);
	if(srcc!='http://localhost/tradin/sellpics/noImg.jpg'){
	var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    modal.style.display = "block";
    modalImg.src = srcc;
}
else{
	modal.style.display = "none";
}
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
</html>

<!-- sendMsg('$userName','$uname','Hey! I am interested in purchasing this item. Please share me your details'); -->