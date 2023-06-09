<?php    
    // Inicia sessão
    session_start();

    // Verifica se sessão está definida como 
    // autenticado, senão envia para index.php
    // para autenticar.
    if($_SESSION['logado'] != '1' ) {
        $_SESSION['mensagem'] = 'Usuário deve ser autenticado para acessar as página internas';
        ?>
            <meta http-equiv="refresh" content="0;url=../../visualizacoes/autenticacao/login.php">
        <?php
    }
?>