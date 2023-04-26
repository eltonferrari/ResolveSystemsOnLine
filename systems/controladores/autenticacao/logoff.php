<?php
    session_start();
    /*
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    // Remover índices do array de sessão
    // unset()
    unset($_SESSION['x']);

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    */

    // Destruir a variável de sessão
    
    session_destroy();
    header('Location: \index.php');
?>