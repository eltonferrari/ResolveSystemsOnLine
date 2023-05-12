<?php 
    session_start();
    include '../pessoas/class_pessoas.php';
    
    echo '<pre>';
	print_r($_POST);
	echo '</pre>';

    $email = $_POST['email'];
    $senha = (md5($_POST['senha']));
    $pessoa = new Pessoas();
    $pessoa = $pessoa->getPessoaByEmail($email);
    if (empty($pessoa)) {
        $msgPessoa = "Usuário e/ou Senha inválidos!";
        $_SESSION['mensagem'] = $msgPessoa;
        $_SESSION['logado'] = 0;
    ?>
       <!-- <meta http-equiv="refresh" content="0;url=../../visualizacoes/autenticacao/login.php"> -->
    <?php
        
    } else {
        foreach ($pessoa as $p) {
            if ($email == $p['email'] && $senha == $p['senha']) {
                $_SESSION['logado'] = 1;
                $id = $p['id'];
                $_SESSION['id_logado'] = $id;
                $idTipo = $p['id_tipo'];
                $_SESSION['tipo'] = $idTipo;
                if ($idTipo == 1) {
                    echo "logado tipo 1";
                    ?>
                       <meta http-equiv="refresh" content="0;url=../../visualizacoes/home/home.php">
                    <?php
                } else {
                    echo "logado tipo 2";
                    ?>
                       <meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/status_cliente.php">
                    <?php
                }
            } else {
                $msgPessoa = "Usuário e/ou Senha inválidos!";
                $_SESSION['mensagem'] = $msgPessoa;
                $_SESSION['logado'] = 0;
                echo "user/senha inválidos";
                ?>
                    <meta http-equiv="refresh" content="0;url=../../visualizacoes/autenticacao/login.php">
                <?php
                //  header("Location: ../../visualizacoes/autenticacao/login.php");
            }
        }
    }
?>