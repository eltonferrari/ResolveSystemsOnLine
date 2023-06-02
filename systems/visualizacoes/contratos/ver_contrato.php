<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/contratos/class_contratos.php';
    
	// MENU
	include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
	$idUser   = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
	
	echo '===== SESSION =====';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
    
	echo '===== GET =====';
	echo '<pre>';
	print_r($_GET);
	echo '</pre>';
    
    $idContrato = $_GET['id_contrato'];
    $contrato = new Contratos();
    $contrato = $contrato->getContratoById($idContrato);
    foreach ($contrato as $con) {
        $idContrato         = $con['id'];
        $idClienteContrato  = $con['id_cliente'];
        $descricaoContrato  = $con['descricao'];
        $idStatusContrato   = $con['id_status'];
        $dataStatusContrato = $con['data'];
        $abertoContrato     = $con['aberto'];
    }

	echo '===== CONTRATO =====';
	echo '<pre>';
	print_r($contrato);
	echo '</pre>';
    
    $idCliente = $idClienteContrato;
    $cliente = new Pessoas();
    $cliente = $cliente->getPessoaById($idCliente);
    foreach ($cliente as $cli) {
        $nomeCliente            = $cli['nome'];
        $cpfCliente             = $cli['cpf'];
        $dataNascCliente        = $cli['data_nasc'];
        $sexoCliente            = $cli['id_sexo'];
        $cepCliente             = $cli['cep'];
        $enderecoCliente        = $cli['endereco'];
        $enderecoComplCliente   = $cli['endereco_compl'];
        $bairroCliente          = $cli['bairro'];
        $cidadeCliente          = $cli['cidade'];
        $estadoCliente          = $cli['id_estado'];
        $ativoCliente           = $cli['ativo'];
        $criadoPorCliente       = $cli['created_by'];
        $criadoEmCliente        = $cli['created_at'];
        $alteradoEmCliente      = $cli['updated_at'];
    }
	
    echo '===== CLIENTE =====';
	echo '<pre>';
	print_r($cliente);
	echo '</pre>';
    
    $emails = new Pessoas();
    $emails = $emails->getEmailsById($idCliente);
    
    echo '===== E-MAILS =====';
	echo '<pre>';
	print_r($emails);
	echo '</pre>';
    
    $telefones = new Pessoas();
    $telefones = $telefones->getTelefonesById($idCliente);
    
    echo '===== TELEFONES =====';
	echo '<pre>';
	print_r($telefones);
	echo '</pre>';
    
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
            <div class="text-center mt-3">
                <img src="../../../img/icones/contrato.png" alt="Contrato" title="Contrato" width="80">
                <h1 class="text-primary text-center mt-3 negrito">Contrato</h1>
            </div>
            <div class="row">
                <div class="col-md-6 border">
                    <h5 class="text-primary text-center negrito">Cliente código "<?= $idCliente ?>"</h5>
                    <h5 class="text-primary text-center negrito">"<?= $nomeCliente ?>"</h5>
                    <hr class="divisor">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-outline-primary borda-redonda-20 my-2" data-toggle="modal" data-target="#modalTelefone">
                                Telefones: 
                            </button>
                            <?php
                                foreach ($telefones as $telP) {
                                    $telefonePrincipal = null;
                                    if ($telP['principal'] == 1) {
                                        $telefonePrincipal = $telP['telefone'];
                                        break;
                                    }
                                }
                            ?>
                            <div class="text-center">
                                <h6 class="negrito"><?= $telefonePrincipal ?></h6>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalTelefone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Telefones cadastrados</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                foreach ($telefones as $telP) {
                                                    $telefonePrincipal = null;
                                                    if ($telP['principal'] == 1) {
                                                        $telefonePrincipal = $telP['telefone'];
                                                        break;
                                                    }
                                                }
                                            ?>
                                                <h5 class="text-left negrito">Principal</h5>
                                                <h5 class="text-left negrito">< <?= $telefonePrincipal ?> ></h5>
                                                <h6 class="text-left">Outros</h6>
                                            <?php
                                                foreach ($telefones as $telS) {
                                                    $telefoneSecundario = null;
                                                    if ($telS['principal'] == 0) {
                                                        $telefoneSecundario = $telS['telefone'];
                                                    }
                                            ?>
                                                    <h6 class="text-left"><?= $telefoneSecundario ?></h6>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-outline-primary borda-redonda-20 my-2" data-toggle="modal" data-target="#modalEmail">
                                E-Mails: 
                            </button>
                            <?php
                                foreach ($emails as $emailP) {
                                    $emailPrincipal = null;
                                    if ($emailP['principal'] == 1) {
                                        $emailPrincipal = $emailP['email'];
                                        break;
                                    }
                                }
                            ?>
                            <div class="text-center">
                                <h6 class="negrito"><?= $emailPrincipal ?></h6>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">E-Mails cadastrados</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                foreach ($emails as $emailP) {
                                                    $emailPrincipal = null;
                                                    if ($emailP['principal'] == 1) {
                                                        $emailPrincipal = $emailP['email'];
                                                        break;
                                                    }
                                                }
                                            ?>
                                                <h5 class="text-left negrito">Principal</h5>
                                                <h5 class="text-left negrito">< <?= $emailPrincipal ?> ></h5>
                                                <h6 class="text-left">Outros</h6>
                                            <?php
                                                foreach ($emails as $emailS) {
                                                    $emailSecundario = null;
                                                    if ($emailS['principal'] == 0) {
                                                        $emailSecundario = $emailS['email'];
                                                    }
                                            ?>
                                                    <h6 class="text-left"><?= $emailSecundario ?></h6>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="divisor">
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-8">

                        </div>
                    </div>
                </div>
                <div class="col-md-6 border">
                    <h5 class="text-primary text-center negrito">
                        Contrato número "<?= $idContrato ?>" - 
                        <a href="">outros</a>
                    </h5>
                </div>
            </div>
        </div>
        <?php
            include '../../../template/js-bootstrap.php'; 
		?>	
    </body>
</html>