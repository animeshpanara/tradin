<?php
	session_start();
    include_once('../dbconfig.php');
    if (isset($_SESSION["userLogged"])) {
    	$uname=$_SESSION['userLogged'];
    	$newNotis=mysqli_query($dbase,"SELECT * FROM `notifications` WHERE `notify`='$uname' AND `readBy`='0'");
    	$rows=array();
    	$obj=array();
    	while($nots=mysqli_fetch_assoc($newNotis))
    	{
    		$notifier=$nots['notifier'];
    		$propic=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `propic` FROM `users` WHERE `uname`='$notifier'"));
    		$propic=$propic['propic'];
    		$obj['propic']=$propic;
    		$obj['notification']=$nots['notification'];

    		if($nots['category']=="chat")
				$obj['locationTo']="location.href='chat.php?chatWith=$notifier&chat=Chat+with+Buyer'";
    		$obj['count']=$nots['count'];
    		$obj['notifier']=$notifier;
    		$rows[count($rows)]=$obj;
    	}
    }
    echo json_encode($rows);
?>