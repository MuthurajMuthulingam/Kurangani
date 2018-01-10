<?php

require_once './global/class.phpmailer.php';
require_once './global/class.pop3.php';
require_once './global/class.smtp.php';
require_once './includes/functions.php';

class Activity {

    var $users;
    var $person;
    var $contact;
    var $siteName;
    var $track_user;
    var $aadmin_login;

    function __construct() {
        $this->users = 'users';
        $this->person = 'person_details';
        $this->contact = 'contacted_members';
        $this->track_user='track_user';
        $this->admin_login='admin_login';
        $this->siteName = 'Kurangani';
        //session_start();
    }

    function DBLogin() {

//        $dbserver = 'localhost';
//        $dbuser = 'root';
//        $dbpassword = '';
//        $dbName = 'kurangani';
//        

        $dbserver = 'localhost';
        $dbuser = 'kurangan';
        $dbpassword = '5eQ8yx8R0x';
        $dbName = 'kurangan_kurangani';

        $connection = mysql_connect($dbserver, $dbuser, $dbpassword);
        if (!$connection) {
            //handleError("database login failed");
            error_log("connection");
            return false;
        }
        if (!mysql_select_db($dbName, $connection)) {
            error_log("select db");
            return false;
        }
        return true;
    }

    function login($username, $password) {
        if (!$this->DBLogin()) {
            $response['status'] = 'failure';
            $response['message'] = 'Database Login failure';
            return $response;
        }
        $register_query = sprintf("select user_id,username from %s where username='%s'", $this->users, mysql_real_escape_string($username));
        $reg_result = mysql_query($register_query);
        if (!$reg_result) {
            $response['status'] = 'failure';
            $response['message'] = 'Error with query' . $register_query;
            return $response;
        }
        $num = mysql_num_rows($reg_result);
        if ($num == 0) {
            $response['status'] = 'failure';
            $response['message'] = 'Username doesnt exist, please register';
            return $response;
        }

        $query = sprintf("select user_id,name from %s where username='%s' and password='%s'", $this->users, mysql_real_escape_string($username), mysql_real_escape_string(md5($password)));
        $result = mysql_query($query);
        if (!$result) {
            $response['status'] = 'failure';
            $response['message'] = 'Error with query' . $query;
            return $response;
        }
        $num = mysql_num_rows($result);
        if ($num == 0) {
            $response['status'] = 'failure';
            $response['message'] = 'Username and password doesnt match';
            return $response;
        }
        $verify_query=  sprintf("select user_id,name from %s where username='%s' and password='%s' and approved='yes'",  $this->users,
                          mysql_real_escape_string($username), mysql_real_escape_string(md5($password)));
        $verify_ans=  mysql_query($verify_query);
        $num_in_verify = mysql_num_rows($verify_ans);
        if ($num_in_verify == 0) {
            $response['status'] = 'failure';
            $response['message'] = 'Your account is yet to be approved . Please wait for Confirmation';
            return $response;
        }
        $res = mysql_fetch_assoc($result);
        $name = $res['name'];
        $user_id = $res['user_id'];
        $_SESSION['name'] = $name;
        $_SESSION['user_id'] = $user_id;
        $response['status'] = 'success';
        $response['message'] = 'You are successfully Signed In';
        return $response;
    }
   
