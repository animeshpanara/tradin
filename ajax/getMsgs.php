<?php
    session_start();
    include_once('../dbconfig.php');
    $json_data=json_decode(file_get_contents('php://input'), true);
    //$json_data = json_dencode($data);
    $from=$json_data['from'];
    $to=$json_data['to'];
    $startfrom=$json_data['id'];
    $noofmsgs=$json_data['noofmsg'];
    if($startfrom==-1)
    {
     $data=mysqli_query($dbase,"SELECT * FROM `chats` WHERE (`msgfrom`='$from' AND `msgto`='$to') OR (`msgfrom`='$to' AND `msgto`='$from') ORDER BY `time` DESC LIMIT $noofmsgs");
    }
    else
    {
      $data=mysqli_query($dbase,"SELECT * FROM `chats` WHERE ((`msgfrom`='$from' AND `msgto`='$to') OR (`msgfrom`='$to' AND `msgto`='$from')) AND `id`<=$startfrom ORDER BY `time` DESC LIMIT $noofmsgs");
    }
    $rows=array();
    while($r=mysqli_fetch_assoc($data)){
        $rows[]=$r;
        $idid=$r['id'];
        mysqli_query($dbase,"UPDATE `chats` SET `msgread`=1 WHERE `id`=$idid AND `msgfrom`='$from' AND `msgto`='$to'");
    }
    echo json_encode($rows);
?>