<?php
    session_start();
    include 'class_pessoas.php';
    $idTipo = $_POST['funcao'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $createdBy = $_SESSION['id_logado'];
    $user = new Pessoas();
    $user = $user->getAllPessoas();
    $addUser = new Pessoas();
    $msgUser = "";
    foreach ($user as $u) {
        if (($u['nome'] == $nome && $u['email'] == $email) || ($u['nome'] == $nome) || ($u['email'] == $email)) {
            $msgUser = 'Usuário já existe no sistema!';
            break;
        } else {
            $add_user = $addUser->addPessoa($idTipo, $nome, $email, $senha, $createdBy);
            $msgUser = 'Usuário cadastrado no sistema, com sucesso!';                  
        }
    }
    $_SESSION['msg_add_user'] = $msgUser;
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/home/home.php">
    <?php
    //header("Location: ../../visualizacoes/home/home.php")
?>