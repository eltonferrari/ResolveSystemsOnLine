<?php 
    session_start();
    include '../pessoas/class_pessoas.php';
    
    echo '===== POST =====';
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
        header("Location: ../../visualizacoes/autenticacao/login.php");
    } else {
        foreach ($pessoa as $p) {
            if ($email == $p['email'] && $senha == $p['senha']) {
                $_SESSION['logado'] = 1;
                $_SESSION['id_logado'] = $p['id'];
                header("Location: ../../visualizacoes/home/home.php");
            } else {
                $msgPessoa = "Usuário e/ou Senha inválidos!";
                $_SESSION['mensagem'] = $msgPessoa;
                $_SESSION['logado'] = 0;
                header("Location: ../../visualizacoes/autenticacao/login.php");
            }
        }
    }
?>