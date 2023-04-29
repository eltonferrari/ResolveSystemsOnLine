<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/fale_conosco/class_fale_conosco.php';
	echo '===== SESSION =====';
	echo '<pre>';
        print_r($_SESSION);
    echo '</pre>';
    $id = $_GET['mensagem'];
	$mensagem = new FaleConosco();
	$mensagem = $mensagem->getIntencaoById($id);
	echo '===== MENSAGEM - BANCO =====';
	echo '<pre>';
        print_r($mensagem);
    echo '</pre>';
	foreach ($mensagem as $m) {
		$id			  = $m['id'];
		$nome		  = $m['nome'];
		$email		  = $m['email'];
		$telefone	  = $m['telefone'];
		$mensagem	  = $m['mensagem'];
		$visibilidade = $m['visibilidade'];
		$criacao 	  = $m['created_at'];
		$alteracao 	  = $m['updated_at'];
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
			<div class="row">
				<div class="col-md-6 m-auto font-size-20">
					<div class="mt-3">
						<h4 class="text-light text-center bg-primary borda-redonda-20 negrito">
							Mensagem
						</h4>
					</div>
					<div>
						<div class="border border-primary px-2">
							<div class="float-left">
								<span class="negrito">Id: </span>
								<span class="pr-5"><?= $id ?></span>
							</div>
							<div class="float-right">
								<span class="negrito">Nome: </span>
								<span><?= $nome ?></span>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="border border-primary px-2">
							<div class="float-left">
								<span class="negrito">E-mail: </span>
								<span class="pr-5"><?= $email ?></span>
							</div>
							<div class="float-right">
								<span class="negrito pl-5">Telefone: </span>
								<span><?= $telefone ?></span>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="border border-primary px-2">
							<span class="negrito">Mensagem: </span><br />
							<p class="recuo-primeira-linha text-justify"><?= $mensagem ?></p>
						</div>
						<div class="clearfix"></div>
						<div class="text-center py-2">
							<span class="negrito">Marcar como lido? </span>
							<input type="checkbox" name="lido" id="lido" value="<?= $visibilidade ?>">
						</div>
						<div class="clearfix"></div>
						<div class="border border-primary px-2 font-size-15">
							<div class="float-left">
								<span class="negrito">Criação: </span><span><?= $criacao ?></span>
							</div>
							<div class="float-right">
								<span class="negrito">Alteração: </span><span><?= $alteracao ?></span>
							</div>
						</div>								
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