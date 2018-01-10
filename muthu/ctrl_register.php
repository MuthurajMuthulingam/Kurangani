<?php
require_once 'model/activity.php';
$activity=new Activity();
$name='';
$email='';
$phone='';
$password='';
$gender='';
$address='';
$city='';
$state='';
$country='';
$username='';

if(isset($_REQUEST['username'])){
    $username=$_REQUEST['username'];
}
if(isset($_REQUEST['name'])){
    $name=$_REQUEST['name'];
}
if(isset($_REQUEST['email'])){
    $email=$_REQUEST['email'];
}
if(isset($_REQUEST['phone'])){
    $phone=$_REQUEST['phone'];
}

if(isset($_REQUEST['usename'])){
    $phone=$_REQUEST['username'];
}
if(isset($_REQUEST['password'])){
    $password=$_REQUEST['password'];
}
if(isset($_REQUEST['gender'])){
    $gender=$_REQUEST['gender'];
}
if(isset($_REQUEST['add'])){
    $address=$_REQUEST['add'];
}
if(isset($_REQUEST['city'])){
    $city=$_REQUEST['city'];
}
if(isset($_REQUEST['state'])){
    $state=$_REQUEST['state'];
}
if(isset($_REQUEST['country'])){
    $country=$_REQUEST['country'];
}

$response=$activity->register($name,$email,$phone,$username,$gender,$password,$address,$city,$state,$country);
//echo json_encode($response);
if($response['status']=='success'){
//    if(!isset($_SESSION)){
//        session_start(); 
//    }
    $_SESSION['info']=$response['message'];
    header("Location: index.php");
}else{
//    if(!isset($_SESSION)){
//        session_start(); 
//    }
    $_SESSION['error']=$response['message'];
    header("Location: register.php");
}
?>
