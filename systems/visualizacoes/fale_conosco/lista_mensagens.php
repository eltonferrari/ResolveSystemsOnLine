<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/fale_conosco/class_fale_conosco.php';

	echo '===== SESSION =====';
	echo '<pre>';
        print_r($_SESSION);
    echo '</pre>';

	if (isset($_GET['filtro'])) {
		echo '===== GET =====';
		echo '<pre>';
			print_r($_GET);
		echo '</pre>';
	} elseif (isset($_POST['filtro'])) {
		echo '===== POST =====';
		echo '<pre>';
			print_r($_POST);
		echo '</pre>';
	}

	$lista = new FaleConosco();
	$parametro = null;
	$classVisivel = 'no';
	$nomeFiltro = null;
	$emailFiltro = null;
	$telefoneFiltro = null;
	if (isset($_GET['filtro'])) {
		$parametro = $_GET['filtro'];
		$classVisivel = 'yes';
	} elseif (isset($_POST['filtro'])) {
		$classVisivel = 'yes';
		if (isset($_POST['nome'])) {
			$parametro = 'nome';
			$nomeFiltro = $_POST['nome'];
		} elseif (isset($_POST['email'])) {
			$parametro = 'email';
			$emailFiltro = $_POST['email'];
		} elseif (isset($_POST['telefone'])) {
			$parametro = 'telefone';
			$telefoneFiltro = $_POST['telefone'];
		}
	}
	
	if (isset($_GET['filtro']) || isset($_POST['filtro'])) {
		switch ($parametro) {
			case 'nome':
				$lista = $lista->getIntencaoByNome($nomeFiltro);
				break;
			case 'email':
				$lista = $lista->getIntencaoByEmail($emailFiltro);
				break;
			case 'telefone':
				$lista = $lista->getIntencaoByTelefone($telefoneFiltro);
				break;
			case 'lido':
				$lista = $lista->getIntencaoByVisibilidade(0);
				break;
			case 'nao_lido':
				$lista = $lista->getIntencaoByVisibilidade(1);
				break;
			case 'todos':
				$lista = $lista->getAllIntencoes();
				break;
		}
	}

	echo '===== LISTA - BANCO =====';
	echo '<pre>';
        print_r($lista);
    echo '</pre>';

?>
<!doctype html>
<html lang="pt-br">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- COMPATIBILIDADE COM HTML5 -->
		<!--[if lt IE 9]>
			<script src="../../../js/html5shiv.js"></script>
		<![endif]-->

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../../assets/Bootstrap4/css/bootstrap.min.css">

		<!-- NORMALIZE CSS -->
		<link   rel="stylesheet" type="text/css" href="../../../assets/css/normalize.css">

		<!-- CSS CUSTOMIZADO -->
		<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">

		<title>RS - Resolve Systems</title>
	</head>
    <body>
        <?php include '../../../template/menu_logado.php';?>
        <div class="container">
			<div class="row mt-3">
				<div class="col-md-4 mx-auto mt-3">
					<h4 class="text-light bg-primary text-center borda-redonda-20 negrito">
						<img src="../../../img/icones/filtro.png" alt="Filtro" width="40">
						Filtros
					</h4>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-4 mx-auto mt-3 text-center">
					<form action="lista_mensagens.php" method="post" name="form-nome">
						<label for="nome">Nome:</label>
						<input type="text" name="nome" id="nome" placeholder="Digite um nome...">
						<input type="hidden" name="filtro" value="filtro">
						<buttom class="btn btn-primary" type="submit">Buscar por nome</buttom>
					</form>
				</div>
				<div class="col-md-4 mx-auto mt-3 text-center">
					<form action="lista_mensagens.php" method="post" name="form-email">
						<label for="email">E-mail:</label>
						<input type="email" name="email" id="email" placeholder="Digite um e-mail...">
						<input type="hidden" name="filtro" value="filtro">
						<buttom class="btn btn-primary" type="submit">Buscar por e-mail</buttom>
					</form>
				</div>
				<div class="col-md-4 mx-auto mt-3 text-center">
					<form action="lista_mensagens.php" method="post" name="form-telefone">
						<label for="telefone">Telefone:</label>
						<input type="tel" name="telefone" id="telefone" placeholder="Digite um nº de telefone...">
						<input type="hidden" name="filtro" value="filtro">
						<buttom class="btn btn-primary" type="submit">Buscar por telefone</buttom>
					</form>
				</div>
			</div>
			<div class="row mt-1">
				<div class="col-md-4 mx-auto mt-1 text-center">
					<a class="btn btn-primary mx-2 borda-redonda-10" href="lista_mensagens.php?filtro=lido">Lido</a>
					<a class="btn btn-primary mx-2 borda-redonda-10" href="lista_mensagens.php?filtro=nao_lido">Não lido</a>
					<a class="btn btn-primary mx-2 borda-redonda-10" href="lista_mensagens.php?filtro=todos">Todos</a>
				</div>
			</div>			
			<div class="<?= 'classVisivel-' . $classVisivel ?>">
				<?php
					if ($lista == null) {
				?>
						<div class="my-3">
							<h4 class="text-danger border border-danger text-center borda-redonda-20 negrito">
								Não existem intencões para este parâmetro de lista!
							</h4>
						</div>
				<?php
					} else {
				?>
						<div class="row mt-3">
							<div class="col-md-4 mx-auto mt-3">
								<h4 class="text-light bg-primary text-center borda-redonda-20 negrito">
									Lista
								</h4>
							</div>
						</div>						
						<div class="row mt-3 desaparece-sm desaparece-md">
							<div class="col-md-1 border bg-primary text-light text-center borda-redonda-top-left">Id</div>
							<div class="col-md-2 border bg-primary text-light">Nome</div>
							<div class="col-md-3 border bg-primary text-light">E-mail</div>
							<div class="col-md-2 border bg-primary text-light">Telefone</div>
							<div class="col-md-3 border bg-primary text-light">Mensagem</div>
							<div class="col-md-1 border bg-primary text-light text-center borda-redonda-top-right">Lido?</div>
						</div>
				<?php 
							$visivel = null;
							foreach ($lista as $intencao) {
								$id 			= $intencao['id'];
								$nome			= $intencao['nome'];
								$email			= $intencao['email'];
								$telefone		= $intencao['telefone'];
								$mensagem		= $intencao['mensagem'];
								$visibilidade	= $intencao['visibilidade'];
								if ($visibilidade == 1) {
									$visivel = "Nova";
								} else {
									$visivel = "";
								}
				?>
								<a class="link-visualiza-mensagem text-dark" href="visualiza_mensagem.php?mensagem=<?= $id ?>">
									<div class="row">
										<div class="col-md-1 border-primary border-bottom text-center"><?= $id ?></div>
										<div class="col-md-2 border-primary border-bottom"><?= $nome ?></div>
										<div class="col-md-3 border-primary border-bottom"><?= $email ?></div>
										<div class="col-md-2 border-primary border-bottom"><?= $telefone ?></div>
										<div class="col-md-3 border-primary border-bottom"><?= $mensagem ?></div>
										<div class="col-md-1 text-center align-self-center">
											<h6 class="animate-character-msg"><?= $visivel ?></h6>
										</div>
									</div>
								</a>
				<?php
							}
					}
				?>
			</div>
        </div>
		<div class="espaco-pre-footer"></div>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>