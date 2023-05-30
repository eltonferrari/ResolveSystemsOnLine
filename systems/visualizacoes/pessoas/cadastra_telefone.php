<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    // MENU
	include '../../controladores/pessoas/class_pessoas.php';  
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
        
    $perfil = new Pessoas();
    $idAlterar = $_GET['id_perfil'];
    $nomePerfil = $perfil->getNomeById($idAlterar);
    $telefonesPerfil = new Pessoas();
    $telefonesPerfil = $perfil->getTelefonesById($idAlterar);
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
        <?php include '../../../template/menu_logado.php';?>
        <div class="container">
            <div class="text-center mt-5">
                <h3 class="text-primary negrito mt-5">Números de telefone</h3>
                <h5 class="text-primary negrito pt-3"><?= $nomePerfil ?></h5>
            </div>
            <div class="row">
                <div class="col-md-6 mt-5">
                    <h4 class="text-primary text-center mb-5">Atualmente</h4>
                    <?php
                        if (isset($telefonesPerfil)) {
                            foreach ($telefonesPerfil as $telefones) {
                                $telefone = $telefones['telefone'];
                                $principal = $telefones['principal'];
                                if ($principal == 1) {
                                    $itemLista = "<strong>$telefone</strong> - Telefone principal";
                                } else {
                                    $itemLista = $telefone;
                                }
                    ?>
                                <p><?= $itemLista ?></p>
                    <?php        
                            }
                        }
                    ?>
                </div>
                <div class="col-md-6 mt-5">
                    <h4 class="text-primary text-center mb-5">Adicionar novo</h4>
                    <form class="text-center" action="../../controladores/pessoas/valida_telefone.php" method="post">
                        <input type="hidden" name="id_perfil" value="<?= $idAlterar ?>">
                        <input class="borda-redonda-10 font-size-20 border-primary py-1" type="telefone" name="telefone" placeholder="Digite aqui o telefone...">
                        <button class="bg-primary text-light borda-redonda-20 px-5 py-2" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 m-auto text-center">
                    <a class="btn btn-primary" href="busca_perfil.php?user=<?= $idAlterar ?>">Voltar para Perfil</a>
                </div>
            </div>
        </div>
        <?php include '../../../template/js-bootstrap.php';?>
    </body>
</html>