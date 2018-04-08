<?php
	if(isset($_SESSION['userLogged']))
	{

		$uname=$_SESSION['userLogged'];
		$name=basename($_SERVER['PHP_SELF']);
		// echo "<script>alert('$name')</script>";
		if($name=="chat.php")
		{

			mysqli_query($dbase,"UPDATE `users` SET `chatActive`='1' WHERE `uname`='$uname'");
		}
		else
		{
			mysqli_query($dbase,"UPDATE `users` SET `chatActive`='0' WHERE `uname`='$uname'");
		}
	}
	else
	{
		mysqli_query($dbase,"UPDATE `users` SET `chatActive`='0' WHERE 1");
	}
?>