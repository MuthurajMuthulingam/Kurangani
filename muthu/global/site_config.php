<?php


//$dbserver='';
//$dbpassword='';
//$dbuser='';
//$dbName='kurangan_Kurangani';
$GLOBALS['register']='';

$mailHost = "ssl://smtp.gmail.com";
$mailPort = 465;
$mailUser = 'nmohankumar.cse@gmail.com';
$mailPassword = '121848184898';
$mailFrom = 'nmohankumar.cse@gmail.com';
$mailFromName = 'Mohankumar';
$mailAddReplyTo = 'nmohankumar.cse@gmail.com';
$mailSMTPAuth = true;
function DBconnection(){
    
}

function login($username,$password){
    if(!DBconnection()){
       $result['status']='failure';
       $result['message']='Database connection problem';
       return $result;
        }
}
?>
