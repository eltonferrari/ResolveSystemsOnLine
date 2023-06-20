<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/autenticacao/validador_de_acesso_adm.php';
	include '../../controladores/status/class_status.php';

	// MENU
	include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
	
	$msgStatusNovo = null;
	if (isset($_SESSION['msgStatusNovo'])) {
		$msgStatusNovo = $_SESSION['msgStatusNovo'];
	}

	$msgStatusAlterado = null;
	if (isset($_SESSION['msgStatusAlterado'])) {
		$msgStatusAlterado = $_SESSION['msgStatusAlterado'];
	}

	$msgStatusApagado = null;
	if (isset($_SESSION['msgStatusApagado'])) {
		$msgStatusApagado = $_SESSION['msgStatusApagado'];
	}
	
	$listaStatus = new Status();
	$listaStatus = $listaStatus->getAllStatus();
	$listaOrdenada = [];
	$listaDesordenada = new Status();
	$listaOrdenada = $listaDesordenada->ordenaLista($listaStatus);
?>
<!doctype html>
<html lang="pt-br">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- COMPATIBILIDADE COM HTML5 -->
		<!--[if lt IE 9]>
			<script src="../../../../js/html5shiv.js"></script>
		<![endif]-->
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'G-2XS66KFNYE');
		</script>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../../assets/Bootstrap4/css/bootstrap.min.css">

		<!-- NORMALIZE CSS -->
		<link   rel="stylesheet" type="text/css" href="../../../assets/css/normalize.css">

		<!-- CSS CUSTOMIZADO -->
		<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
		<link rel="icon" href="../../../img/logos/logo.png" type="image/x-icon">
		<title>RS - Resolve Systems</title>
	</head>
    <body>
		<header>
			<?php include '../../../template/menu_logado.php';?>
		</header>
        <section class="container">
			<div class="text-center mt-2">
				<img src="../../../img/icones/status.png" alt="Home" width="80">
                <h2 class="text-primary negrito">Status</h2>
			</div>
            <div class="row">
                <div class="col-md-8 mt-1">
                    <h3 class="text-primary text-center mt-3 negrito">Lista</h3>
					<h6 class="text-danger text-center mt-3 negrito"><?= $msgStatusAlterado ?></h6>
					<?php
						unset($_SESSION['msgStatusAlterado']);
					?>
					<h6 class="text-danger text-center mt-3 negrito"><?= $msgStatusApagado ?></h6>
					<?php
						unset($_SESSION['msgStatusApagado']);
					?>
					<div class="row">
						<div class="col-md-4 text-primary negrito">Nome:</div>
						<div class="col-md-8 text-primary negrito">Descrição:</div>
					</div>
					<?php
						foreach ($listaOrdenada as $status) {
							$id = $status['id'];
							$nome = $status['nome'];
							$descricao = $status['descricao'];
					?>
						<div class="row">
							<div class="col-md-3 border py-1"><?= $nome ?></div>
							<div class="col-md-7 border py-1"><?= $descricao ?></div>
							<div class="col-md-1 mx-auto my-auto d-flex justify-content-center flex-wrap">
								<a href="altera_status.php?id=<?= $id ?>">
									<img src="../../../img/icones/editar.png" alt="editar" title="Editar nome e descrição deste Status" width="20">
								</a>
							</div>
							<div class="col-md-1 mx-auto my-auto d-flex justify-content-center flex-wrap">
								<a href="apaga_status.php?id=<?= $id ?>">
									<img src="../../../img/icones/lixeira-vermelha.png" alt="apagar" title="Apagar este Status" width="25">
								</a>								
							</div>
						</div>
					<?php
						}
					?>
                </div>
				<div class="col-md-1 mt-1"></div>
                <div class="col-md-3 mt-1">
                    <h3 class="text-primary text-center mt-3 negrito">Adicionar</h3>
					<h6 class="text-danger text-center mt-3 negrito"><?= $msgStatusNovo ?></h6>
					<?php
						unset($_SESSION['msgStatusNovo']);
					?>
                    <form action="../../controladores/status/valida_status.php" method="post">
						<div class="text-center">
							<input class="borda-redonda-10 font-size-20 border-primary text-center my-1 py-1" type="text" name="nome" placeholder="Digite aqui o status..." required>
							<br />
							<input class="borda-redonda-10 font-size-20 border-primary text-center my-1  py-1" type="text" name="descricao" placeholder="Digite aqui a descrição..." required>
							<br />
							<div class="mb-2">
								<div class="input-group-prepend my-1">
									<span class="input-group-text bg-primary text-light borda-redonda-20-left">Anterior: </span>
									<select class="form-control borda-redonda-20-right" id="anterior" name="anterior">
										<option value=0>Selecione...</option>
										<?php
											foreach ($listaOrdenada as $anterior) {
												$idAnterior = $anterior['id'];
												$nomeAnterior = $anterior['nome'];											
										?>
												<option value="<?= $idAnterior ?>"><?= $nomeAnterior ?></option>
										<?php
											}
										?>
									</select>
								</div>
								<div class="input-group-prepend my-1">
									<span class="input-group-text bg-primary text-light borda-redonda-20-left">Próximo: </span>
									<select class="form-control borda-redonda-20-right" id="proximo" name="proximo">
										<option value=0>Selecione...</option>
										<?php
											foreach ($listaOrdenada as $proximo) {
												$idProximo = $proximo['id'];
												$nomeProximo = $proximo['nome'];											
										?>
												<option value="<?= $idProximo ?>"><?= $nomeProximo ?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							<button class="bg-primary text-light borda-redonda-20 text-center my-1 px-5 py-2" type="submit">Salvar</button>
						</div>
					</form>
                </div>
            </div>			
        </section>
		<div class="espaco-pre-footer"></div>
		<?php
			include '../../../template/js-bootstrap.php'; 
		?>	
    </body>
</html>