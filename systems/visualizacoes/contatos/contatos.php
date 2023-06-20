<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    include '../../controladores/autenticacao/validador_de_acesso_adm.php';
    include '../../controladores/contatos/class_contatos.php';
    include '../../lib/util.php';

    // MENU
	include '../../controladores/pessoas/class_pessoas.php';  
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
    
    $listaContatos = new Contatos();
    $listaContatos = $listaContatos->getAllContatos();
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
                    <h1 class="text-primary text-center mt-1 pl-4 negrito display-in">
                        Contatos
                        <a class="link-no-line negrito" href="cadastra_contato.php"> + </a>
                    </h1>
                </div>
                <div class="lg">
                    <div class="row mt-3">
                        <div class="col-md-2 border border-primary borda-redonda-top-left text-primary text-center p-1 negrito">Nome:</div>
                        <div class="col-md-3 border border-primary text-primary text-center p-1 negrito">E-Mail:</div>
                        <div class="col-md-2 border border-primary text-primary text-center p-1 negrito">Telefone:</div>
                        <div class="col-md-3 border border-primary text-primary text-center p-1 negrito">Descrição:</div>
                        <div class="col-md-1 border border-primary text-primary text-center p-1 negrito">Alterações:</div>
                        <div class="col-md-1 border border-primary borda-redonda-top-right text-primary text-center p-1 negrito">Funções:</div>
                    </div>
                    <?php
                        foreach ($listaContatos as $contato) {
                            $id        = $contato['id'];
                            $nome      = $contato['nome'];
                            $email     = $contato['email'];
                            $telefoneM = $contato['telefone'];
                            $descricao = $contato['descricao'];
                            $alteracao = $contato['updated_at'];
                            $alteracao = convertDataMySQL_DataPHP($alteracao);
                            $telefone = convertMascaraTelefone_Numero($telefoneM);
                    ?>
                            
                            <div class="row">
                                <div class="col-md-2 border border-primary p-1">
                                    <?= $nome ?>
                                </div>
                                <div class="col-md-3 border border-primary p-1">
                                    <a class="link-no-line" href="mailto:<?= $email ?>? subject=subject text" target="_blank" title="Enviar e-mail para Contato?">
                                        <?= $email ?>
                                    </a>
                                </div>
                                <div class="col-md-2 border border-primary text-center p-1">
                                    <a class="link-no-line" href="tel:<?= $telefone ?>" title="Ligar para Contato?">
                                        <?= $telefoneM ?>
                                    </a>
                                </div>
                                <div class="col-md-3 border border-primary p-1">
                                    <p class="recuo-primeira-linha">
                                        <?= $descricao ?>
                                    </p>
                                </div>
                                <div class="col-md-1 border border-primary text-center p-1">
                                    <?= $alteracao ?>
                                </div>
                                <div class="col-md-1 border border-primary text-center p-1">
                                    <a class="link-no-line" href="visualizar_contato.php?id_contato=<?= $id ?>" title="Ver/Alterar Contato">
                                        <img src="../../../img/icones/editar.png" alt="Alterar?" width="20">
                                    </a>
                                </div>
                            </div>
                    <?php        
                        }
                    ?>
                </div>
                <div class="sm">
                    <?php
                        foreach ($listaContatos as $contato) {
                            $id        = $contato['id'];
                            $nome      = $contato['nome'];
                            $email     = $contato['email'];
                            $telefoneM = $contato['telefone'];
                            $descricao = $contato['descricao'];
                            $alteracao = $contato['updated_at'];
                            $alteracao = convertDataMySQL_DataPHP($alteracao);
                            $telefone = convertMascaraTelefone_Numero($telefoneM);
                    ?>
                            <div class="col-md-1 p-1">
                                <p>    
                                    <a class="link-no-line" href="visualizar_contato.php?id_contato=<?= $id ?>" title="Ver/Alterar Contato">
                                        <img src="../../../img/icones/editar.png" alt="Alterar?" width="20">
                                    </a>
                                    <strong>Nome: </strong><?= $nome ?></p>
                                <p>
                                    <strong>E-Mail: </strong>
                                    <a class="link-no-line" href="mailto:<?= $email ?>? subject=subject text" target="_blank" title="Enviar e-mail para Contato?">
                                        <?= $email ?>
                                    </a>
                                </p>
                                <p>
                                    <strong>Telefone: </strong>
                                    <a class="link-no-line" href="tel:<?= $telefone ?>" title="Ligar para Contato?">
                                        <?= $telefoneM ?>
                                    </a>
                                </p>
                                <p><strong>Descrição:</strong> <br /><?= $descricao ?></p>
                                <p><strong>Alteração</strong> <?= $alteracao ?></p>
                            
                            </div>
                            <hr class="divisor">
                    <?php        
                        }
                    ?>
                </div>
            </div>
        </section>
        <section class="pre-footer"></section>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>