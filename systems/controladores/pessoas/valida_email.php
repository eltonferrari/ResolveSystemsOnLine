<?php
    session_start();
    include 'class_emails.php';
    $idPessoa = $_POST['id_perfil'];
    $emailNovo = $_POST['email'];
    $emailBanco = new Emails();
    $emailBanco = $emailBanco->getEmailValidar($emailNovo);
    $insertIdEmail = new Emails();
    $msgEmailNovo = null;
    if ($emailNovo == $emailBanco) {
        $msgEmailNovo = 'E-mail já existe no sistema!';
    } else {
        $insertIdEmail = $insertIdEmail->addEmailPessoa($idPessoa, $emailNovo, 0);
        $msgEmailNovo = "E-mail: $emailNovo - cadastrado com sucesso no sistema!";
    }
    $_SESSION['msgEmailNovo'] = $msgEmailNovo;
?>
    <meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/cadastra_email.php?id_perfil=<?= $idPessoa ?>">
<?php
?>