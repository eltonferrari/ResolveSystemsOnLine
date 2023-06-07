<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/ocorrencias/class_ocorrencias.php';

	// MENU
	include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
	$idUser   = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============

    echo '===== SESSION =====';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
    
    echo '===== GET =====';
	echo '<pre>';
	print_r($_GET);
	echo '</pre>';
    
    $idContrato = $_GET['id_contrato'];
    
    $ocorrencias = new Ocorrencias();
    $ocorrencias = $ocorrencias->getAllOcorrenciasByContrato($idContrato);
    if (!empty($ocorrencias)) {
        foreach ($ocorrencias as $ocorrenc) {
            $idOcorrencia           = $ocorrenc['id'];
            $idContratoOcorrencia   = $ocorrenc['id_contrato'];
            $textoOcorrencia        = $ocorrenc['texto'];
            $createdByOcorrencia    = $ocorrenc['created_by'];
            $createdAtOcorrencia    = $ocorrenc['created_at'];
            $updatedAtOcorrencia    = $ocorrenc['updated_at'];
        }
    }
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
        <header>
            <?php include '../../../template/menu_logado.php';?>
        </header>
        <section class="container">
            <div class="text-center mt-1">
                <img src="../../../img/icones/ocorrencia.png" alt="Contrato" title="Contrato" width="80">
                <h1 class="text-primary text-center mt-3 negrito">Ocorrências</h1>
                <h2 class="text-primary text-center mt-1 negrito font-size-20">Contrato nº <?= $idContrato ?></h2>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 border border-primary borda-redonda-20 text-center mt-1">
                    <h3 class="text-primary text-center mt-3 negrito">Atuais</h3>
                    <hr class="divisor">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 border border-primary borda-redonda-20 text-center mt-1">
                    <h3 class="text-primary text-center mt-3 negrito">Cadastrar</h3>
                    <hr class="divisor">
                    <form action="../../controladores/ocorrencias/valida_ocorrencia.php" method="post">
                        
                    </form>
                </div>            
            </div>
        </section>
        <section class="espaco-pre-footer"></section>
        <footer>
            <?php
                include '../../../template/js-bootstrap.php';
            ?>
        </footer>
    </body>
</html>