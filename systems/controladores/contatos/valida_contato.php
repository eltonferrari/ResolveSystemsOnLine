<?php
    session_start();
    include 'class_contatos.php';
	date_default_timezone_set('America/Sao_Paulo');

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$descricao = $_POST['descricao'];
	
	if (isset($_GET['id_contato'])) {
		$dataAtual = new DateTime('now');
    	$updatedAt = $dataAtual->format('Y-m-d H:i:s');
		$id = $_GET['id_contato'];
		$alterar = new Contatos();
		$alterar->editContato($nome, $email, $telefone, $descricao, $updatedAt, $id);
		$msgAlteraContato = 'Contato alterado com sucesso!';
		$_SESSION['msgAlteraContato'] = $msgAlteraContato;
	    ?>
		    <meta http-equiv="refresh" content="0;url=../../visualizacoes/contatos/visualizar_contato.php?id_contato=<?= $id ?>">
    	<?php
	} else {
		$contato = new Contatos();
		$contato = $contato->addContato($nome, $email, $telefone, $descricao);
		$msgContato = 'Contato adicionado com sucesso!';
		$_SESSION['msgContato'] = $msgContato;
	    ?>
		    <meta http-equiv="refresh" content="0;url=../../visualizacoes/contatos/cadastra_contato.php">
    	<?php
	}
?>