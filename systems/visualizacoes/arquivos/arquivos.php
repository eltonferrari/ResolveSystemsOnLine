<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    
    // MENU
    include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
    $idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
    $nomeMenu = $nomeMenu->getNomeById($idUser);
    $imagem_perfil = new Pessoas();
    $imagem_perfil = $imagem_perfil->getImagemById($idUser);
    // ===============
    $idPessoa = $_GET['id_pessoa'];
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
            <div class="row pt-3">
				<div class="col-md-10 m-auto text-primary text-center pb-1">
                    <img src="../../../img/icones/arquivo_pdf.png" alt="Arquivos" width="80">
                    <h1 class="mt-2 negrito font-size-26">Arquivos</h1>
                    <div class="row">
                        <div class="col-md-5 border border-primary borda-redonda-20">
                            <h2 class="negrito font-size-24">Lista</h2>
                            <hr class="divisor">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 border border-primary borda-redonda-20">
                            <h2 class="negrito font-size-24">Adicionar</h2>
                            <span class="text-danger">Somente arquivos .pdf</span>
                            <hr class="divisor">
                            <form action="../../controladores/arquivos/valida_adiciona_arquivo.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_pessoa" value="<?= $idPessoa ?>">
                                <div class="text-center">
                                    <label for="arquivo" class="drop-container">
                                        <input type="file" id="arquivo" name="arquivo" required>
                                    </label>
                                </div>    
                                <div class="form-group mt-2">
                                    <span class="bg-primary text-light borda-redonda-20 font-size-18 negrito py-1 px-5" for="mensagem">Descrição: </span>
                                    <textarea class="form-control borda-redonda-20 border border-primary p-2 mt-3" 
                                                  id="mensagem" 
                                                  name="descricao" 
                                                  rows="1"
                                                  placeholder="Descreva o arquivo aqui..." 
                                                  maxlength="255"
                                                  required></textarea>
                                </div>
                                <div class="text-danger negrito text-left" id="caracteres_restantes">255</div>
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
            </div>            
        </section>
        <section class="espaco-pre-footer"></section>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>