    function admin_login($username, $password) {
        if (!$this->DBLogin()) {
            $response['status'] = 'failure';
            $response['message'] = 'Database Login failure';
            return $response;
        }
        
        $query = sprintf("select user_id,username from %s where username='%s' and password='%s'", $this->users, mysql_real_escape_string($username), mysql_real_escape_string(md5($password)));
        $result = mysql_query($query);
        if (!$result) {
            $response['status'] = 'failure';
            $response['message'] = 'Error with query' . $query;
            return $response;
        }
        $num = mysql_num_rows($result);
        if ($num == 0) {
            $response['status'] = 'failure';
            $response['message'] = 'Username and password doesnt match. Contact administrator';
            return $response;
        }
        $verify_query=  sprintf("select user_id,name from %s where username='%s' and password='%s' and approved='yes'",  $this->users,
                          mysql_real_escape_string($username), mysql_real_escape_string(md5($password)));
        $verify_ans=  mysql_query($verify_query);
        $num_in_verify = mysql_num_rows($verify_ans);
        if ($num_in_verify == 0) {
            $response['status'] = 'failure';
            $response['message'] = 'Your account is yet to be approved . Please wait for Confirmation';
            return $response;
        }
        $res = mysql_fetch_assoc($result);
        $name = $res['name'];
        $user_id = $res['user_id'];
        $_SESSION['name'] = $name;
        $_SESSION['user_id'] = $user_id;
        $response['status'] = 'success';
        $response['message'] = 'You are successfully Signed In';
        return $response;
    }
    
    
    function register($name, $email, $phone, $usename, $gender, $password, $street_address, $city, $state, $country) {
        if (!$this->DBLogin()) {
            $response['status'] = 'failure';
            $response['message'] = 'Database Login failure';
            return $response;
        }
        $select_qry = sprintf("select * from %s where username='%s' or email='%s'", $this->users, $usename, $email);
        $select_ans = mysql_query($select_qry);
        $num_rows = mysql_num_rows($select_ans);
        if ($num_rows != 0) {
            $response['status'] = 'failure';
            $response['message'] = 'User already exist';
            return $response;
        }

        $insert_query = sprintf("insert into %s (username,password,name,gender,address,phone_number,email,city,state,country,approved)values('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','no') ", $this->users, mysql_real_escape_string($usename)
                , md5($password), mysql_real_escape_string($name), mysql_real_escape_string($gender), mysql_real_escape_string($street_address), mysql_real_escape_string($phone), mysql_real_escape_string($email), mysql_real_escape_string($city), mysql_real_escape_string($state), mysql_real_escape_string($country));
        $insert_ans = mysql_query($insert_query);
        if (!$insert_ans) {
            $response['status'] = 'failure';
            $response['message'] = 'Error in query' . $insert_query;
            $response['query'] = $insert_query;
            return $response;
        }
        $to = $email;
        $subject = "Kurangani : Registration Successfull";
        $message = "Hi " . $name . ",\n You have successfully registered with " . $this->siteName . "\n
            Username :" . $usename . "\n Password :" . $password . "\n \n Please wait for confirmation . Your account will have been Activated within a day..\n Regards,\n WebMaster";
        $headers = "";
        mail($to, $subject, $message, $headers);
        $subject_to_admin="Kurangani :Registration details";
        $message_to_admin="Name : ".$name."\n Email :".$email."\n Phone Number".$phone;
        mail("muthuraj@kurangani.in", $subject_to_admin, $message_to_admin);
        $response['status'] = 'success';
        $response['message'] = 'Successullly User added';
        return $response;
    }

    function loggout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        //session_destroy();

