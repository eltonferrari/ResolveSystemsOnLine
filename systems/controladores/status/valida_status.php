<?php
    session_start();
    echo '===== SESSION =====';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    
?>