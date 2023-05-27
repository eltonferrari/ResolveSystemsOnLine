<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    include '../../controladores/status/class_status.php';
    // MENU
    include '../../controladores/pessoas/class_pessoas.php';
    $tipoUser = $_SESSION['tipo'];
    $idUser = $_SESSION['id_logado'];
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

    $id = $_GET['id'];
    $status = new Status();
    $status = $status->getStatusById($id);
    foreach ($status as $s) {
        $id = $s['id'];
        $nome = $s['nome'];
        $descricao = $s['descricao'];
    }
    echo '===== ARRAY STATUS =====';
    echo '<pre>';
    print_r($status);
    echo '</pre>';
    
    echo "ID: $id <br />";
    echo "Nome: $nome <br />";
    echo "Descrição: $descricao <br />";
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
			<div class="text-center mt-3">
				<img src="../../../img/icones/status.png" alt="Home" width="80">
                <h2 class="text-primary negrito mt-2">Alterar Status</h2>
			</div>
            <div class="row mt-3">
                <div class="col-md-6 m-auto">
                    <form class="text-center" action="../../controladores/status/valida_altera_status.php" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input class="form-control borda-redonda-20 text-center mt-1" type="text" name="nome" value="<?= $nome ?>" required>
                        <br />
                        <input class="form-control borda-redonda-20 text-center mb-2" type="text" name="descricao" value="<?= $descricao ?>" required>
                        <br />
                        <input class="btn btn-primary" type="submit" value="Salvar">
                    </form>
                </div>
            </div>
			<?php
				include '../../../template/js-bootstrap.php'; 
			?>	
        </div>
    </body>
</html>