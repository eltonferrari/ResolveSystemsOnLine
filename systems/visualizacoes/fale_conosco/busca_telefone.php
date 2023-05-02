<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/fale_conosco/class_fale_conosco.php';
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
			<div class="row mt-5">
				<div class="col-md-8 mx-auto mt-5">
					<h4 class="text-light bg-primary text-center borda-redonda-20 mb-5 py-2 negrito">
						<img src="../../../img/icones/filtro.png" alt="Filtro" width="40">
						Filtro por telefone
					</h4>
                    <div class="form_busca_nome mt-5">
                        <form action="lista_mensagens.php" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-light bg-primary borda-redonda-20 negrito px-4">
                                        Telefone: 
                                    </span>
                                </div>
                                <input class="form-control borda-redonda-20" type="text" name="telefone" placeholder="Digite o telefone desejado...">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text text-light bg-primary borda-redonda-20-right negrito px-4">
                                        Buscar...
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
        </div>
		<div class="espaco-pre-footer"></div>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>