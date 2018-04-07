<?php
    session_start();
    include_once('../dbconfig.php');
    $json_data=json_decode(file_get_contents('php://input'), true);
    //$json_data = json_dencode($data);
    // $id=$json_data['id'];
    $from=$json_data['from'];
    $to=$json_data['to'];
    $time=$json_data['time'];
    $msg=htmlentities(addslashes($json_data['msg']));
    //$read=$json_data['read'];
    mysqli_query($dbase,"INSERT INTO `chats` (`msgfrom`,`msgto`,`time`,`msg`,`msgread`) VALUES ('$from','$to','$time','$msg','0')");

    $userOnline=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `status` FROM `users` WHERE `uname`='$to'"));
    $userOnline=$userOnline['status'];
    if($userOnline!="1")
    {
        $isThereNots=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `notid`,`count` FROM `notifications` WHERE `notify`='$to' AND `notifier`='$from' AND `category`='chat' "));
        if(!empty($isThereNots))
        {
            // $isThereNots=mysqli_fetch_assoc($isThereNots);
            $count=$isThereNots['count'];
            $count++;
            $id=$isThereNots['notid'];
            mysqli_query($dbase,"UPDATE `notifications` SET `count`='$count', `notification`='$msg' WHERE `notid`='$id' ");
        }
        else
        {
            echo "sdfksdffsfsdf";
            mysqli_query($dbase,"INSERT INTO `notifications` (`notify`,`notifier`,`notification`,`category`) VALUES ('$to','$from','$msg','chat') ");
        }

    }

    echo $userOnline;
?>
