<?php
    session_start();
    include '../../controladores/status/class_status.php';
    $id = $_GET['id'];
    $status = new Status();
    $statusApagar = new Status();
    $statusAnterior = new Status();
    $statusProximo = new Status();
    $anterior = null;
    $proximo = null;
    $status = $status->getStatusById($id);
    foreach ($status as $s) {
        $anterior = $s['anterior'];
        $proximo = $s['proximo'];
    }
    $statusAnterior = $statusAnterior->setStatusProximo($anterior,$proximo);
    $statusProximo = $statusProximo->setStatusAnterior($proximo,$anterior);
    $statusApagar = $statusApagar->apagaStatus($id);
    $msgStatus = "Status apagado com sucesso";
    $_SESSION['msgStatusApagado'] = $msgStatus;
?>
    <meta http-equiv="refresh" content="0;url=../../visualizacoes/status/status.php">
<?php 
?>