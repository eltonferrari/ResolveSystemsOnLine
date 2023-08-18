<?php
    session_start();
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
		<title>RS - Mensagem de Intenção</title>
	</head>
    <body>
        <?php include '../../../template/menu.php'; ?>
        <div class="container">
            <h3 class="text-primary text-center mt-5 negrito">Fale conosco</h3>
            <?php
                if (isset($_SESSION['msgAddMensagem'])) {
                    $msgAddMensagem = $_SESSION['msgAddMensagem'];
            ?>
                    <p class="text-danger text-center mt-1 negrito"><?= $msgAddMensagem ?></p>
            <?php
                    unset($_SESSION['msgAddMensagem']);
                } 
            ?>
            <div class="row">
                <div class="col-md-4 m-auto">
                    <a href="../../../index.php" class="btn btn-outline-primary btn-block">Voltar para página inicial</a>
                </div>
            </div>
            <div class="espaco-pre-footer"></div>
            <?php include '../../../template/js-bootstrap.php'; ?>
        </div>
    </body>
</html>