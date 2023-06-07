<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/contratos/class_contratos.php';
    date_default_timezone_set('America/Sao_Paulo');

    echo '===== SESSION =====';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
    
    echo '===== GET =====';
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

    $descricao  = $_POST['descricao'];
    $status     = $_POST['status'];
    $id = $_POST['idContrato'];

    $updatedAt = new DateTime('now');
    $dataAtual = $updatedAt->format('Y-m-d H:i:s');
    $alteraContrato = new Contratos();
    $alteraContrato->editContrato($descricao, $status, $dataAtual, $id);
    $_SESSION['msgAlteraContrato'] = "Contrato $id alterado com sucesso.";
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/contratos/altera_contrato.php?id_contrato=<?= $id ?>">
    <?php
?>