<?php
    session_start();
    include '../../controladores/status/class_status.php';

    echo '===== SESSION =====';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $id = $_POST['id'];
    $status = new Status();
    $status->editStatus($nome, $descricao, $id);
    $msgStatus = "Status - $nome - alterado com sucesso";
    $_SESSION['msgStatusAlterado'] = $msgStatus;
?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/status/status.php">
<?php 
?>