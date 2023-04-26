<?php
    session_start();
    include 'class_tipos.php';
    
    echo '===== SESSION =====';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    
    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    
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
    header("Location: ../../visualizacoes/home/home.php")
?>