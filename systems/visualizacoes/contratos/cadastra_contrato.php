<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    include '../../controladores/status/class_status.php';
	// MENU
	include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
    date_default_timezone_set('America/Sao_Paulo');
    $buscaPessoas = new Pessoas();
    $buscaPessoas = $buscaPessoas->getAllPessoas();
    $buscaStatus = new Status();
    $buscaStatus = $buscaStatus->getAllStatus();
    
    echo '===== SESSION =====';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    if (isset($_SESSION['msgContratoAdicionado'])) {
        $msgContratoAdicionado = $_SESSION['msgContratoAdicionado'];
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
            <?php include '../../../template/menu_logado.php';?>
        </header>
        <section>
            <div class="container">
                <div class="text-center mt-3">
                    <img src="../../../img/icones/contrato.png" alt="Contrato" title="Contrato" width="80">
                    <h1 class="text-primary text-center mt-3 negrito">Novo Contrato</h1>
                    <?php
							if (isset($_SESSION['msgContratoAdicionado'])) {
								$msgContratoAdicionado = $_SESSION['msgContratoAdicionado'];
						?>
								<h6 class="text-danger">(<?= $msgContratoAdicionado ?>)</h6>
						<?php 
								unset($_SESSION['msgContratoAdicionado']);
							}
						?>
                </div>
                <div class="form">
                    <form action="../../controladores/contratos/valida_contrato.php" method="post">
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-4 ml-auto">
                                    <div class="input-group-prepend my-1">
                                        <span class="input-group-text bg-primary text-light borda-redonda-20-left">Cliente: </span>
                                        <select class="form-control borda-redonda-20-right" name="pessoa" id="pessoa">
                                            <option value=0>Selecione o cliente...</option>
                                            <?php
                                                if (!is_null($buscaPessoas)) {
                                                    foreach ($buscaPessoas as $buscaP) {
                                                        $idP = $buscaP['id'];
                                                        $nomeP = $buscaP['nome'];												
                                            ?>
                                                        <option value="<?= $idP ?>"><?= $nomeP ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>                                    
                                <div class="col-md-4 mr-auto">
                                    <div class="input-group-prepend mt-1 mb-4">
                                        <span class="input-group-text bg-primary text-light borda-redonda-20-left">Status: </span>
                                        <select class="form-control borda-redonda-20-right" name="status" id="status">
                                            <option value=0>Selecione o status inicial...</option>
                                            <?php
                                                if (!is_null($buscaStatus)) {
                                                    foreach ($buscaStatus as $buscaS) {
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
                            </div>
                            <div class="row">
                                <div class="col-md-8 m-auto">
                                    <div class="form-group">
                                        <label for="mensagem">Descrição do contrato: </label>
                                        <textarea class="form-control borda-redonda-20 border border-primary p-2" 
                                                  id="mensagem" 
                                                  name="descricao" 
                                                  rows="1"
                                                  placeholder="Descreva o contrato aqui..." 
                                                  maxlength="255"></textarea>
                                    </div>
                                    <div class="text-danger negrito" id="caracteres_restantes">255</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 m-auto text-center">
                                    <button class="btn btn-lg btn-primary borda-redonda-20 mt-3" type="submit">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
            include '../../../template/js-bootstrap.php'; 
		?>	
    </body>
</html>