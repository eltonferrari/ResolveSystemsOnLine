<?php
    session_start();
    include 'class_ocorrencias_contato.php';
	date_default_timezone_set('America/Sao_Paulo');

	$idContato = $_GET['id_contato'];
    $descricao = $_POST['descricao'];
    $ocorrenciaContato = new OcorrenciasContato();
    $ocorrenciaContato = $ocorrenciaContato->addOcorenciaContato($idContato, $descricao);
    $msgOcorrenciaContato = 'Ocorrência adicionada com sucesso!';
    $_SESSION['msgOcorrenciaContato'] = $msgOcorrenciaContato;
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/contatos/visualizar_contato.php?id_contato=<?= $idContato ?>">
    <?php
?>