<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    include '../../controladores/autenticacao/validador_de_acesso_adm.php';
	include '../../controladores/tipos/class_tipos.php';

    // MENU
	include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
	    
    $id = $_GET['id_tipo'];
    $buscaTipo = new Tipos();
	$buscaTipo = $buscaTipo->getTipoById($id);
    foreach ($buscaTipo as $tipo) {
        $idTipo = $tipo['id'];
        $nome = $tipo['nome'];
        $descricao = $tipo['descricao'];
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
            <?php include '../../../template/menu.php';?>
        </header>
        <section class="container">    
            <h3 class="text-center text-primary mt-5">Alterar tipo de usuário</h3>
            <form action="../../controladores/tipos/valida_tipo.php" method="post" name="form_altera_tipo">
                <div class="row mt-5">
                    <div class="col-md-10 m-auto">
                        <div class="row">
                            <div class="col-md-2 mt-2">
                                <span class="bg-primary text-light p-2 borda-redonda-10">Id: <?= $idTipo ?></span>                    
                                <input type="hidden" name="id" value="<?= $idTipo ?>"></input>
                            </div>
                            <div class="col-md-4 input-group-prepend">
                                <label class="input-group-text bg-primary text-light mr-1" for="nome">Função: </label>
                                <input class="form-control" type="text" id="nome" name="nome" value="<?= $nome ?>">
                            </div>
                            <div class="col-md-6 input-group-prepend">
                                <label class="input-group-text bg-primary text-light mr-1" for="descricao">Descrição: </label>
                                <input class="form-control" type="text" name="descricao" id="descricao" value="<?= $descricao ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-4 text-center m-auto">
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary btn-lg borda-redonda-20 text-size-button">Salvar</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                    
            </form>
        </section>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>