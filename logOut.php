<?php
	session_start();
	$uname=$_SESSION["userLogged"];
	include_once('dbconfig.php');
	session_unset();
	session_destroy();
	$time=time()+3.5*60*60;
	mysqli_query($dbase,"UPDATE `users` SET `status`='$time' WHERE `uname`='$uname' ");
	header("location:index.php");
?>