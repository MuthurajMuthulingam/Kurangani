<?php
$page = 'images';
include 'includes/header.php';
?>
<div id="content">
   
    <!-- #content-inside -->
    <div id="content-inside" class="container_12 clearfix">
        <div id="juicebox-container"></div>
    </div><!-- EOF: #content -->
</div>
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
<div id="juicebox-container"></div>
<!--END JUICEBOX EMBED-->
    <!-- #footer -->    
    <? include 'includes/footer.php'; ?>