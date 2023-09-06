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
		<section id="titulo" class="container text-center">
				<h1 class="text-primary font-titulo-contatos negrito">Contatos - Resolve Systems</h1>
		</section>
		<section id="banner-top" class="container">
			<div class="row text-center">
				<div class="col-md-8 bg-primary contatos m-auto borda-redonda-40">
					<div class="text-light pb-2">
						<span class="fasthand">Copyright </span>
						<img class="pb-1" src="img/icones/copyright.png" alt="copyright" width="30" />
						<span class="negrito">
							Resolve Systems 2020-2023. Todos os direitos registrados.
						</span>
					</div>
					<div class="row p-2">
						<div class="col-md-8 m-auto bg-light borda-redonda-20 text-center rodape-index">
							<div class="row">
								<div class="col-md-10 m-auto p-2">
									<a href="tel:5132080142" class="font-link-telefone-contatos link-no-line" title="Telefone fixo?" target="_blank">
										<img src="img/icones/telefone-fixo2.png" alt="Telefone" width="25">
										<span class="negrito ml-2">(51) 3208 0142</span>
									</a>
									<div class="separador-telefone-contato"></div>
									<a href="https://wa.me/5551998694945" class="font-link-telefone-contatos link-no-line" title="Whatsapp?" target="_blank">
										<img src="img/icones/whatsapp.png" alt="Telefone" width="25">
										<span class="negrito ml-2">(51) 99869 4945</span>
									</a>
									<div class="separador-telefone-contato"></div>
									<a href="mailto:contato@resolvesystems.com.br" class="font-link-telefone-contatos link-no-line" title="Enviar e-mail?" target="_blank">
										<img src="img/icones/e-mail.png" alt="E-mail" width="25">
										<span class="font-size-20 negrito ml-2">contato@resolvesystems.com.br</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="espaco-fale-conosco"></div>
		<section id="fale-conosco" class="container">
			<div class="text-center">
				<h2 class="animate-character-fale-conosco">Fale conosco</h2>
				<div class="row">
					<div class="col-sm-10 m-auto">
						<?php
							if (isset($_SESSION['msgAddMensagem'])) {
								$msgAddMensagem = $_SESSION['msgAddMensagem'];
						?>
								<p class="text-danger text-center mt-1 negrito"><?= $msgAddMensagem ?></p>
						<?php
								unset($_SESSION['msgAddMensagem']);
							} else {
						?>
								<p class="text-primary text-center mt-1 negrito deseja-mensagem">
									Deseja nos deixar uma mensagem?<br />Preencha este formulário abaixo.
								</p>
								<h6 class="text-danger text-center">* Preenchimento obrigatório</h6>
								<form action="systems/controladores/fale_conosco/valida_fale_conosco.php" method="post">
									<div class="row">
										<div class="col-md-9 row m-auto mb-2">
											<div class="col-md-3 form-group label-mensagem">
												<label class="text-danger" for="nome">* </label>
												<label class="text-primary mr-2 negrito" for="nome">Nome: </label>
											</div>
											<div class="col-md-9 mb-2 input-mensagem">
												<input class="form-control border border-primary borda-redonda-10 p-1" type="text input-width" name="nome" id="nome" placeholder="Coloque seu nome aqui..." size="50" required>
											</div>
											<div class="col-md-3 form-group label-mensagem">
												<label class="text-danger" for="email">* </label>
												<label class="text-primary mr-2 negrito" for="email">E-mail: </label>
											</div>
											<div class="col-md-9 mb-2 input-mensagem">
												<input class="form-control border border-primary borda-redonda-10 p-1" type="text input-width" name="email" id="email" placeholder="Coloque seu e-mail aqui..." size="50" required>
											</div>
											<div class="col-md-3 form-group label-mensagem">
												<label class="text-primary mr-2 negrito" for="telefone">Telefone: </label>
											</div>
											<div class="col-md-9 mb-2 input-mensagem">
												<input class="form-control border border-primary borda-redonda-10 p-1" type="text input-width" name="telefone" id="telefone" placeholder="Coloque seu telefone aqui..." size="50">
											</div>
											<div class="col-md-3 form-group label-mensagem">
												<label class="text-primary mr-2 negrito" for="mensagem">Deixe uma mensagem: </label>
											</div>
											<div class="col-md-9 mb-2 input-mensagem">
												<textarea class="form-control border border-primary borda-redonda-10 p-1" name="mensagem" id="mensagem" placeholder="Coloque sua mensagem aqui..." cols="53" maxlength="255" ></textarea>
												<div class="text-danger text-left negrito mt-2" id="caracteres_restantes">255</div>												
											</div>
										</div>
									</div>
									<div class="text-center mt-2">
										<button class="btn btn-lg btn-primary btn-lg" type="submit">Enviar</button>
									</div>
								</form>
						<?php
							}
						?>
					</div>
				</div>
			</div>
		</section>
		<div class="espaco-fale-conosco"></div>
		<section id="encontre" class="container">		
			<div class="text-center">
				<h2 class="animate-character-fale-conosco">Encontre-nos</h2>
				<div class="row">
					<div class="col-md-10 m-auto">
						<div class="row">
							<div class="col-md-5">
								<div class="espaco-endereco-contato"></div>
								<img class="align-self-center" src="img/icones/endereco.png" alt="Endereço:" width="60px">
								<p class="text-center pt-3">Via Dois, 43 - Morro Santana<br />
															Porto Alegre - RS<br />
															CEP: 91.450-400
								</p>
							</div>
							<div class="col-md-1">
								<div class="espaco-seta-endereco-contato"></div>
								<img class="seta-mapa-direita" src="img/icones/seta_direita.png" alt="Por aqui" width="50" />
								<img class="seta-mapa-abaixo" src="img/icones/seta_abaixo.png" alt="Por aqui" width="50" />
							</div>
							<div class="col-md-6 d-flex justify-content-center">
								<div id="mapa" class="d-flex justify-content-center pb-5">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1726.9032761116196!2d-51.12782408538673!3d-30.042407223320396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95197627d25a0fdd%3A0xc728acda6a03e24e!2sVia%20Dois%2C%2043%20-%20Morro%20Santana%2C%20Porto%20Alegre%20-%20RS%2C%2091450-650!5e0!3m2!1spt-BR!2sbr!4v1680792085490!5m2!1spt-BR!2sbr"
											width="310" 
											height="310" 
											style="border:0;" 
											allowfullscreen="" 
											loading="lazy" 
											referrerpolicy="no-referrer-when-downgrade">
									</iframe>							
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="espaco-pre-footer"></div>
		<?php include 'template/js-bootstrap.php';?>
	</body>
</html>