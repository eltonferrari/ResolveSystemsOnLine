<?php
    session_start();
/*
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    // Remover índices do array de sessão
    // unset()
    unset($_SESSION['x']);
*/

    // Destruir a variável de sessão
    
    session_destroy();
    ?>
        <meta http-equiv="refresh" content="0;url=\index.php">
    <?php
?>