<?php
    session_start();
    include 'class_contatos.php';

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$descricao = $_POST['descricao'];
	$contato = new Contatos();
	$contato = $contato->addContato($nome, $email, $telefone, $descricao);
	$msgContato = 'Contato adicionado com sucesso';
	$_SESSION['msgContato'] = $msgContato;

    ?>
	    <meta http-equiv="refresh" content="0;url=../../visualizacoes/contatos/cadastra_contato.php">
    <?php
?>