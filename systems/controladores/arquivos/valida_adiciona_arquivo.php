<?php
	include 'class_arquivos.php';
    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    
    $idPessoa = $_POST['id_pessoa'];
    $descricao = $_POST['descricao'];
    $arquivo = $_FILES['arquivo'];
    $tipos = array('pdf'); //só permite .pdf

    echo '===== ARQUIVO =====';
    echo '<pre>';
    print_r($arquivo);
    echo '</pre>';

    //Pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = "../../../arquivos/users/$idPessoa/";

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
	$extensao = strtolower(end(explode('.', $arquivo['name'])));
    $extensao = (string)$extensao;
	if ($extensao != 'pdf') {		
		$msgAdicionaArquivo = "Extensão inválida.";
	} else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
		echo $msgAdicionaArquivo = "Arquivo muito grande.";
	} else {
		$caminho = $_UP['pasta'];
		$nome_final = $_FILES['arquivo']['name'];
		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
			//Upload efetuado com sucesso, exibe a mensagem
			$insertArquivo = new Arquivos();
			//$insertArquivo = $insertArquivo->addArquivoPessoa($idPessoa, $descricao, $_UP['pasta'] . $nome_final);
			$msgAdicionaArquivo = "Arquivo adicionado com sucesso.";	
		} else {
			$msgAdicionaArquivo = "Arquivo não adicionado.";
		}
	}
    $_SESSION['$msgAdicionaArquivo'] = $msgAdicionaArquivo;
/*
?>
	<meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/altera_imagem.php?user=<?= $idUser ?>">
<?php
*/
?>