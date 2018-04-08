<?php
	session_start();
	include_once('../dbconfig.php');
	if(isset($_SESSION['userLogged']))
	{
		$uname=$_SESSION['userLogged'];
		$aid=$_POST['aid'];
		$bidPrice=$_POST['bidPrice'];
		// echo "$aid $bidPrice";

		$topPrice=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `topPrice` FROM `auctions` WHERE `aid`='$aid'"));
		$topPrice=$topPrice['topPrice'];
		if($bidPrice<=$topPrice)
			echo "error";
		else
		{
			mysqli_query($dbase,"UPDATE `auctions` SET `topPrice`='$bidPrice', `topBidder`='$uname' WHERE `aid`='$aid' ");
			echo json_encode(array($uname,$bidPrice));
		}
	}
?>