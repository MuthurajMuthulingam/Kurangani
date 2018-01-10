<?php
$page = 'images';
include_once 'includes/functions.php';
include 'includes/header.php';
?>
<div id="content">
   
    <!-- #content-inside -->
    <div id="content-inside" class="container_12 clearfix">
      
        <div id="juicebox-container"></div>
       <!--START JUICEBOX EMBED-->
<script src="jbcore/juicebox.js"></script>
<script>
new juicebox({
containerId : "juicebox-container",
galleryWidth: "100%",
galleryHeight: "100%",
backgroundColor: "#222222"
});
</script>

<!--END JUICEBOX EMBED-->
      
    </div><!-- EOF: #content -->
</div>

    <!-- #footer -->    
    <? include 'includes/footer.php'; ?>