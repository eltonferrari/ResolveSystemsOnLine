<!doctype html>
<html lang="pt-br">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-2XS66KFNYE"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'G-2XS66KFNYE');
		</script>
		<!-- COMPATIBILIDADE COM HTML5 -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
		<![endif]-->

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/Bootstrap4/css/bootstrap.min.css">

		<!-- NORMALIZE CSS -->
		<link   rel="stylesheet" type="text/css" href="assets/css/normalize.css">

		<!-- CSS CUSTOMIZADO -->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="icon" href="img/logos/logo.png" type="image/x-icon">
		<title>RS - Resolve Systems</title>
	</head>
	<body>
		<header>
			<?php include 'template/menu.php';?>
		</header>
		<section class="container">
			<div id="titulo" class="text-center">
				<h1 class="text-primary font-size-48 negrito">Portfólio</h1>
			</div>
			<hr class="divisor">
			<a class="link-no-line" href="https://carroantigo.000webhostapp.com/" target="_blank">
				<h2 class="text-center text-primary display-in">
					<img src="img/logos/antigomobilista_logo.png" alt="Em construção" width="40" />
					Antigomobilista
				</h2>
				<p class="display-in">Rede social feita para quem gosta de carros antigos</p>
				<img src="img/icones/Under_construction_icon.png" alt="Em construção" width="60" />
				<p class="display-in">Em construção</p>
			</a>
			<br />
			<div class="row">
				<div class="col-md-4 img-responsive">
					<img class="img-fluid" src="img/portifolio/antigomobilista/print-home-antigomobilista.png" alt="Print Home Antigomobilista" />
				</div>
				<div class="col-md-4">
					<img class="img-fluid" src="img/portifolio/antigomobilista/print-login-antigomobilista.png" alt="Print Login Antigomobilista" />
				</div>
				<div class="col-md-4">
					<img class="img-fluid" src="img/portifolio/antigomobilista/print-registro-antigomobilista.png" alt="Print Registro Antigomobilista" />
				</div>
			</div>		
			<hr class="divisor">
		</section>		
		<div class="espaco-pre-footer"></div>					
		<?php include 'template/js-bootstrap.php';?>
	</body>    
</html>