<?php
	session_start();
	include_once('../dbconfig.php');
	if (isset($_SESSION['userLogged'])) {
		$item=$_POST['item'];
		$likedBy=$_SESSION['userLogged'];
		$isthere=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `iid` FROM `interested` WHERE `id`='$item' AND `likedBy`='$likedBy'"));
		$isthere=$isthere['iid'];
		if(empty($isthere))
		{
			mysqli_query($dbase,"INSERT INTO `interested` (`likedBy`,`id`) VALUES ('$likedBy','$item')");
			$send="Not Interested";

			$totalCount=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT COUNT(`iid`) FROM `interested` WHERE `id`='$item'"));
			$totalCount=$totalCount['COUNT(`iid`)'];
			if($totalCount>=2){

				$userNotified=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `aid` FROM `auctions` WHERE `id`='$item'"));
				if(empty($userNotified))
				{
					$data=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `iname`,`uname`,`price` FROM `sell` WHERE `id`='$item'"));
					$user=$data['uname'];
					$price=$data['price'];
					$iname=$data['iname'];
					$notification="Your item $iname is now eligible for auction.Click to avail it.";
					mysqli_query($dbase,"INSERT INTO `notifications` (`notify`,`notifier`,`notification`,`category`,`aid`) VALUES ('$user','','$notification','auctionAvail','$item')");

					mysqli_query($dbase,"INSERT INTO `auctions` (`id`,`uname`,`basePrice`,`topPrice`) VALUES ('$item','$user','$price','$price')");
				}
			}
		}
		else
		{
			// $isthere=$isthere['iid'];
			mysqli_query($dbase,"DELETE FROM `interested` WHERE `iid`='$isthere'");
			$send="Interested";
		}
	}
	echo $send;

	
?>