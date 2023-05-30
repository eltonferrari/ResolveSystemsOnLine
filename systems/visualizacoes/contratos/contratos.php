<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	// MENU
	include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============	
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
				</div>
				<div class="col-md-6">
					<h2 class="text-primary text-center negrito">Contratos fechados</h2>
				</div>
			</div>
        </div>
        <?php
            include '../../../template/js-bootstrap.php'; 
		?>	
    </body>
</html>