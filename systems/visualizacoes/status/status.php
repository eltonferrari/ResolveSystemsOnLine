<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	
    echo '===== SESSION =====';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

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

		<title>RS - Resolve Systems</title>
	</head>
    <body>
        <?php include '../../../template/menu_logado.php';?>
        <div class="container">
			<div class="text-center mt-5">
				<img src="../../../img/icones/status.png" alt="Home" width="80">
                <h2 class="text-primary negrito">Status</h2>
			</div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-primary text-center mt-3 negrito">Lista</h3>
					<h4 class="borda-redonda-20 font-size-20 border border-primary my-1"><?= $status ?></h4>
                </div>
                <div class="col-md-6">
                    <h3 class="text-primary text-center mt-3 negrito">Adicionar</h3>
                    <form action="../../controladores/status/valida_status.php" method="post">
						<div class="text-center">
							<input class="borda-redonda-10 font-size-20 border-primary text-center my-1 py-1" type="text" name="nome" placeholder="Digite aqui o status..." required>
							<br />
							<input class="borda-redonda-10 font-size-20 border-primary text-center my-1  py-1" type="text" name="descricao" placeholder="Digite aqui a descrição..." required>
							<br />
							
							<button class="bg-primary text-light borda-redonda-20 text-center my-1 px-5 py-2" type="submit">Salvar</button>
						</div>
					</form>
                </div>
            </div>
			<div class="espaco-pre-footer"></div>
			<?php
				include '../../../template/js-bootstrap.php'; 
			?>	
        </div>
    </body>
</html>