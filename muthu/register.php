<?php
$page = '';
include_once 'includes/functions.php';
include 'includes/header.php';
?>
<div id="content">

    <!-- #content-inside -->
    <div id="content-inside" class="container_12 clearfix">
        <? display_info_message();
        display_error_message()
        ?>
        <center>
            <form name="reg" id="reg" action="ctrl_register.php" method="post" >
                <div>
                    <label>பெயர்       </label>
                    <input type="text" maxlength="100" name="name" id="name"/>
                    <label class="error" id="error_name">Enter the Name</label>       
                </div>
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
                    <label>பாலினம்       </label>
                    <input type="radio" name="gender" id="gender" value="Male" checked="checked" /> ஆண்
                    <input type="radio" name="gender" id="gender" value="Female" /> பெண்
                </div>
                <div>
                    <label>முகவரி      </label>
                    <input type="text" maxlength="100" name="add" id="add"/>  
                </div>
                <div>
                    <label>நகரம்       </label>
                    <input type="text" maxlength="100" name="city" id="city"/>   
                </div>
                <div>
                    <label>மாநிலம்      </label>
                    <input type="text" maxlength="100" name="state" id="state"/>    
                </div>
                <div>
                    <label>நாடு        </label>
                    <input type="text" maxlength="100" name="country" id="country"/> 
                </div>
                <div>
                    <label>கைபேசி       </label>
                    <input type="text" maxlength="100" name="phone" id="phone"/>
                    <label class="error" id="error_phone">Enter the value for phone</label>
                    <label class="error" id="error_phone_digit">Enter only 10 digits for phone</label>
                    <label class="error" id="error_phone_number">Enter only numbers for phone</label>
                </div>
                <div>
                    <label>மின்னஞ்சல்   </label>
                    <input type="text" maxlength="100" name="email" id="email"/> 
                     <label class="error" id="error_email">Enter the value for email</label>  
                    <label class="error" id="error_email_invalid">Enter the valid email</label>  
                </div>


                <div>
                    <div><input type="submit" name="register" id="register" onclick="return validateform();" value="Register"/></div>        
                </div>
            </form>

        </center> 

    </div><!-- EOF: #content -->
    <script type="text/javascript">
           
        function validateform(){
            //alert("method c");
            var name=document.forms['reg']['name'].value;
            var username=document.forms['reg']['username'].value;
            var password=document.forms['reg']['password'].value;
            var phone=document.forms['reg']['phone'].value;
            var email=document.forms['reg']['email'].value;
            
            var email_re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(name.length<1){
                   //alert("Please Enter name");
                   document.getElementById("error_name").style.display="block";
                    document.forms['reg']['name'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_name").style.display="none";
                }
                if(username.length<1){
                   //alert("Please Enter name");
                   document.getElementById("error_username").style.display="block";
                    document.forms['reg']['username'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_username").style.display="none";
                }
                if(password.length<1){
                   //alert("Please Enter name");
                   document.getElementById("error_password").style.display="block";
                    document.forms['reg']['password'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_password").style.display="none";
                }
                if(phone.length<1){
                   //alert("Please Enter Phone number");
                   document.getElementById("error_phone").style.display="block";
                    document.forms['reg']['phone'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_phone").style.display="none";
                }
                if(isNaN(phone)){
                    //alert("Enter only Numbers in Phone Number");
                    document.getElementById("error_phone_number").style.display="block";
                    document.forms['reg']['phone'].focus();
                    return false;
                }else{
                    document.getElementById("error_phone_number").style.display="none";
                }
             if(phone.length>10){
                 //alert("Enter only Ten Digits in Phone Number");
                 document.getElementById("error_phone_digit").style.display="block";
                 document.forms['reg']['phone'].focus();
                  return false;
             }else{
                 document.getElementById("error_phone_digit").style.display="none";
             }
                 
                if(email.length<1){
                   // alert("Please Enter Email");
                   document.getElementById("error_email").style.display="block";
                    document.forms['reg']['email'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_email").style.display="none";
                }
                if(!email_re.test(email)){
                    //alert("Please enter valid Email");
                    document.getElementById("error_email_invalid").style.display="block";
                    document.forms['reg']['email'].focus();
                    return false;
                }else{
                    document.getElementById("error_email_invalid").style.display="none";
                }
             
            return true;
        }
            
    </script>  

</div>
<!-- #footer -->    
<? include 'includes/footer.php'; ?>