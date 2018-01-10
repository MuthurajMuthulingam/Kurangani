<?php
require_once 'model/activity.php';
$activity=new Activity();
$response=$activity->loggout();
//echo $response;

//header("Location : index.php");
if($response=='success'){
  $_SESSION['info']="You have successfully logged out";
  
    //echo $_SESSION['info']." seesion in success";
   header("Location: index.php");
//header("Location : index.php");
}else{
   header("Location: login.php");
}
//session_destroy();

?>
