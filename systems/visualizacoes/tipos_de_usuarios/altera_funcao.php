<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/tipos/class_tipos.php';
    include '../../controladores/pessoas/class_pessoas.php';
    /*
    echo '===== SESSION =====<br />';
	echo '<pre>';
        print_r($_SESSION);
    echo '</pre>';

    echo '===== GET =====<br />';
    echo '<pre>';
        print_r($_GET);
    echo '</pre>';
    */
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

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../../assets/Bootstrap4/css/bootstrap.min.css">

		<!-- NORMALIZE CSS -->
		<link   rel="stylesheet" type="text/css" href="../../../css/normalize.css">

		<!-- CSS CUSTOMIZADO -->
		<link rel="stylesheet" type="text/css" href="../../../css/style.css">

		<title>RS - Resolve Systems</title>
	</head>
    <body>
        <?php include '../../../template/menu.php';?>
        <div class="container">    
            <h3 class="text-center text-success mt-5">Alterar tipo de usuário</h3>
                <form action="../../controladores/tipos/valida_tipo.php" method="post" name="form_altera_tipo">
                    <div class="row mt-5">
                        <div class="col-md-10 m-auto">
                            <div class="row">
                                <div class="col-md-2 mt-2">
                                    <span class="bg-success text-light p-2 borda-redonda-10">Id: <?= $idTipo ?></span>                    
                                    <input type="hidden" name="id" value="<?= $idTipo ?>"></input>
                                </div>
                                <div class="col-md-4 input-group-prepend">
                                    <label class="input-group-text bg-success text-light mr-1" for="nome">Função: </label>
                                    <input class="form-control" type="text" id="nome" name="nome" value="<?= $nome ?>">
                                </div>
                                <div class="col-md-6 input-group-prepend">
                                    <label class="input-group-text bg-success text-light mr-1" for="descricao">Descrição: </label>
                                    <input class="form-control" type="text" name="descricao" id="descricao" value="<?= $descricao ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-4 text-center m-auto">
                                    <div class="mt-5">
                                        <button type="submit" class="btn btn-success btn-lg borda-redonda-20 text-size-button">Salvar</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </form>
        </div>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>