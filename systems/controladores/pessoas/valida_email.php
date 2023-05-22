<?php
    include 'class_emails.php';
    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $idPessoa = $_POST['id_perfil'];
    $novoEmail = $_POST['email'];
    $insertIdEmail = new Emails();
    $insertIdEmail = $insertIdEmail->addEmailPessoa($idPessoa,$novoEmail,0);
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/cadastra_email.php?id_perfil=<?= $idPessoa ?>">
    <?php
?>