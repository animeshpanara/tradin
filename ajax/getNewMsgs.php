<?php
    session_start();
    include_once('../dbconfig.php');
    $json_data=json_decode(file_get_contents('php://input'), true);
    //$json_data = json_dencode($data);
    $from=$json_data['from'];
    $to=$json_data['to'];
    //$startfrom=$json_data['id'];
    //$noofmsgs=$json_data['noofmsg'];
    $data=mysqli_query($dbase,"SELECT * FROM `chats` WHERE `msgfrom`='$from' AND `msgto`='$to' AND `msgread`=0 ORDER BY `time` DESC");

    $rows=array();
    while($r=mysqli_fetch_assoc($data)){
        $rows[]=$r;
        $idid=$r['id'];
        mysqli_query($dbase,"UPDATE `chats` SET `msgread`=1 WHERE `id`=$idid AND `msgfrom`='$from' AND `msgto`='$to'");
    }
    $data=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `status` FROM `users` WHERE `uname`='$from'"));
    $data=$data["status"];

    $data2=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `chatActive` FROM `users` WHERE `uname`='$from'"));
    $data2=$data2["chatActive"];
    echo json_encode(array($rows,$data,$data2));

?>