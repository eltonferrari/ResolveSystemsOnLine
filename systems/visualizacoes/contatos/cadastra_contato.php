<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    include '../../controladores/tipos/class_tipos.php';
    include '../../controladores/sexos/class_sexos.php';
    include '../../controladores/estados/class_estados.php';
    include '../../lib/util.php';
    
    // MENU
	include '../../controladores/pessoas/class_pessoas.php';  
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
    
    if (isset($_SESSION['msgContato'])) {
		$msgContato = $_SESSION['msgContato'];
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
		<title>RS - Resolve Systems</title>
	</head>
    <body>
        <header>
            <?php include '../../../template/menu_logado.php'; ?>
        </header>
        <section class="container mb-5">    
            <div class="row pb-1">
				<div class="col-md-5 m-auto pt-3">
                    <div class="text-center">
                        <img src="../../../img/icones/contatos.png" alt="Home" width="80">
                        <br />
                        <h1 class="text-primary text-center mt-1 pl-4 negrito display-in">Novo Contato</h1>
                        <?php 
                            if (isset($_SESSION['msgContato'])) {
                        ?>		
                                <div class="text-center text-danger negrito my-2"><?= $msgContato ?></div>
                        <?php
                                unset($_SESSION['msgContato']);
                            }
                        ?>
                        <form action="../../controladores/contatos/valida_contato.php" method="post">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-light borda-redonda-10-left font-size-20 negrito p-1">Nome: </span>
                                </div>
                                <input class="form-control font-size-19 negrito border border-primary borda-redonda-10-right p-1" type="text" name="nome" placeholder="Nome..." />
                            </div>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-light borda-redonda-10-left font-size-20 negrito p-1">E-Mail: </span>
                                </div>
                                <input class="form-control font-size-19 negrito border border-primary borda-redonda-10-right p-1" type="email" name="email" placeholder="E-Mail..." />
                            </div>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-light borda-redonda-10-left font-size-20 negrito p-1">Telefone: </span>
                                </div>
                                <input class="font-size-19 negrito border border-primary borda-redonda-10-right p-1" type="tel" id="telefone" onkeyup="mascaraFone(event)" name="telefone" />
                            </div>
                            <div class="form-group">
                                <label class="text-primary negrito" for="mensagem">Descrição: </label>
                                <textarea class="form-control borda-redonda-20 border border-primary p-2" 
                                        id="mensagem"
                                        name="descricao" 
                                        rows="1"
                                        maxlength="50"></textarea>
                            </div>
                            <div class="buttons">
                                <button class="blob-btn" type="submit">
                                    Salvar
                                    <span class="blob-btn__inner">
                                        <span class="blob-btn__blobs">
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                        </span>
                                    </span>
                                </button>
                                <br/>
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                    <defs>
                                        <filter id="goo">
                                            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
                                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo"></feColorMatrix>
                                            <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>
        <section class="pre-footer"></section>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>