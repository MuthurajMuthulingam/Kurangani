<?php
$page = 'contact';
include_once 'includes/functions.php';
include 'includes/header.php';
?>

<div id="content">
    <!-- #content-inside -->
    <div id="content-inside" class="container_12 clearfix">
        <?  display_info_message();
    display_error_message()?>
        <div class="left">
            <form name="contact" id="contact" action="ctrl_contact.php" method="post" >
                <div><label for="name" >பெயர்       </label>
                     <input type="text" maxlength="100" name="name" id="name"/>
                    <label class="error" id="error_name">Enter the value for name</label> 
                    </div>
                <div><label for="phone" >கைபேசி     </label>
                    <input type="text" maxlength="100" name="phone" id="phone"/>
                    <label class="error" id="error_phone">Enter the value for phone</label>
                    <label class="error" id="error_phone_digit">Enter only 10 digits for phone</label>
                    <label class="error" id="error_phone_number">Enter only numbers for phone</label>
                </div>
                <div><label for="email" >மின்னஞ்சல் </label>
                    
                    <input type="text" maxlength="100" name="email" id="email"/>
                    <label class="error" id="error_email">Enter the value for email</label>  
                    <label class="error" id="error_email_invalid">Enter the valid email</label>  
                </div>
                <div><label for="info" >செய்தி </label>
                     <textarea name="info" id="info"></textarea>
                    <label class="error" id="error_info">Enter the Information</label>    
                </div>

                <div>
                    <label>           </label>
                    <input type="submit" name="send" onclick="return validateform();" id="send" value="தொடர்பு கொள் "/>       
                </div>
            </form>

        </div>

        <script type="text/javascript">
           
            function validateform(){
                //alert("method c");
                var name=document.forms['contact']['name'].value;
                var phone=document.forms['contact']['phone'].value;
                var email=document.forms['contact']['email'].value;
                var info=document.forms['contact']['info'].value;
                var email_re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(name.length<1){
                   //alert("Please Enter name");
                   document.getElementById("error_name").style.display="block";
                    document.forms['contact']['name'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_name").style.display="none";
                }
                if(phone.length<1){
                   //alert("Please Enter Phone number");
                   document.getElementById("error_phone").style.display="block";
                    document.forms['contact']['phone'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_phone").style.display="none";
                }
                if(isNaN(phone)){
                    //alert("Enter only Numbers in Phone Number");
                    document.getElementById("error_phone_number").style.display="block";
                    document.forms['contact']['phone'].focus();
                    return false;
                }else{
                    document.getElementById("error_phone_number").style.display="none";
                }
             if(phone.length>10){
                 //alert("Enter only Ten Digits in Phone Number");
                 document.getElementById("error_phone_digit").style.display="block";
                 document.forms['contact']['phone'].focus();
                  return false;
             }else{
                 document.getElementById("error_phone_digit").style.display="none";
             }
                 
                if(email.length<1){
                   // alert("Please Enter Email");
                   document.getElementById("error_email").style.display="block";
                    document.forms['contact']['email'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_email").style.display="none";
                }
                if(!email_re.test(email)){
                    //alert("Please enter valid Email");
                    document.getElementById("error_email_invalid").style.display="block";
                    document.forms['contact']['email'].focus();
                    return false;
                }else{
                    document.getElementById("error_email_invalid").style.display="none";
                }
                if(info.length<1){
                    
                    //alert("Please Enter Your Information");
                    document.getElementById("error_info").style.display="block";
                    document.forms['contact']['info'].focus();
                    //document.getElementById("error_name").className='';
                    return false;
                }else{
                    document.getElementById("error_info").style.display="none";
                }
                
                
               
            if(isNaN(phone)){
                    //alert("Enter only Numbers in Phone Number");
                    document.getElementById("error_phone_digit").style.display="block";
                    document.forms['contact']['phone'].focus();
                    return false;
                }else{
                    document.getElementById("error_phone_digit").style.display="none";
                }
             if(phone.length>10){
                 //alert("Enter only Ten Digits in Phone Number");
                 document.getElementById("error_phone_number").style.display="block";
                 document.forms['contact']['phone'].focus();
                  return false;
             }else{
                 document.getElementById("error_phone_number").style.display="none";
             }
             
                return true;
            }
            
        </script>  




    </div><!-- EOF: #content -->

    <!-- #footer -->    
    <? include 'includes/footer.php'; ?>