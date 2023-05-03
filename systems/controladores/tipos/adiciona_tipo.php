<?php
    session_start();
    include 'class_tipos.php';
    
    $nome = $_POST['nome_tipo'];
    $descricao = $_POST['descricao'];
    $tipo = new Tipos();
    $tipo = $tipo->getAllTipos();    
    
    $addTipo = new Tipos();
    $msgTipo = "";

    foreach ($tipo as $t) {
        if (($t['nome'] == $nome && $t['descricao'] == $descricao) || ($t['nome'] == $nome) || ($t['descricao'] == $descricao)) {
            $msgTipo = 'Função já existe no sistema!';
            break;
        } else {
            $add_Tipo = $addTipo->addTipo($nome, $descricao);
            $msgTipo = 'Função cadastrada no sistema, com sucesso!';
        }
    }
    $_SESSION['msg_add_tipo'] = $msgTipo;
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/home/home.php">
    <?php
    //header("Location: ../../visualizacoes/home/home.php")
?>