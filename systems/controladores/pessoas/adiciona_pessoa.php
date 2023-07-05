<?php
    session_start();
    include 'class_pessoas.php';
    $idTipo = $_POST['funcao'];
    $nomeNovo = $_POST['nome'];
    $emailNovo = $_POST['email'];
    $senha = md5($_POST['senha']);
    $createdBy = $_SESSION['id_logado'];

    $emailBanco = new Emails();
    $emailBanco = $emailBanco->getEmailValidar($emailNovo);
    
    $nomeBanco = new Pessoas();
    $nomeBanco = $nomeBanco->getNomeValidar($nomeNovo);
/*
    echo "Email Novo: $emailNovo <br />";
    echo "Email Banco: $emailBanco <br />";
    echo "Nome Novo: $nomeNovo <br />";
    echo "Nome Banco: $nomeBanco <br />";
*/
    $addUser = new Pessoas();
    $msgUser = "";
    
    if ($emailNovo == $emailBanco) {
        $msgUser = 'E-mail já cadastrado no sistema!';
    } else {
        if ($nomeNovo == $nomeBanco) {
                $msgUser = 'Nome já cadastrado no sistema!';
        } else {
            $adduser = $addUser->addPessoa($idTipo, $nomeNovo, $emailNovo, $senha, $createdBy);
            $msgUser = 'Usuário cadastrado no sistema, com sucesso!';
        }
    }
//  echo $msgUser;
    $_SESSION['msg_add_user'] = $msgUser;
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/home/home.php">
    <?php
?>