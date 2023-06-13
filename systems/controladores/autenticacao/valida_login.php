<?php 
    session_start();
    include '../pessoas/class_pessoas.php';
    
    $email = $_POST['email'];
    $senha = (md5($_POST['senha']));
    $pessoa = new Pessoas();
    $pessoa = $pessoa->getPessoaByEmail($email);
    if (empty($pessoa)) {
        $msgPessoa = "Usuário e/ou Senha inválidos!";
        $_SESSION['mensagem'] = $msgPessoa;
        $_SESSION['logado'] = 0;
        ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/autenticacao/login.php">
        <?php        
    } else { 
        foreach ($pessoa as $p) {
            if ($p['ativo'] == 0) {
                $msgPessoa = "Usuário INATIVO no momento!";
                $_SESSION['mensagem'] = $msgPessoa;
                $_SESSION['logado'] = 0;
                ?>
                    <meta http-equiv="refresh" content="0;url=../../visualizacoes/autenticacao/login.php">
                <?php
            } else {
                if ($email == $p['email'] && $senha == $p['senha']) {
                    $_SESSION['logado'] = 1;
                    $id = $p['id'];
                    $_SESSION['id_logado'] = $id;
                    $idTipo = $p['id_tipo'];
                    $_SESSION['tipo'] = $idTipo;
                    if ($idTipo == 1) {
                        ?>
                            <meta http-equiv="refresh" content="0;url=../../visualizacoes/home/home.php">
                        <?php
                    } else {
                        ?>
                            <meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/status_cliente.php">
                        <?php
                    }            
                } else {
                    $msgPessoa = "Usuário e/ou Senha inválidos!";
                    $_SESSION['mensagem'] = $msgPessoa;
                    $_SESSION['logado'] = 0;
                    ?>
                        <meta http-equiv="refresh" content="0;url=../../visualizacoes/autenticacao/login.php">
                    <?php
                }
            }
        }
    }
?>