<?php
	session_start();
	include_once('../dbconfig.php');
	$uname=$_SESSION['userLogged'];
	mysqli_query($dbase,"UPDATE `notifications` SET `readBy`='1' WHERE `notify`='$uname'");
?>