<?php
    session_start();
    include_once('../dbconfig.php');
    $json_data=json_decode(file_get_contents('php://input'), true);
    //$json_data = json_dencode($data);
    $id=$json_data['id'];
    $from=$json_data['from'];
    $to=$json_data['to'];
    $time=$json_data['time'];
    $msg=$json_data['msg'];
    //$read=$json_data['read'];
    mysqli_query($dbase,"INSERT INTO `chats` VALUES ('$id','$from','$to','$time','$msg','0')");
    echo json_encode($json_data);
?>