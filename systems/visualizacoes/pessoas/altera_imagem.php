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
    $idPessoa = $_GET['user'];   
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
            <h1 class="text-primary text-center negrito">Alterar foto do perfil</h1>
            <div class="row">
                <div class="col-md-6 text-right border-right border-primary pr-2">
                    <h2 class="text-primary negrito">Foto atual</h2>    
                    <img class="pr-4" src="\<?= $imagem_perfil ?>" alt="Foto Perfil" title="Foto atual" width="100">
                </div>
                <div class="col-md-6 text-left">
                    <!-- Upload Image -->
                    <h2 class="text-primary negrito"> Carregar nova foto</h2>
                    <form method="POST" action="../../controladores/pessoas/valida_upload_image.php" enctype="multipart/form-data">
                        <input type="hidden" name="id_pessoa" value="<?= $idPessoa ?>">
                        <div>
                            <label class="file" for="img-input">Buscar</label>    
                            <input id="img-input" type="file" name="imagem">
                        </div>
                        <div id="img-container">
                            <img id="preview" src="" width="100">
                        </div>
                        <div class="buttons text-left">
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
                    <!-- Fim Upload Image -->
                </div>
            </div>
        </section>
        <div class="espaco-pre-footer"></div>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
        <script>
            // Preview de imagem
            function readImage() {
                if (this.files && this.files[0]) {
                    var file = new FileReader();
                    file.onload = function(e) {
                        document.getElementById("preview").src = e.target.result;
                    };       
                    file.readAsDataURL(this.files[0]);
                }
            }
            document.getElementById("img-input").addEventListener("change", readImage, false);
        </script>
    </body>
</html>