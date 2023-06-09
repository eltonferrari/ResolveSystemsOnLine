<?php
    session_start();
    include 'class_fale_conosco.php';
    
    date_default_timezone_set('America/Sao_Paulo');
    $id = $_SESSION['id_mensagem'];
    $_POST['lido']  = ( isset($_POST['lido']) )  ? $lido = 1 : $lido = 0;
    $updatedAt      = new DateTime('now');
    $dataAtual = $updatedAt->format('Y-m-d H:i:s');
    $visual = new FaleConosco();
    $visual->alteraVisibilidade($lido,$dataAtual,$id);
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/fale_conosco/visualiza_mensagem.php?mensagem=<?= $id ?>">
    <?php
?>
