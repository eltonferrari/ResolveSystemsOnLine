<?php
    session_start();
    include '../pessoas/class_pessoas.php';
    include 'class_contratos.php';

    echo '===== SESSION =====';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    
    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $idCliente = $_POST['pessoa'];
    $descricao = $_POST['descricao'];
    $idStatus = $_POST['status'];
    $contrato = new Contratos();
    $contrato = $contrato->addContrato($idCliente, $descricao, $idStatus);
    $cliente = new Pessoas();
    $cliente = $cliente->getNomeById($idCliente);
    $_SESSION['msgContratoAdicionado'] = "Contrato entre Resolve Systems e $cliente adicionado com sucesso."
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/contratos/cadastra_contrato.php">
    <?php
?>