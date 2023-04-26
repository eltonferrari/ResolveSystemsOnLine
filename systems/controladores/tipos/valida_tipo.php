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
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $tipo = new Tipos();
    $tipo->editTipo($nome, $descricao, $id);
    $_SESSION['msg_altera_tipo'] = "Função $nome alterada.";
    echo $_SESSION['msg_altera_tipo'];
    header("Location: ../../visualizacoes/home/home.php")
?>