        return 'success';
    }

    function contact($name, $email, $phone, $info) {
        //error_log("contact act page called");
        if (!$this->DBLogin()) {
            $response['status'] = 'failure';
            $response['message'] = 'Database Login failure';
            return $response;
        }
        $insert_query = sprintf("insert into %s(name,email,phone,information) values('%s','%s','%s','%s')", $this->contact, mysql_real_escape_string($name)
                , mysql_real_escape_string($email), mysql_real_escape_string($phone), mysql_real_escape_string($info));
        $insert_result = mysql_query($insert_query);
        if (!$insert_result) {
            $response['status'] = 'failure';
            $response['message'] = 'Error with query' . $insert_query;
            return $response;
        }
//        if (!($this->sendEmail())) {
//            $response['status'] = 'failure';
//            $response['message'] = 'Error sending mail';
//            return $response;
//        }
        $message_to_admin="Message Details\nName :".$name."\n Email :".$email."\n Phone :".$phone.
                "\n Information :".$info;
        mail("muthurajmuthulingam@gmail.com","Kurangani : Somebody Contact us", $message_to_admin);
        $to = $email;
        $subject = "Kurangani : Successfully contacted.";
        $message = "Hi " . $name . ",\n You have successfully contacted  " . $this->siteName . "\n
            We will get back to You soon.\n Regards,\n WebMaster";
        $headers = "kumaran@kurangani.com";
        mail($to, $subject, $message, $headers);
        $response['status'] = 'success';
        $response['message'] = 'Successfully contacted';
        return $response;
    }

    function searchArea($area) {
        $area = "%" . $area . "%";
        if (!$this->DBLogin()) {
            $response['status'] = 'failure';
            $response['message'] = 'Database Login failure';
            return $response;
        }
        $searchquery = sprintf("select name,address from %s where address like '%s' ", $this->person, mysql_real_escape_string($area));
        $query_ans = mysql_query($searchquery);
        if (!$query_ans) {
            $response['status'] = 'failure';
            $response['message'] = 'Query Error' . $searchquery;
            return $response;
        }
        $num_rows = mysql_num_rows($query_ans);
        if ($num_rows == 0) {
            $response['status'] = 'no';
            $response['message'] = 'Sorry, No Persons located near the Area You are search for';
            return $response;
        }
        //   $answer= mysql_fetch_assoc($query_ans);
        for ($i = 0; $i < $num_rows; $i++) {
            $answer = mysql_fetch_assoc($query_ans);

            $ans[$i]['name'] = $answer['name'];
            $ans[$i]['address'] = $answer['address'];
        }
        $response['status'] = 'success';
        $response['numrows'] = $num_rows;
        $response['query'] = $searchquery;
        $response['message'] = $ans;
        return $response;
    }

    function getIPAddress() {
        $ipAddresses = array();
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {

            $ipAddresses['proxy'] = isset($_SERVER["HTTP_CLIENT_IP"]) ? $_SERVER["HTTP_CLIENT_IP"] : $_SERVER["REMOTE_ADDR"];
            $ipAddresses['user'] = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ipAddresses['user'] = isset($_SERVER["HTTP_CLIENT_IP"]) ? $_SERVER["HTTP_CLIENT_IP"] : $_SERVER["REMOTE_ADDR"];
            $ipAddresses['proxy'] = "Not Available";
        }
        return $ipAddresses;
    }

    function searchAreaFullDetails($area) {
        $area = "%" . $area . "%";
        if (!$this->DBLogin()) {
            $response['status'] = 'failure';
            $response['message'] = 'Database Login failure';
            return $response;
        }
        $searchquery = sprintf("select name,address,mobile_number from %s where address like '%s' ", $this->person, mysql_real_escape_string($area));
        $query_ans = mysql_query($searchquery);
        if (!$query_ans) {
            $response['status'] = 'failure';
            $response['message'] = 'Query Error' . $searchquery;
            return $response;
        }
        $name=$_SESSION['name'];
        $user_id=$_SESSION['user_id'];
        $insert_query=  sprintf("insert into %s values('%s','%s',NOW(),'%s') ",  $this->track_user,$user_id,$name,$area);
        $insert_ans=  mysql_query($insert_query);
        $num_rows = mysql_num_rows($query_ans);
        if ($num_rows == 0) {
            $response['status'] = 'no';
            $response['message'] = 'Sorry, No Persons located near the Area You are search for';
            return $response;
        }
        //   $answer= mysql_fetch_assoc($query_ans);
        for ($i = 0; $i < $num_rows; $i++) {
            $answer = mysql_fetch_assoc($query_ans);

            $ans[$i]['name'] = $answer['name'];
            $ans[$i]['address'] = $answer['address'];
            $ans[$i]['mobile_number'] = $answer['mobile_number'];
        }
        $response['status'] = 'success';
        $response['numrows'] = $num_rows;
        $response['query'] = $searchquery;
        $response['message'] = $ans;
        return $response;
    }

    function sendEmail() {

        $mailer = $this->GetMailer();
        $mailer->Subject = "Welcome to " . $this->sitename;

        $mailer->CharSet = 'utf-8';
        $mailer->AddAddress($user_rec['email'], $user_rec['name']);


        $mailer->Body = "Hello " . $user_rec['name'] . "\r\n\r\n" .
                "Welcome! Your registration with " . $this->sitename . " is completed.\r\n" .
                "\r\n" .
                "Regards,\r\n" .
                "Webmaster\r\n" .
                $this->sitename;

        if (!$mailer->Send()) {

            $this->HandleError("Failed sending user welcome email.");

            return false;
        }
    }

    function GetMailer() {
        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->SMTPDebug = 1; // 1 tells it to display SMTP errors and messages, 0 turns off all errors and messages, 2 prints messages only.
        $mailer->Host = 'relay-hosting.secureserver.net';
        $mailer->SMTPAuth = false;
        $mailer->From = 'admin@kurangani.in';
        $mailer->AddReplyTo('muthuraj@kurangani.in', 'Kurangani');
        $mailer->FromName = 'Kurangani';
        return $mailer;
    }

}

?>