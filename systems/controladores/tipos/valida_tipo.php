<?php
    session_start();
    include 'class_tipos.php';       
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $tipo = new Tipos();
    $tipo->editTipo($nome, $descricao, $id);
    $_SESSION['msg_altera_tipo'] = "Função $nome alterada.";
    echo $_SESSION['msg_altera_tipo'];
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/home/home.php">
    <?php
    //header("Location: ../../visualizacoes/home/home.php")
?>