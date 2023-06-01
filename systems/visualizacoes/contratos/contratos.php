<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/contratos/class_contratos.php';
	// MENU
	include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
	$contratosAbertos = new Contratos();
	$contratosAbertos = $contratosAbertos->getAllContratosAbertos();
	
	echo '===== CONTRATOS ABERTOS =====';
	echo '<pre>';
	print_r($contratosAbertos);
	echo '</pre>';

	$contratosTerminados = new Contratos();
	$contratosTerminados = $contratosTerminados->getAllContratosTerminados();

	echo '===== CONTRATOS TERMINADOS =====';
	echo '<pre>';
	print_r($contratosTerminados);
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
        <?php include '../../../template/menu_logado.php';?>
        <div class="container">
            <div class="text-center mt-3">
                <img src="../../../img/icones/contrato.png" alt="Contrato" title="Contrato" width="80">
                <h1 class="text-primary text-center mt-3 negrito">Contratos<a class="link-no-line negrito" href="cadastra_contrato.php"> + </a></h1>
            </div>
            <div class="row">
				<div class="col-md-6">
					<h2 class="text-primary text-center negrito">Contratos em aberto</h2>
					<div class="row">
						<div class="col-md-8">
							<h5 class="text-primary negrito">Cliente</h5>
						</div>
						<div class="col-md-4">
						<h5 class="text-primary text-center negrito">Contrato</h5>
						</div>
					</div>
					<?php
						foreach ($contratosAbertos as $aberto) {
							$nomeContratoA = $aberto['nome'];
							$idContratoA = $aberto['id'];						
					?>
							<div class="row">
								<div class="col-md-8">
									<h5><?= $nomeContratoA ?></h5s=>
								</div>
								<div class="col-md-4">
									<h5 class="text-center"><a href="ver_contrato.php?id_contrato=<?= $idContratoA ?>"><?= $idContratoA ?></a></h5>
								</div>
							</div>
					<?php
						}
					?>
				</div>
				<div class="col-md-6">
					<h2 class="text-primary text-center negrito">Contratos fechados</h2>
					<div class="row">
						<div class="col-md-8">
							<h5 class="text-primary negrito">Cliente</h5>
						</div>
						<div class="col-md-4">
						<h5 class="text-primary text-center negrito">Contrato</h5>
						</div>
					</div>
					<?php
						foreach ($contratosTerminados as $terminado) {
							$nomeContratoT = $terminado['nome'];
							$idContratoT = $terminado['id'];						
					?>
							<div class="row">
								<div class="col-md-8">
									<h5><?= $nomeContratoT ?></h5s=>
								</div>
								<div class="col-md-4">
									<h5 class="text-center"><a href="ver_contrato.php?id_contrato=<?= $idContratoT?>"><?= $idContratoT ?></a></h5>
								</div>
							</div>
					<?php
						}
					?>
				</div>
			</div>
        </div>
        <?php
            include '../../../template/js-bootstrap.php'; 
		?>	
    </body>
</html>