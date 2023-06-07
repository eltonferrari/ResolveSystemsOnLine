<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/contratos/class_contratos.php';
    include '../../controladores/sexos/class_sexos.php';
    include '../../controladores/estados/class_estados.php';
    include '../../controladores/status/class_status.php';
    include '../../lib/util.php';

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
        $dataStatusContrato = $con['updated_at'];
        $abertoContrato     = $con['aberto'];
    }
    $contrAberto = null;
    if ($abertoContrato == 1) {
        $contrAberto = 'Aberto';
    } else {
        $contrAberto = 'Concluído';
    }

    $nomeStatus = new Status();
    $nomeStatus = $nomeStatus->getNomeStatusById($idStatusContrato);

    echo "Nome Status: $nomeStatus <br />";

    $dataStatus = convertDataMySQL_DataPHP($dataStatusContrato);
    $horaStatus = convertDataMySQL_HoraPHP($dataStatusContrato);

	echo '===== CONTRATO =====';
	echo '<pre>';
	print_r($contrato);
	echo '</pre>';

    $contratosAbertos = new Contratos();
    $contratosAbertos = $contratosAbertos->getAllContratosAbertosByCliente($idClienteContrato);

    echo '===== CONTRATOS ABERTOS =====';
	echo '<pre>';
	print_r($contratosAbertos);
	echo '</pre>';

    $contratosTerminados = new Contratos();
    $contratosTerminados = $contratosTerminados->getAllContratosTerminadosByCliente($idClienteContrato);

    echo '===== CONTRATOS TERMINADOS =====';
	echo '<pre>';
	print_r($contratosTerminados  );
	echo '</pre>';

    $idCliente = $idClienteContrato;
    $cliente = new Pessoas();
    $cliente = $cliente->getPessoaById($idCliente);
    foreach ($cliente as $cli) {
        $nomeCliente            = $cli['nome'];
        $cpf_cnpjCliente        = $cli['cpf_cnpj'];
        $dataNascCriacaoCliente = $cli['data_nasc'];
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
    $dataNCCliente = convertDataMySQL_DataPHP($dataNascCriacaoCliente);
    $sexo = new Sexos();
    $sexo = $sexo->getSexoById($sexoCliente);
    $estado = new Estados();
    $estado = $estado->getNomeById($estadoCliente);
    $criador = new Pessoas();
    $criador = $criador->getNomeById($criadoPorCliente);
    $dataCriacaoCliente = convertDataMySQL_DataPHP($criadoEmCliente);
    $horaCriacaoCliente = convertDataMySQL_HoraPHP($criadoEmCliente);
    $dataAlteracaoCliente = convertDataMySQL_DataPHP($alteradoEmCliente);
    $horaAlteracaoCliente = convertDataMySQL_HoraPHP($alteradoEmCliente);
    
    echo '===== CLIENTE =====';
	echo '<pre>';
	print_r($cliente);
	echo '</pre>';
    
    $telefonePrincipal = new Telefones();
    $telefonePrincipal = $telefonePrincipal->getTelefonePrincipal($idCliente);
    
    $telefoneOutros = new Telefones();
    $telefoneOutros = $telefoneOutros->getTelefoneOutros($idCliente);

    echo '===== Telefone Outros =====';
	echo '<pre>';
	print_r($telefoneOutros);
	echo '</pre>';

    $emailPrincipal = new Emails();
    $emailPrincipal = $emailPrincipal->getEmailPrincipal($idCliente);
    
    echo '===== Email Principal =====';
	echo $emailPrincipal ;

    $emailOutros = new Emails();
    $emailOutros = $emailOutros->getEmailOutros($idCliente);
    
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
            <div class="text-center mt-1">
                <img src="../../../img/icones/contrato.png" alt="Contrato" title="Contrato" width="80">
                <h4 class="text-primary text-center mt-1 negrito">Contrato</h4>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 border">
                    <h6 class="text-primary text-center negrito">Cliente código "<?= $idCliente ?>"</h6>
                    <h6 class="text-primary text-center negrito">"<?= $nomeCliente ?>"</h6>
                    <hr class="divisor">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-outline-primary borda-redonda-20 my-2" data-toggle="modal" data-target="#modalTelefone">
                                Telefones: 
                            </button>
                            <?php
                                if (is_null($telefonePrincipal)) {
                            ?>
                                    <div class="text-center">
                                        <h6 class="negrito font-size-14"><?= $telefonePrincipal ?></h6>
                                    </div>
                            <?php
                                }
                            ?>
                            <div class="text-center">
                                <h6 class="negrito font-size-14"><?= $telefonePrincipal ?></h6>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalTelefone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title negrito" id="exampleModalLabel">Telefones cadastrados</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                                if (!is_null($telefonePrincipal)) {
                                            ?>
                                                    <h6 class="text-left text-danger font-size-14 negrito">Principal</h6>
                                                    <h6 class="text-left font-size-14 negrito"><?= $telefonePrincipal ?></h6>
                                                    <h6 class="text-left text-danger font-size-14">Outros</h6>
                                            <?php
                                                }
                                                if (!empty($telefoneOutros)) {
                                                    foreach ($telefoneOutros as $t) {
                                                        $telefoneOutro = $t['telefone'];
                                            ?>
                                                        <h6 class="text-left font-size-14"><?= $telefoneOutro ?></h6>
                                            <?php
                                                    }
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
                            <div class="text-center">
                                <h6 class="negrito"><?= $emailPrincipal ?></h6>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title negrito" id="exampleModalLabel">E-Mails cadastrados</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="text-left text-danger font-size-14 negrito">Principal</h6>
                                            <h6 class="text-left font-size-14 negrito"><?= $emailPrincipal ?></h6>
                                            <h6 class="text-left text-danger font-size-14">Outros</h6>
                                        <?php
                                            if (!empty($emailOutros)) {
                                                foreach ($emailOutros as $e) {
                                                    $emailOutro = $e['email'];
                                        ?>
                                                    <h6 class="text-left font-size-14"><?= $emailOutro ?></h6>
                                        <?php
                                                }
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
                    <div class="font-size-14">
                        <div class="row">
                            <div class="col-md-6 text-right">
                                CPF/CNPJ:
                            </div>
                            <div class="col-md-6">
                                <?= $cpf_cnpjCliente ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                Data de Nasc/Criação:
                            </div>
                            <div class="col-md-6 mx-auto my-auto d-flex flex-wrap">
                                <?= $dataNCCliente ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                Sexo:
                            </div>
                            <div class="col-md-6">
                                <?= $sexo ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                CEP:
                            </div>
                            <div class="col-md-6">
                                <?= $cepCliente ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                Endereço:
                            </div>
                            <div class="col-md-6">
                                <?= $enderecoCliente ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                Complemento: 
                            </div>
                            <div class="col-md-6">
                                <?= $enderecoComplCliente ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                Bairro: 
                            </div>
                            <div class="col-md-6">
                                <?= $bairroCliente ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                Cidade: 
                            </div>
                            <div class="col-md-6">
                                <?= $cidadeCliente ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                Estado: 
                            </div>
                            <div class="col-md-6">
                                <?= $estado ?>
                            </div>
                        </div>
                        <hr class="divisor">
                        <div>
                            <p>Cliente inserido no sistema por "<?= $criador ?>"
                            <br />
                            Cliente inserido no sistema em <?= $dataCriacaoCliente ?> às <?= $horaCriacaoCliente ?>
                            <br />
                            Alterado pela última vez em <?= $dataAlteracaoCliente ?> às <?= $horaAlteracaoCliente ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 border text-center">
                    <div>
                        <!-- Botão para acionar modal -->
                        <button type="button" class="btn btn-outline-primary borda-redonda-20 my-2" data-toggle="modal" data-target="#modalContratos">
                            Ver todos os contratos: 
                        </button>
                    </div>
                    <h5 class="text-primary text-center negrito display-in">
                        Contrato número "<?= $idContrato ?>" - 
                    </h5>
                    <h5 class="animate-character-contrato display-in"><?= $contrAberto ?></h5>
                    <!-- Modal -->
                    <div class="modal fade" id="modalContratos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title negrito" id="exampleModalLabel">Contratos do cliente</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                        if (!is_null($contratosAbertos)) {
                                    ?>
                                            <h6 class="text-left text-danger font-size-14 negrito">Abertos:</h6>
                                    <?php
                                            foreach ($contratosAbertos as $cA) {
                                                $contratoA = $cA['id'];
                                    ?>
                                                <a href="ver_contrato.php?id_contrato=<?= $contratoA ?>">
                                                    <h6 class="text-left font-size-14 negrito"><?= $contratoA ?></h6>
                                                </a>
                                    <?php
                                            }
                                        }
                                    ?>
                                                <h6 class="text-left text-danger font-size-14">Concluídos:</h6>
                                    <?php
                                        if (!empty($contratosTerminados)) {
                                            foreach ($contratosTerminados as $cT) {
                                                $contratoT = $cT['id'];
                                    ?>
                                                <a href="ver_contrato.php?id_contrato=<?= $contratoT ?>">
                                                    <h6 class="text-left font-size-14"><?= $contratoT ?></h6>
                                                </a>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="divisor">
                    <div class="text-center">
                        <h6 class="text-primary negrito">Descrição</h6>
                        <p class="text-justify recuo-primeira-linha"><?= $descricaoContrato ?></p>
                    </div>
                    <hr class="divisor">
                    <div class="text-center">
                        <h6 class="text-primary negrito">Status atual desde <?= $dataStatus ?> às <?= $horaStatus ?></h6>
                        <div class="row">
                            <div class="col-md-6 m-auto">
                                <div class="bg-light border border-primary borda-redonda-20 pt-1">
                                    <h6 class="text-center negrito"><?= $nomeStatus ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="divisor">
                    <a class="btn btn-primary borda-redonda-20 " href="altera_contrato.php?id_contrato=<?= $idContrato ?>">Alterar contrato</a>
                </div>
            </div>
        </div>
        <div class="espaco-pre-footer"></div>
        <?php
            include '../../../template/js-bootstrap.php';
		?>
    </body>
</html>