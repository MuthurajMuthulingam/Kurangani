<?
$page = 'index';
include_once './includes/functions.php';
include './includes/header.php';
?>

<!-- #content -->
<div id="content">
    <!-- #content-inside -->
    <div id="content-inside" class="container_12 clearfix">
        <?
        display_info_message();
        display_error_message()
        ?>
        <div id="content_left">
            <div id="main" class="grid_12">    

                <div class="region region-content">
                    <div id="block-system-main" class="block block-system">


                        <div class="content">

                            <div id="node-4" class="node node-article node-promoted node-teaser contextual-links-region" about="/?q=node/4" typeof="sioc:Item foaf:Document">
                                <h2 property="dc:title" datatype="">குரங்கணி</h2>

                                <div class="content clearfix">
                                    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even" property="content:encoded">
                                                <p>குரங்கணி என்னும் கிராமம் தூத்துக்குடி மாவட்டம் திருச்செந்தூர் வட்டத்தில் அமைந்துள்ளது .<br>
                                                    திருசெந்தூர் - திருநெல்வேலி நெடுஞ்சாலையில் உள்ள நவதிருப்பதிகளில்<br>
                                                    ஒன்றான தென்திருப்பேரையில் இருந்து ஏரல் செல்லும் வழியில் 3 கிலோ மீட்டர்<br>
                                                    தொலைவில் தென்பொருனை நதியின் கரையோரம் அமைந்துள்ளது .</p>
                                            </div>
                                        </div>
                                    </div>  
                                </div>

                            </div>
                        </div>
                    </div>  
                </div>

            </div><!-- EOF: #main -->

        </div>
        <div id="content_right">
            <div id="marquee_container">
                <h2 style="color: #ffffff; background-color: #000000;"> Latest Updates........</h2>
            <marquee id="marqueetest" direction="up" onmouseout="this.start();" onmouseover="this.stop();" >
                <strong>
                    <div id="blue"><p><a href="kpl.php">Kurangani Premier League (KPL)</a></p></div><br>
                    <div id="white"><p><a href="templefestival2011.php"> Temple Festival - July-2013</a></p></div><br>
                    <div id="blue"><p><a href="register.php">Get Notifications from our site related recent notifications</a></p></div>
                </strong>
            </marquee>
            </div>
        </div>

    </div><!-- EOF: #content-inside -->

</div><!-- EOF: #content -->

<!-- #footer -->    
<? include './includes/footer.php'; ?>