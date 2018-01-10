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
        <div><center> <strong>Find a Person Near to You, Enter only few charectors of area</strong></center></div>  
      <center>
        <form id="login" name="login" action="" method="post" >
            <div>
                <label>Enter the Area (only inside Chennai)</label>
               <input type="text" maxlength="100" name="area" id="area"/>  
               <input type="button" name="search" onclick="return makesearch();" id="search" value="Search"/>  
            </div>
            <div id="answertable">
                <image src="images/ajax-loader.gif" id="loader" />
            </div>
           
        </form>
 </center>
    </div><!-- EOF: #content -->
</div>
<script type='text/javascript'>
    function makesearch(){
        //alert("makesera");
        searchArea();
        return false;
    }
    function showloader(){
        //alert("show loader");
        //document.getElementById("loader").style.display="block";
        $('#loader').show();
    }
    function hideloader(){
       // document.getElementById("loader").style.display="none";
       $('#loader').hide();
    }
    function searchArea(){
        //alert//("search called");
        var areaval=document.getElementById("area").value;
        //alert("area value"+area);
        if(areaval.length<1){
            alert("Enter the Area ");
            document.getElementById("area").focus();
            return false;
        }
      showloader();
        $.ajax({
            type: 'POST',
            url: 'ctrl_contactdetails.php',
            data: {
                area:areaval
                },
            dataType: "text",
            success: function (response) {
                hideloader();
                $("#answertable").html(response);
                return true;
                               
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                //$("#error_msg").val(textStatus);
               // hideLoader();
                alert("Failed to call controller"+textStatus+"vhsgdvgjv"+errorThrown);
                return false;
            }
            
            
        });
        
        
//        var answer=document.getElementById("ans");
//        //alert("result from server"+answer);
//        document.getElementById("answertable").innerHTML=answer;
    }
</script>
    <!-- #footer -->    
    <? include 'includes/footer.php'; ?>