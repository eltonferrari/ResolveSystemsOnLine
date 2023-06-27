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
	echo $imagem_perfil;
	// ===============
        
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
                <div class="col-md-6 text-right">
                    <h2 class="text-primary text-center negrito display-in">Foto atual</h2>    
                    <img src="\<?= $imagem_perfil ?>" alt="Foto Perfil" title="Foto atual">
                </div>
                <div class="col-md-6 text-left">
                    <!-- Upload Image -->
                    <h1> Carregar a foto</h1>
                    <form method="POST" action="../../controladores/pessoas/valida_upload_image.php?id_user=<?= $idUser ?>" enctype="multipart/form-data">
                        Imagem: <input name="arquivo" type="file">
                        <br>
                        <br>                        
                        <input type="submit" value="Cadastrar">
                    </form>
                    <!-- Fim Upload Image -->
                </div>
            </div>
        </section>
        <section class="espaco-pre-footer"></section>
        


        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>