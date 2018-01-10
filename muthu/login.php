<?php
$page = 'contact';
include_once 'includes/functions.php';
include 'includes/header.php';
?>
<div id="content">

    <!-- #content-inside -->
    <div id="content-inside" class="container_12 clearfix">
        <? 
        //echo '<br/>'.$_SESSION['error'].'</br> fyuyuytuytuytuyt';
        display_info_message();
       display_error_message()
        ?>

        <center>
            <form id="login" name="login" action="ctrl_login.php" method="post" >
                <div>
                    <label>பயனர் பெயர் </label>
                    <input type="text" maxlength="100" name="username" id="username"/>
                    <label class="error" id="error_username">Enter the UserName</label>     
                </div>
                <div>
                    <label>கடவுச்சொல் </label>
                    <input type="password" maxlength="100" name="password" id="password"/>
                    <label class="error" id="error_password">Enter the Password</label>       
                </div>
                <div>
                    <input type="submit" name="login" onclick="return validateform();" id="login" value="Login"/>       
                </div>
            </form>
        </center>
    </div><!-- EOF: #content -->
</div>
<script type='text/javascript'>
   
    function validateform(){
        var username=document.getElementById("username").value;
        var password=document.getElementById("password").value;
        if(username.length<1){
                   //alert("Please Enter name");
                   document.getElementById("error_username").style.display="block";
                    document.forms['login']['username'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_username").style.display="none";
                }
                if(password.length<1){
                   //alert("Please Enter name");
                   document.getElementById("error_password").style.display="block";
                    document.forms['login']['password'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_password").style.display="none";
                }
        return true;
    }
</script>
<!-- #footer -->    
<? include 'includes/footer.php'; ?>