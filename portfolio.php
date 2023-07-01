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
	<body class="bg-light">
		<?php include 'template/menu.php';?>
		<div class="container conteudo">
			<div class="d-flex justify-content-center">
				<h2 class="text-primary">Portfólio</h2>
			</div>
			<hr class="divisor">
			<div class="row">
				<div class="col-md-6 m-auto text-center py-3">
					<a class="link-no-line" href="https://carroantigo.000webhostapp.com/" target="_blank">
						<h5 class="text-center text-primary">
							<img src="img/logos/antigomobilista_logo.png" alt="Em construção" width="40">
							Antigomobilista
							<img src="img/logos/antigomobilista_logo_invertido.png" alt="Em construção" width="40">
						</h5>
						<button class="btn btn-primary">Ir para Site Antigomobilista</button>
						<h5 class="text-center text-light bg-dark py-1 mt-1 borda-redonda-20">
							Rede social feita para quem gosta de carros antigos
							<img src="img/icones/Under_construction_icon.png" alt="Em construção" width="40">
						</h5>
					</a>
				</div>
			</div>
			<hr class="divisor">
			<h3 class="text-primary text-center">Modelos</h3>
			<div class="row">
				<div class="col-md-6 text-center py-3">
					<a class="link-no-line" href="https://formaturaads2022.000webhostapp.com/" target="_blank">
						<h5 class="text-center text-primary">
							<img src="img/icones/papiro.png" alt="Formatura" width="40">
							Formatura
							<img src="img/icones/papiro.png" alt="Formatura" width="40">
						</h5>
						<button class="btn btn-primary">Ir para site de Formatura</button>
					</a>
				</div>
				<div class="col-md-6 text-center py-3">
					<h5 class="text-center text-primary">Casamento</h5>
					<a href="portfolio/casamento.html" class="btn btn-primary">Ir para modelo de Casamento</a>					
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 text-center pt-3 pb-5">
					<h5 class="text-center text-primary">Aniversário</h5>
					<a href="portfolio/aniversario.html" class="btn btn-primary">Ir para modelo de Aniversário</a>					
				</div>
				<div class="col-md-6 text-center pt-3 pb-5">
					<h5 class="text-center text-primary">Time de Futebol</h5>
					<a href="portfolio/time.html" class="btn btn-primary">Ir para modelo de Time de Futebol</a>					
				</div>
			</div>
		</div>			
		<?php include 'template/js-bootstrap.php';?>
	</body>    
</html>