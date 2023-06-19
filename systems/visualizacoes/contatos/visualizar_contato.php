<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    include '../../controladores/contatos/class_contatos.php';
    include '../../controladores/contatos/class_ocorrencias_contato.php';
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
        $telefone  = $c['telefone'];
        $descricao = $c['descricao'];
        $alteracao = $c['updated_at'];
        $alteracao = convertDataMySQL_DataPHP($alteracao);
    }

    $listaOcorrenciasContato = new OcorrenciasContato();
    $listaOcorrenciasContato = $listaOcorrenciasContato->getgetAllOcorrenciasContato($id);
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
                    <img src="../../../img/icones/contatos.png" alt="Home" width="40">
                    <br />
                    <h1 class="text-primary text-center mt-1 negrito display-in font-size-20">
                        Visualizar Contato
                    </h1>
                    <?php
                        if (isset($_SESSION['msgAlteraContato'])) {
                            $msgAlteraContato = $_SESSION['msgAlteraContato'];
                    ?>
                            <h6 class="text-danger">(<?= $msgAlteraContato ?>)</h6>
                    <?php 
                            unset($_SESSION['msgAlteraContato']);
                        }
                        if (isset($_SESSION['msgOcorrenciaContato'])) {
                            $msgOcorrenciaContato = $_SESSION['msgOcorrenciaContato'];
                    ?>
                            <h6 class="text-danger">(<?= $msgOcorrenciaContato ?>)</h6>
                    <?php 
                            unset($_SESSION['msgOcorrenciaContato']);
                        }
                    ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="border border-primary borda-redonda-20 p-3">
                        <form action="../../controladores/contatos/valida_contato.php?id_contato=<?= $id ?>" method="post" name="form-altera-contato">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-light borda-redonda-10-left font-size-16 negrito p-1">Nome: </span>
                                </div>
                                <input class="form-control font-size-15 negrito border border-primary borda-redonda-10-right p-1" type="text" name="nome" value="<?= $nome ?>" required />
                            </div>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-light borda-redonda-10-left font-size-16 negrito p-1">E-Mail: </span>
                                </div>
                                <input class="form-control font-size-15 negrito border border-primary borda-redonda-10-right p-1" type="email" name="email" value="<?= $email ?>" required />
                            </div>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-light borda-redonda-10-left font-size-16 negrito p-1">Telefone: </span>
                                </div>
                                <input class="font-size-15 negrito border border-primary borda-redonda-10-right p-1" type="tel" id="telefone" onkeyup="mascaraFone(event)" name="telefone" value="<?= $telefone ?>" required />
                            </div>
                            <div class="form-group text-center mt-3">
                                <span class="bg-primary text-light borda-redonda-10 font-size-16 negrito py-1 px-5" for="mensagem-curta">Descrição: </span>
                                <textarea class="font-size-15 negrito border border-primary borda-redonda-10 mt-3 p-2" 
                                        id="mensagem-curta"
                                        name="descricao" 
                                        rows="1"
                                        cols="41"
                                        maxlength="50"><?= $descricao ?></textarea>
                            </div>
                            <div class="buttons">
                                <button class="blob-btn" type="submit">
                                    Alterar
                                    <span class="blob-btn__inner">
                                        <span class="blob-btn__blobs">
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                        </span>
                                    </span>
                                </button>
                                <br/>
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                    <defs>
                                        <filter id="goo">
                                            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
                                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo"></feColorMatrix>
                                            <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                        </form>
                    </div>
                    <div class="border border-primary borda-redonda-20 p-3 mt-3">
                        <div class="text-center mt-1">
                            <h2 class="text-primary text-center negrito font-size-20">
                                Adicionar Ocorrência				
                            </h2>
                        </div>
                        <form action="../../controladores/contatos/valida_ocorencia_contato.php?id_contato=<?= $id ?>" method="post" name="form-adiciona_ocorencia">
                            <div class="form-group text-center mt-3">
                                <div class="form-group">
                                    <span class="bg-primary text-light borda-redonda-10 font-size-18 negrito py-1 px-5" for="mensagem">Descrição: </span>
                                    <textarea class="form-control borda-redonda-20 border border-primary p-2 mt-3" 
                                                  id="mensagem" 
                                                  name="descricao" 
                                                  rows="1"
                                                  placeholder="Descreva a ocorrência aqui..." 
                                                  maxlength="255"></textarea>
                                </div>
                                <div class="text-danger negrito text-left" id="caracteres_restantes">255</div>
                            </div>
                            <div class="buttons">
                                <button class="blob-btn" type="submit">
                                    Salvar
                                    <span class="blob-btn__inner">
                                        <span class="blob-btn__blobs">
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                            <span class="blob-btn__blob"></span>
                                        </span>
                                    </span>
                                </button>
                                <br/>
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                    <defs>
                                        <filter id="goo">
                                            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
                                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo"></feColorMatrix>
                                            <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 border border-primary borda-redonda-20">
                    <div class="text-center mt-1">
                        <img src="../../../img/icones/ocorrencia.png" alt="Ocorrências" width="30">
                        <br />
                        <h2 class="text-primary text-center negrito font-size-20">
                            Ocorrências				
                        </h2>
                    </div>
                    <hr class="divisor">
                    <?php
                        if (!empty($listaOcorrenciasContato)) {
                            foreach ($listaOcorrenciasContato as $ocorrencia) {
                                $idOcorrencia = $ocorrencia['id'];
                                $descricaoOcorrencia = $ocorrencia['descricao'];
                                $dataOcorr = $ocorrencia['created_at'];
                                $dataOcorrencia = convertDataMySQL_DataPHP($dataOcorr);
                                $horaOcorrencia = convertDataMySQL_HoraPHP($dataOcorr);
                    ?>
                                <span class="negrito">Cód. Ocorrência: </span> <span><?= $idOcorrencia ?></span>
                                <br />
                                <span class="negrito">Descrição: </span>
                                <p class="display-in"><?= $descricaoOcorrencia ?></p>
                                <br />
                                <span class="negrito">Data: </span><span><?= $dataOcorrencia ?> às <?= $horaOcorrencia ?></span>
                                <hr class="divisor">
                    <?php 
                            }
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