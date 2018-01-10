<div id="footer">
    <!-- #footer-inside -->
    <div id="footer-inside" class="container_12 clearfix">

        <div class="footer-area grid_4">
        </div><!-- EOF: .footer-area -->

        <div class="footer-area grid_4">
        </div><!-- EOF: .footer-area -->

        <div class="footer-area grid_4">
        </div><!-- EOF: .footer-area -->

    </div><!-- EOF: #footer-inside -->

</div><!-- EOF: #footer -->

<!-- #footer-bottom -->    
<div id="footer-bottom">

    <!-- #footer-bottom-inside --> 
    <div id="footer-bottom-inside" class="container_12 clearfix">
        <!-- #footer-bottom-left --> 
        <div id="footer-bottom-left" class="grid_8">
            <? if (isset($_SESSION['user_id'])) {
                ?>
                <ul class="secondary-menu links clearfix"><li class="menu-2 first"><a href="#">My account</a></li>
                    <li class="menu-2 first"><a href="fullcontactdetails.php">Find a Person</a></li>
                    <li class="menu-15 last"><a href="logout.php">Log out</a></li></ul><? } else { ?>
                <ul class="secondary-menu links clearfix"><li class="menu-2 first"><a href="register.php">Register</a></li> <li class="menu-2 first"><a href="contactdetails.php">Find a Person</a></li>
                    <li class="menu-15 last"><a href="login.php">Sign in</a></li><? } ?>
            </ul>            
            <div class="region region-footer">
                <div id="block-block-2" class="block block-block contextual-links-region">

                    <div class="contextual-links-wrapper"><ul class="contextual-links"><li class="block-configure first last"><a href="/?q=admin/structure/block/manage/block/2/configure&amp;destination=node">Configure block</a></li>
                        </ul></div>
                    <div class="content">
                        <p>Powered by LSC . Designed for <a href="index.php">Kurangani</a>.All Rights reserved.</p>
                    </div>
                </div>  </div>

        </div>
        <!-- #footer-bottom-right --> 
        <div id="footer-bottom-right" class="grid_4">


        </div><!-- EOF: #footer-bottom-right -->

    </div><!-- EOF: #footer-bottom-inside -->

    <!-- #credits -->   

    <!-- EOF: #credits -->

</div><!-- EOF: #footer -->  </body>
</html>
