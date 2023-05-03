<?php
    session_start();
    include 'class_fale_conosco.php';

    $nome       = $_POST['nome'];
    $email      = $_POST['email'];
    $telefone   = $_POST['telefone'];
    $mensagem   = $_POST['mensagem'];
    $form = new FaleConosco();
    $form = $form->addMensagem($nome, $email, $telefone, $mensagem);
    $_SESSION['msgAddMensagem'] = "Sua mensagem foi adicionada ao sistema.<br />Entraremos em contato em breve.<br />Obrigado!";
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/fale_conosco/fale_conosco.php">
    <?php
    //header("Location: ../../visualizacoes/fale_conosco/fale_conosco.php");
?>