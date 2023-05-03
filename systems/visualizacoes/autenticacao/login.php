<?php
    session_start();
?>
<!doctype html>
<html lang="pt-br">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-2XS66KFNYE');
		</script>

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
        <?php include '../../../template/menu.php';?>
        <div class="container">    
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="card-login col-sm-6 pt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Entrar</h3>
                        </div>
                        <div class="card-body">
                            <form action="../../controladores/autenticacao/valida_login.php" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                                </div>
                                    <?php 
                                        if (isset($_SESSION['mensagem'])) {
                                    ?>
                                            <div class="text-danger text-center pb-3">
                                                <?= $_SESSION['mensagem'] ?>
                                                <br />
                                            </div>
                                    <?php
                                        unset($_SESSION['mensagem']);
                                        }
                                    ?>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>