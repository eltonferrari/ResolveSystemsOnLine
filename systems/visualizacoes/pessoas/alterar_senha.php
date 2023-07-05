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
    $imagem = new Pessoas();
    $imagem = $imagem->getImagemById($idPessoa);
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
        <section class="container text-center my-5">
            <img src="../../../img/icones/senha.png" alt="Arquivos" width="100">   
            <h1 class="text-primary negrito">Alterar senha de usuário</h1>
            <?php
    			if (isset($_SESSION['msgAlteraSenha'])) {
					$msgAlteraSenha = $_SESSION['msgAlteraSenha'];
			?>
					<span class="text-danger">(<?= $msgAlteraSenha ?>)</span>
			<?php 
					unset($_SESSION['msgAlteraSenha']);
				}
						?>
            <div class="row">
                <div class="col-md-6 m-auto pr-2">
                    <form action="../../controladores/autenticacao/valida_alterar_senha.php" method="post">
                        <input type="hidden" name="id_pessoa" value="<?= $idPessoa ?>">
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-light font-size-20 borda-redonda-20-left pl-3 pr-5 py-2 negrito">Senha atual</span>
                            </div>
                            <input class="form-control borda-redonda-20-right font-size-20 px-1 py-2" type="password" name="senha_antiga" id="senha_antiga" placeholder="Digite a senha atual">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-light font-size-20 borda-redonda-20-left pl-3 pr-5 py-2 negrito">Senha nova</span>
                            </div>
                            <input class="form-control borda-redonda-20-right font-size-20 px-1 py-2" type="password" name="senha_nova" id="senha_nova" placeholder="Digite a senha nova">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-light font-size-20 borda-redonda-20-left pl-3 pr-4 py-2 negrito">Repita a senha</span>
                            </div>
                            <input class="form-control borda-redonda-20-right font-size-20 px-1 py-2" type="password" name="retype_senha_nova" id="senha_antiga" placeholder="Repita a senha nova">
                        </div>
                        <div class="buttons text-center">
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
        </section>
        <div class="espaco-pre-footer"></div>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>