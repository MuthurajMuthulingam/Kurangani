<?php
require_once 'model/activity.php';
$activity=new Activity();
$name='';
$email='';
$phone='';
$info='';
if(isset($_REQUEST['name'])){
    $name=$_REQUEST['name'];
}
if(isset($_REQUEST['email'])){
    $email=$_REQUEST['email'];
}
if(isset($_REQUEST['phone'])){
    $phone=$_REQUEST['phone'];
}
if(isset($_REQUEST['info'])){
    $info=$_REQUEST['info'];
}

$response=$activity->contact($name, $email, $phone, $info);
//echo json_encode($response);
if($response['status']=='success'){
    $_SESSION['info']=$response['message'];
    header("Location: index.php");
}else{
    $_SESSION['error']=$response['message'];
    header("Location : contact.php");
}
?>
