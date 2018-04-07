<?php
session_start();
if (isset($_SESSION['userLogged'])) {
	include_once('../dbconfig.php');
	// $proic=
	$uname=$_SESSION['userLogged'];
	mysqli_query($dbase,"UPDATE `users` SET `propic`='client.png' WHERE `uname`='$uname' ");
}
?>