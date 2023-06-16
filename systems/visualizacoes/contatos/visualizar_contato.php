<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    include '../../controladores/contatos/class_contatos.php';
    include '../../lib/util.php';

    // MENU
	include '../../controladores/pessoas/class_pessoas.php';  
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
    date_default_timezone_set('America/Sao_Paulo');
    
    $idContato = $_GET['id_contato'];
    $contato = new Contatos();
    $contato = $contato->getContatoById($idContato);
    foreach ($contato as $c) {
        $id        = $c['id'];
        $nome      = $c['nome'];
        $email     = $c['email'];
        $telefone = $c['telefone'];
        $descricao = $c['descricao'];
        $alteracao = $c['updated_at'];
        $alteracao = convertDataMySQL_DataPHP($alteracao);
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
            <div class="pt-3">
                <div class="text-center">
                    <img src="../../../img/icones/contatos.png" alt="Home" width="80">
                    <br />
                    <h1 class="text-primary text-center mt-1 negrito display-in">
                        Visualizar Contato
                    </h1>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 border border-primary borda-redonda-20">
                    <form action="../../controladores/contatos/valida_contato.php" method="post">
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-light borda-redonda-10-left font-size-20 negrito p-1">Nome: </span>
                            </div>
                            <input class="form-control font-size-19 negrito border border-primary borda-redonda-10-right p-1" type="text" name="nome" value="<?= $nome ?>" />
                        </div>
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-light borda-redonda-10-left font-size-20 negrito p-1">E-Mail: </span>
                            </div>
                            <input class="form-control font-size-19 negrito border border-primary borda-redonda-10-right p-1" type="email" name="email" value="<?= $email ?>" />
                        </div>
                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-light borda-redonda-10-left font-size-20 negrito p-1">Telefone: </span>
                            </div>
                            <input class="font-size-19 negrito border border-primary borda-redonda-10-right p-1" type="tel" id="telefone" onkeyup="mascaraFone(event)" name="telefone" value="<?= $telefone ?>"/>
                        </div>
                        <div class="form-group mt-3">
                            <div class="input-group-prepend text-center">
                                <span class="bg-primary text-light borda-redonda-10 font-size-20 negrito py-1 px-5" for="mensagem">Descrição: </span>
                            </div>
                            <textarea class="font-size-19 negrito border border-primary borda-redonda-10 mt-3 p-2" 
                                      id="mensagem"
                                      name="descricao" 
                                      rows="1"
                                      cols="44"
                                      maxlength="50"><?= $descricao ?></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 border border-primary borda-redonda-20">
                    <div class="text-center mt-1">
                        <img src="../../../img/icones/ocorrencia.png" alt="Ocorrências" width="40">
                        <br />
                        <h2 class="text-primary text-center negrito display-in">
                            Ocorrências
                            <a class="link-no-line negrito" href="cadastra_ocorrencia_contato.php" title="Adicionar Ocorrência"> + </a>
				
                        </h2>
                    </div>
                    <hr class="divisor">
                    








                </div>
            </div>
        </section>
        <section class="pre-footer"></section>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>