<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    include '../../controladores/contratos/class_contratos.php';
	include '../../controladores/ocorrencias/class_ocorrencias.php';
    include '../../lib/util.php';

	// MENU
	include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
	$idUser   = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
    
    $idContrato = $_GET['id_contrato'];
    $nomeCliente = new Contratos();
    $nomeCliente = $nomeCliente->getNomeClienteByIdContrato($idContrato);
    $ocorrencias = new Ocorrencias();
    $ocorrencias = $ocorrencias->getAllOcorrenciasByContrato($idContrato);    
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
        <section class="container">
            <div class="text-center mt-1">
                <img src="../../../img/icones/ocorrencia.png" alt="Contrato" title="Contrato" width="80">
                <h1 class="text-primary text-center mt-3 negrito">Ocorrências</h1>
                <h2 class="text-primary text-center mt-1 negrito font-size-20">
                    <p>
                        Contrato nº <?= $idContrato ?> - <?= $nomeCliente ?>
                    </p>
                </h2>
            </div>
            <div class="row mt-2">
                <div class="col-md-5 border border-primary borda-redonda-20 text-center mt-1">
                    <h3 class="text-primary text-center mt-3 negrito">Atuais</h3>
                    <?php
                        if (!empty($ocorrencias)) {
                            foreach ($ocorrencias as $ocorrenc) {
                                $idOcorrencia           = $ocorrenc['id'];
                                $textoOcorrencia        = $ocorrenc['texto'];
                                $createdByOcorrencia    = $ocorrenc['created_by'];
                                $createdAtOcorrencia    = $ocorrenc['created_at'];
                                $updatedAtOcorrencia    = $ocorrenc['updated_at'];
                                $criador = new Pessoas();
                                $criador = $criador->getNomeById($createdByOcorrencia);
                                $dataCriacao = convertDataMySQL_DataPHP($createdAtOcorrencia);
                                $horaCriacao = convertDataMySQL_HoraPHP($createdAtOcorrencia);
                                $dataAlteracao = convertDataMySQL_DataPHP($updatedAtOcorrencia);
                                $horaAlteracao = convertDataMySQL_HoraPHP($updatedAtOcorrencia);
                    ?>
                                <hr class="divisor">
                                <span class="text-center negrito">Nº da ocorrência: </span>
                                <span class="text-danger negrito"><?= $idOcorrencia ?></span>
                                <br />
                                <p class="text-justify recuo-primeira-linha"><?= $textoOcorrencia ?></p>
                                <span class="text-primary text-center negrito">Criador: </span>
                                <span class="negrito"><?= $criador ?></span>
                                <br />
                                <span class="text-primary text-center negrito">Ocorrencia criada em </span>
                                <span class="negrito"><?= $dataCriacao ?> às <?= $horaCriacao ?></span>
                                <br />
                                <span class="text-primary text-center negrito">Ocorrencia alterada em </span>
                                <span class="negrito"><?= $dataAlteracao ?> às <?= $horaAlteracao ?></span>
                    <?php
                            }
                        }
                    ?>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5 text-center mt-1">
                    <h3 class="text-primary text-center mt-3 negrito">Cadastrar</h3>
                    <?php
                        if (isset($_SESSION['msgOcorrencia'])) {
                            $msgOcorrencia = $_SESSION['msgOcorrencia'];
                    ?>
                            <h6 class="text-danger">(<?= $msgOcorrencia ?>)</h6>
                    <?php 
                            unset($_SESSION['msgOcorrencia']);
                        }
                    ?>
                    <hr class="divisor">
                    <form action="../../controladores/ocorrencias/valida_ocorrencia.php" method="post">
                        <input type="hidden" name="id_contrato" value="<?= $idContrato ?>">
                        <div class="form-group">
                            <label class="text-primary negrito" for="mensagem">Descrição da ocorrência: </label>
                            <textarea class="form-control borda-redonda-20 border border-primary p-2" 
                                      id="mensagem" 
                                      name="texto" 
                                      rows="1"
                                      placeholder="Descreva a ocorrência aqui..." 
                                      maxlength="255"></textarea>
                            <div class="text-left text-danger negrito" id="caracteres_restantes">255</div>
                        </div>
                        <input type="hidden" name="created_by" value="<?= $idUser ?>">
                        <button class="btn btn-primary borda-redonda-20 px-5 py-2" type="submit">Salvar</button>
                    </form>
                </div>            
            </div>
        </section>
        <section class="espaco-pre-footer"></section>
        <footer>
            <?php
                include '../../../template/js-bootstrap.php';
            ?>
        </footer>
    </body>
</html>