<?php 
	session_start();
?>
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
            <div class="row">
                <div class="col-10 m-auto">
                    <div class="row">
                        <div class="col-2 align-self-center text-right">
                            <img class="img-fluid" src="\img/icones/sustentabilidade.png" alt="sustentabilidade" width="60">
                        </div>
                        <div class="col-8">
                            <h1 class="text-primary font-titulo-contatos negrito">Sustentabilidade</h1>
                        </div>
                        <div class="col-2 align-self-center text-left">
                            <img class="img-fluid" src="\img/icones/sustentabilidade.png" alt="sustentabilidade" width="60">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="texto" class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <p class="recuo-primeira-linha font-size-20 justificado">
                        Desenvolvimento sustentável é o desenvolvimento capaz de suprir
                         as necessidades da geração atual, garantindo a capacidade de
                          atender as necessidades das futuras gerações. É o
                           desenvolvimento que não esgota os recursos para o futuro.
                    </p>
                    <p class="recuo-primeira-linha font-size-20 justificado">
                        Essa definição surgiu na Comissão Mundial sobre Meio Ambiente e
                         Desenvolvimento, criada pelas Nações Unidas para discutir e
                          propor meios de harmonizar dois objetivos: o desenvolvimento
                           econômico e a conservação ambiental.
                    </p>
                    <p class="recuo-primeira-linha font-size-20 justificado">
                        Nos últimos anos, práticas de responsabilidade social
                         corporativa tornaram-se parte da estratégia de um número
                          crescente de empresas, cientes da necessária relação entre
                           retorno econômico, ações sociais e conservação da natureza e,
                            portanto, do claro vínculo que une a própria prosperidade
                             com o estado da saúde ambiental e o bem-estar coletivo da
                              sociedade.
                    </p>
                    <p class="recuo-primeira-linha font-size-20 justificado">
                        É cada vez mais importante que as empresas tenham consciência de
                         que são parte integrante do mundo e não consumidoras do mundo.
                          O reconhecimento de que os recursos naturais são finitos e de
                           que nós dependemos destes para a sobrevivência humana, para a
                            conservação da diversidade biológica e para o próprio
                             crescimento econômico é fundamental para o desenvolvimento
                              sustentável, o qual sugere a utilização dos recursos
                               naturais com qualidade e não em quantidade.
                    </p>
                    <p class="recuo-primeira-linha font-size-20 justificado">
                        O consumidor é cada vez mais consciente do peso ecológico e
                         social de suas próprias escolhas. Assim, para a empresa
                          garantir a satisfação dos consumidores ela terá, cada vez mais,
                           que fornecer respostas coerentes a estes assuntos,
                            reconhecendo a crescente sensibilidade do mercado às
                             temáticas como a sustentabilidade e empenhando-se a atingir
                              resultados positivos a favor do ambiente.
                    </p>
                    <p class="recuo-primeira-linha font-size-20 justificado">
                        Empresas que queiram manter a competitividade ao longo prazo
                         devem, portanto, responder às expectativas dos
                          cidadãos-consumidores, valorizando o comportamento
                           responsável.
                    </p>
                </div>
            </div>
        </section>
        <section id="fonte" class="container">
            <div class="row">
                <div class="col-md-10 m-auto text-right">
                    <hr />
                    <a href="https://www.wwf.org.br/participe/porque_participar/sustentabilidade/#:~:text=%C3%89%20o%20desenvolvimento%20que%20n%C3%A3o,econ%C3%B4mico%20e%20a%20conserva%C3%A7%C3%A3o%20ambiental.">
                        www.wwf.org.br
                    </a>
                </div>
            </div>
        </section>
        <div class="voltar-topo-pre"></div>
        <section id="texto" class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <p class="recuo-primeira-linha font-size-22 justificado">
                        Para a <strong>Resolve Systems</strong> a colaboração e as
                         parcerias, públicas e privadas, representam um pressuposto
                          essencial para um futuro sustentável, ajudando, desta
                           forma, a trazer o conceito de sustentabilidade da teoria
                            para a prática.
                    </p>
        </section>
        <div class="voltar-topo-pre"></div>
		<div class="text-center voltar-topo">
			<a href='#topo'>
				<img class="voltar-topo" src="img/icones/voltar_topo.png" alt="topo" width="30" title="Voltar ao topo">
			</a>
		</div>
		<?php include 'template/js-bootstrap.php'; ?>
	</body>
</html>