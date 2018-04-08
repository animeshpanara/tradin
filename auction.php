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
if(!isset($_GET['for']) || !isset($_GET['item']))
{
	header('Location:index.php');
}
else
{
	$for=$_GET['for'];
	$item=$_GET['item'];
	$iname=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `iname` FROM `sell` WHERE `id`='$item'"));
	$iname=$iname['iname'];
	$isthere = mysqli_fetch_assoc(mysqli_query($dbase,"SELECT * FROM `auctions` WHERE `uname`='$for' AND `id`='$item'"));
	if(empty($isthere))
	{
		header("Location:index.php");
	}
	else if(isset($_POST['availAuction']))
	{
		$time=$_POST['time'];
		$total=$_POST['total'];
		mysqli_query($dbase,"UPDATE `auctions` SET `startTime`='$time', `total`='$total' WHERE `uname`='$for' AND `id`= '$item' ");

		$interested=mysqli_query($dbase,"SELECT `likedBy` FROM `interested` WHERE `id`='$item'");
		while($nots=mysqli_fetch_assoc($interested))
		{
			$notify=$nots['likedBy'];
			$notifier=$for;
			$notification="An Auction for item $iname you are interested in buying is held on ".date("h:i:sa d-m-Y",floor($time/1000)+3.5*60*60)." Click here to visit.";
			$category="auction";
			mysqli_query($dbase,"INSERT INTO `notifications` (`notify`,`notifier`,`notification`,`category`) VALUES ('$notify','$notifier','$notification','$category') ");
		}
		// header('Location:activeAuctions.php');
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
				<div id="signupBox">
					<div id="signupWordDiv"><span id="signupWord">Auction</span></div>
					<form name="signup" id="signup" action="" method="post" onsubmit="return formTime();">
						<table id="signupTable">
							<tr>
								<td class="signTd"><label for="fname" class="slabels">Enter Start Date of Your Auction<span class="starImp">*</span> :</label></td>
								<td><span class="starImpm">*</span><input type="text" name="date" class="signupips" placeholder="Start Date in dd/mm/yyyy format" value="" style="width: 310px;font-size: 17px;"></td>
							</tr>
							<tr>
								<td class="signTd"><label for="fname" class="slabels">Enter Start Time of Your Auction<span class="starImp">*</span> :</label></td>
								<td><span class="starImpm">*</span><input type="text" name="time1" class="signupips" style="width: 310px;font-size: 17px;" placeholder="Start Time in hh:mm:ss format" value=""></td>
							</tr>
							<tr>
								<td class="signTd"><label for="fname" class="slabels">Enter Toatl Time for Auction<span class="starImp">*</span> :</label></td>
								<td><span class="starImpm">*</span><input type="text" name="total1" class="signupips" style="width: 310px;font-size: 17px;" placeholder="Total time in hh:mm:ss" value="">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="hidden" name="time" id="auctionTime">
									<input type="hidden" name="total" id="auctionTotalTime">
									<input type="submit" name="availAuction" class="btn btn-primary" value="AVAIL" id="signupBtn">
								</td>
							</tr>
						</table>
					</form>
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
<script type="text/javascript">
function formTime() {
	var date=document.getElementsByName('date')[0].value;
	var day=date.split('/')[0];
	var month=date.split('/')[1]-1;
	var year=date.split('/')[2];

	var time=document.getElementsByName('time1')[0].value;
	var hour=time.split(':')[0];
	var min=time.split(':')[1];
	var sec=time.split(':')[2];

	var time=new Date(year,month,day,hour,min,sec);
	time=time.getTime();

	if(time<=0)
		return false;
	else
	{
		document.getElementById('auctionTime').value=time;
	}

	var total=document.getElementsByName('total1')[0].value;
	hour=total.split(':')[0];
	console.log(hour);
	min=total.split(':')[1];
	console.log(min);
	sec=total.split(':')[2];
	console.log(sec);
	total= parseInt(hour)*60*60 + parseInt(min)*60 + parseInt(sec);
	if(!isNaN(total)){
		document.getElementById('auctionTotalTime').value=total;		
	}
	else
		return false;
}
</script>
</html>