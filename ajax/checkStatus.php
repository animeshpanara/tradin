<?php
    session_start();
    include_once('../dbconfig.php');
    $json_data=json_decode(file_get_contents('php://input'), true);
    //$json_data = json_dencode($data);
    $user=$json_data['user'];
    //$startfrom=$json_data['id'];
    //$noofmsgs=$json_data['noofmsg'];
    $data=mysqli_query($dbase,"SELECT * FROM `users` WHERE `uname`='$user'");
    $status=0;    
    $rows=array();
    while($r=mysqli_fetch_assoc($data)){
        $status=$r['status'];
    }
    echo $status;
?>