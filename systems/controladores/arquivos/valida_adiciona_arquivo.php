<?php
	session_start();
	include 'class_arquivos.php';

	$descricao = $_POST['descricao'];
    $arquivo = $_FILES['arquivo'];
    $tipos = 'pdf'; //só permite .pdf
	$num = new Arquivos();
	$tipo = null;
    if (isset($_POST['id_pessoa'])) {
		$id = $_POST['id_pessoa'];
		$tipo = 'Pessoa';
		$num = $num->getNumeroArquivoPessoa($id);
	} else if (isset($_POST['id_contrato'])) {
		$id = $_POST['id_contrato'];
		$tipo = 'Contrato';
		$num = $num->getNumeroArquivoContrato($id);
	}
	
	// Pasta onde o arquivo vai ser salvo
	if ($tipo == 'Pessoa') {
		$uploaddir = "../../../arquivos/users/id_$id";
		$_UP['pasta'] = "../../../arquivos/users/id_$id/";
	} else  if ($tipo == 'Contrato') {
		$uploaddir = "../../../arquivos/contratos/id_$id";
		$_UP['pasta'] = "../../../arquivos/contratos/id_$id/";
	}
	
	// Se pasta não existir, cria a pasta
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir);
    }
	
    //Tamanho máximo do arquivo em Bytes
	$_UP['tamanho'] = 11000000;
	
    //Renomeiar
	$_UP['renomeia'] = false;
	
    //Array com os tipos de erros de upload do PHP
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	
    //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
	if ($_FILES['arquivo']['error'] != 0) {
		echo "Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']];
		exit; //Para a execução do script
	}
	$arquivo_up = $_FILES['arquivo']['name'];
    $extensao = pathinfo($arquivo_up);
    $extensao = $extensao['extension'];	
	$msgAdicionaArquivo = null;
	if ($extensao != 'pdf') {
		$msgAdicionaArquivo = "Extensão inválida.";
		echo "Extensão inválida.";
	} else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
		echo $msgAdicionaArquivo = "Arquivo muito grande.";
	} else {
		$caminho = $_UP['pasta'];
		$num ++;
		$nome_final = "arquivo_$num.$extensao";
		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
			//Upload efetuado com sucesso, exibe a mensagem
			$insertArquivo = new Arquivos();
			if ($tipo == 'Pessoa') {
				$insertArquivo = $insertArquivo->addArquivoPessoa($id, $descricao, $_UP['pasta'], $nome_final);
			} else if ($tipo == 'Contrato') {
				$insertArquivo = $insertArquivo->addArquivoContrato($id, $descricao, $_UP['pasta'], $nome_final);				
			}
			$msgAdicionaArquivo = "Arquivo adicionado com sucesso.";	
		} else {
			$msgAdicionaArquivo = "Arquivo não adicionado.";
		}
	}
    $_SESSION['$msgAdicionaArquivo'] = $msgAdicionaArquivo;
	if ($tipo == 'Pessoa') {
?>
		<meta http-equiv="refresh" content="0;url=../../visualizacoes/arquivos/arquivos.php?id_pessoa=<?= $id ?>">
<?php
	} else if ($tipo == 'Contrato') {
?>
		<meta http-equiv="refresh" content="0;url=../../visualizacoes/arquivos/arquivos.php?id_contrato=<?= $id ?>">
<?php
	}
?>