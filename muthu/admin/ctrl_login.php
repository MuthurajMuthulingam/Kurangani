<?php
require_once './model/activity.php';
$activity=new Activity();
//session_start();
$password='';

$username='';
$admin='';
if(isset($_REQUEST['admin'])){
    $admin="admin";
}else{
    header("Location: ./index.php");
}

if(isset($_REQUEST['username'])){
    $username=$_REQUEST['username'];
}

if(isset($_REQUEST['password'])){
    $password=$_REQUEST['password'];
}


$response=$activity->admin_login($username,$password);
//echo json_encode($response);
if($response['status']=='success'){
    $_SESSION['info']=$response['message'];
    //echo $_SESSION['info']." seesion in success";
   header("Location: index.php");
}else{
   //echo json_encode($response);
    $_SESSION['error']=$response['message'];
    //echo $_SESSION['error']." seesion in failure";
    header("Location: login.php");
}
?>
