<?php
session_start();
function display_info_message() {
    //echo '<center><div id="information">' . $_SESSION['info'] . 'hjhjhfjhfjh</div></center>';
   
    if (isset($_SESSION['info'])) {
        echo '<center><div id="information">' . $_SESSION['info'] . '</div></center>';
    }
    unset($_SESSION['info']);
}

function display_error_message() {
   //echo '<center><div id="server_error">' . $_SESSION['error'] . 'hjhjhfjhfjh</div></center>';
    if (isset($_SESSION['error'])) {
        echo '<center><div id="server_error">' . $_SESSION['error'] . '</div></center>';
    }
    unset($_SESSION['error']);
}
?>
