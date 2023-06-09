<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/contratos/class_contratos.php';
	include '../../controladores/status/class_status.php';
    include '../../lib/util.php';

	// MENU
	include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
	$idUser   = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
    
	if (isset($_SESSION['msgAlteraContrato'])) {
		$msgAlteraContrato = $_SESSION['msgAlteraContrato'];
	}

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
    
	$nomeCliente = new Pessoas();
	$nomeCliente = $nomeCliente->getNomeById($idClienteContrato);
	$statusAtual = new Status();
	$statusAtual = $statusAtual->getNomeStatusById($idStatusContrato);
	$listaStatus = new Status();
	$listaStatus = $listaStatus->getAllStatus();
	$listaOrdenada = [];
	$listaDesordenada = new Status();
	$listaOrdenada = $listaDesordenada->ordenaLista($listaStatus);
	$contrAberto = null;
    if ($abertoContrato == 1) {
        $contrAberto = 'Aberto';
    } else {
        $contrAberto = 'Concluído';
    }
	$dataStatus = convertDataMySQL_DataPHP($dataStatusContrato);
	$horaStatus = convertDataMySQL_HoraPHP($dataStatusContrato);
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
			<?php include '../../../template/menu_logado.php';?>
		</header>
        <section class="container mb-5">
            <div class="text-center mt-1">
                <img src="../../../img/icones/contrato.png" alt="Contrato" title="Contrato" width="80">
                <h4 class="text-primary text-center mt-1 negrito">Alterar contrato</h4>
            </div>
			<?php 
				if (isset($_SESSION['msgAlteraContrato'])) {
			?>		
					<div class="text-center text-danger negrito my-2"><?= $msgAlteraContrato ?></div>
            <?php
					unset($_SESSION['msgAlteraContrato']);
				}
			?>
			<div class="row">
                <div class="col-md-6 m-auto border border-primary text-center borda-redonda-20">
					<div class="my-3">
						<span class="border border-primary bg-primary text-light borda-redonda-20-left px-4 py-2">Cliente: </span>
						<span class="border border-primary borda-redonda-20-right px-4 py-2"><?= $nomeCliente ?>
					</div>
					<form action="../../controladores/contratos/valida_altera_contrato.php" method="post">
						<input type="hidden" name="idContrato" value="<?= $idContrato ?>">
						<input type="hidden" name="aberto" value="<?= $abertoContrato ?>">
						<h6 class="text-center pt-2 font-size-20 negrito display-in">Contrato nº: "<?= $idContrato ?>" - </h6>
						<h6 class="animate-character-contrato display-in"><?= $contrAberto ?></h6>
						<div class="my-3">
							<span class="bg-primary text-light borda-redonda-20 py-2 px-5">Descrição: </span>
							<br />
							<textarea class="border border-primary borda-redonda-20 mt-3 p-2" 
									  id="mensagem" 
									  name="descricao" 
									  cols="47"
									  rows="5"
									  placeholder="Descreva o contrato aqui..." 
									  maxlength="255"><?= $descricaoContrato ?></textarea>
						</div>
						<div class="my-3">
							<div class="input-group-prepend mt-1 mb-4">
								<span class="input-group-text bg-primary text-light borda-redonda-20-left">Status: </span>
								<select class="form-control border border-primary borda-redonda-20-right" name="status" id="status">
									<option value="<?= $idStatusContrato ?>"><?= $statusAtual ?></option>
									<?php
										if (!is_null($listaOrdenada)) {
											foreach ($listaOrdenada as $buscaS) {
												$idS = $buscaS['id'];
												$nomeS = $buscaS['nome'];												
									?>
												<option value="<?= $idS ?>"><?= $nomeS ?></option>
									<?php
											}
										}
									?>
								</select>
							</div>
						</div>
						<div class="my-3">
							<span class="border border-primary borda-redonda-20 p-2">
								Última alteração em <?= $dataStatus ?> às <?= $horaStatus ?>.
							</span>
						</div>
						<button class="btn btn-primary borda-redonda-20 mt-2" type="submit">Salvar alterações</button>
					</form>
                </div>
            </div>
        </section>
		<footer>
			<?php
				include '../../../template/js-bootstrap.php';
			?>
		</footer>
    </body>
</html>