<?php
    session_start();
    include '../../controladores/contratos/class_contratos.php';
    include '../../controladores/ocorrencias/class_ocorrencias.php';
    
    $idContrato = $_POST['id_contrato'];
    $texto      = $_POST['texto'];
    $createdBy  = $_POST['created_by'];
    $novaOcorrencia = new Ocorrencias();
    $novaOcorrencia->addOcorrencia($idContrato, $texto, $createdBy);
    
    $nomeCliente = new Contratos();
    $nomeCliente = $nomeCliente->getNomeClienteByIdContrato($idContrato);
    $_SESSION['msgOcorrencia'] = "Ocorrencia adicionada com sucesso.";
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/ocorrencias/ver_ocorrencias.php?id_contrato=<?= $idContrato ?>">
    <?php
?>