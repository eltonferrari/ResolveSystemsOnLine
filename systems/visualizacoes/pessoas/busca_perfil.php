<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
    include '../../controladores/tipos/class_tipos.php';
    include '../../controladores/sexos/class_sexos.php';
    include '../../controladores/estados/class_estados.php';
    include '../../lib/util.php';
    // MENU
	include '../../controladores/pessoas/class_pessoas.php';  
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
    
    if (isset($_GET['user']) && $_GET['user'] > 0) {
        $idPost = $_GET['user'];
    } else {
        $idPost = $_POST['user'];
        if ($idPost == 0) {
            header("Location: ../home/home.php");
        }
    }
    $user = new Pessoas();
    $user = $user->getPessoaById($idPost);
    foreach ($user as $u) {
        $id             = $u['id'];
        $idTipo         = $u['id_tipo'];
        $nome           = $u['nome'];
        $cpf_cnpj       = $u['cpf_cnpj'];
        $dataNasc       = $u['data_nasc'];
        $idSexo         = $u['id_sexo'];
        $senha          = $u['senha'];
        $cep            = $u['cep'];
        $endereco       = $u['endereco'];
        $enderecoCompl  = $u['endereco_compl'];
        $bairro         = $u['bairro'];
        $cidade         = $u['cidade'];
        $idEstado       = $u['id_estado'];
        $ativo          = $u['ativo'];
        $createdBy      = $u['created_by'];
        $createdAt      = $u['created_at'];
        $updatedAt      = $u['updated_at'];
    }
    $activ  = ( $ativo == 1)  ? 'checked' : "";
    $tipo = new Tipos();
    $tipo = $tipo->getNomeById($idTipo);
    $buscaTipos = new Tipos();
    $buscaTipos = $buscaTipos->getAllTipos();
    $sexo = new Sexos();
    $sexo = $sexo->getSexoById($idSexo);
    $buscaSexos = new Sexos();
    $buscaSexos = $buscaSexos->getAllSexos();
    $estado = new Estados();
    $estado = $estado->getNomeById($idEstado);
    $buscaEstados = new Estados();
    $buscaEstados = $buscaEstados->getAllEstados();
    $criador = new Pessoas();
    $criador = $criador->getNomeById($createdBy);
    $idUser = $_SESSION['id_logado'];
    $nomePerfil = new Pessoas();
	$nomePerfil = $nomePerfil->getNomeById($idPost);
    $emails = new Pessoas();
    $emails = $emails->getEmailsById($idPost);
    $email = new Emails();
    $email = $email->getEmailPrincipal($idPost);
    $telefones = new Pessoas();
    $telefones = $telefones->getTelefonesById($idPost);
    $telefone = new Telefones();
    $telefone = $telefone->getTelefonePrincipal($idPost);
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
        <div class="container mb-5">    
            <div class="row pb-1">
				<div class="col-md-10 m-auto pb-1">
                    <h3 class="text-primary text-center mt-1 negrito">Perfil de Usuário</h3>
                    <form name="form-perfil" action="../../controladores/pessoas/altera_pessoa.php" method="post" enctype="multipart/form-data">
                        <div class="text-center">
                            <label class="bg-primary text-light px-2 mt-3 borda-redonda-10 negrito" for="nome">Nome: </label>
                            <input class="form-control borda-redonda-40 text-center text-size-grande mb-2" name="nome" type="text" id="nome" placeholder="Digite o nome..." value="<?= $nome ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6 m-auto text-center">
                                <label class="bg-primary text-light borda-redonda-20 negrito px-2 mt-2" for="id">Código Identificador: "<?= $idTipo ?>"</label>
                                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                                <br />
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="funcao">Função: </label>
                                <select id="funcao" name="id_tipo" class=" borda-redonda-10">
                                    <option value=<?= $idTipo ?>><?= $tipo ?></option>
                                    <?php
                                        foreach ($buscaTipos as $busca) {
                                            $id = $busca['id'];
                                            $nomeTipo = $busca['nome'];
                                    ?>
                                            <option value="<?= $id ?>"><?= $nomeTipo ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <br />
                                <div class="d-flex justify-content-center">
                                    <div class="negrito mr-2">
                                        Usuário: 
                                    </div>
                                    <div class="flipswitch">
                                        <input type="checkbox" name="ativo" class="flipswitch-cb" id="fs" <?= $activ ?>>
                                        <label class="flipswitch-label" for="fs">
                                            <div class="flipswitch-inner"></div>
                                            <div class="flipswitch-switch"></div>
                                        </label>
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 text-center">
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="cpf_cnpj">CPF/CNPJ: </label><br />
                                <input class="form-control text-center" name="cpf_cnpj" type="text" id="cpf_cnpj" placeholder="Digite o CPF/CNPJ..." value="<?= $cpf_cnpj ?>">
                            </div>
                            <div class="col-md-4 text-center">
                                <?php
                                    $pessoaDataNasc = substr($dataNasc,0,10);
                                ?>
                                    <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="datanasc">Nascimento: </label><br />
                                    <input class="form-control" type="date" name="datanasc" id="datanasc" value="<?= $pessoaDataNasc ?>">
                                <?php
                                    $data = new DateTime($pessoaDataNasc);
                                    $interval = $data->diff(new DateTime(date('Y-m-d')));
                                    $idade = $interval->format('%Y ano(s).');
                                    if ($idade <150) {
                                ?>
                                        <span class="negrito" for="idade">Idade: <?= $idade ?></span>
                                <?php 
                                    }
                                ?>
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="sexo">Sexo: </label><br />
                                <select class="form-control text-center" id="sexo" name="id_sexo">
                                    <option value=<?= $idSexo ?>><?= $sexo ?></option>
                                    <?php
                                        foreach ($buscaSexos as $busca) {
                                            $idSexo = $busca['id'];
                                            $sexo = $busca['sexo'];                                       
                                    ?>
                                            <option value="<?= $idSexo ?>"><?= $sexo ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 text-center">
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="email">E-mail(s): </label>
                                <p class="negrito d-inline">
                                    <a class="font-link link-no-line" href="cadastra_email.php?id_perfil=<?= $idPost ?>">+</a>
                                </p>
                                <br />
                                <?php
                                    foreach ($email as $e) {
                                        if ($e['principal'] == 1) {
                                            $emailPrincipal = $e['email'];
                                            $princPrincipal = 'checked';
                                ?>
                                            <label class="text-center negrito" name="email" for="email"><?= $emailPrincipal ?></label>
                                            <input name="email" type="radio" id="email" <?= $princPrincipal ?> value="<?= $emailPrincipal ?>"><br />
                                <?php
                                        }
                                    }
                                    foreach ($emails as $es) {
                                        if ($es['principal'] == 0) {
                                            $emailOutro = $es['email'];
                                            $princOutro = $es['principal'];
                                ?>
                                            <label for="email-outro"><?= $emailOutro ?></label>
                                            <input name="email" type="radio" id="email-outro" value="<?= $emailOutro ?>">
                                            <br />
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                            <div class="col-md-6 text-center">
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="telefone">Telefone(s): </label>
                                <p class="negrito d-inline">
                                    <a class="font-link link-no-line" href="cadastra_telefone.php?id_perfil=<?= $idPost ?>">+</a>
                                </p>
                                <br />
                                <?php
                                    if (isset($telefone)) {
                                        foreach ($telefone as $t) {
                                            if ($t['principal'] == 1) {
                                                $telefonePrincipal = $t['telefone'];
                                                $principalPrincipal = 'checked';
                                ?>
                                                <label class="text-center negrito" name="telefone" for="telefone"><?= $telefonePrincipal ?></label>
                                                <input name="telefone" type="radio" id="telefone" <?= $principalPrincipal ?> value="<?= $telefonePrincipal ?>"><br />
                                <?php
                                            }
                                        }
                                    }
                                    if (isset($telefones)) {
                                        foreach ($telefones as $ts) {
                                            if ($ts['principal'] == 0) {
                                                $telefoneOutro = $ts['telefone'];
                                                $principalOutro = $ts['principal'];
                                ?>
                                                <label for="telefone-outro"><?= $telefoneOutro ?></label>
                                                <input name="telefone" type="radio" id="telefone-outro" value="<?= $telefoneOutro ?>">
                                                <br />
                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 text-center">
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="cep">CEP: </label>
                                <input class="form-control text-center" name="cep" type="text" id="cep" placeholder="Digite o cód. do CEP..." value="<?= $cep ?>">
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="endereco">Endereço: </label>
                                <input class="form-control text-center" name="endereco" type="text" id="endereco" placeholder="Digite o seu endereço..." value="<?= $endereco ?>">
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="enderecocompl">Compl.: </label>
                                <input class="form-control text-center" name="endereco_compl" type="text" id="enderecocompl" placeholder="Seu endereço precisa de complemento?" value="<?= $enderecoCompl ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 text-center">
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="bairro">Bairro: </label>
                                <input class="form-control text-center" name="bairro" type="text" id="bairro" placeholder="Digite o nome do bairro..." value="<?= $bairro ?>">
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="cidade">Cidade: </label>
                                <input class="form-control text-center" name="cidade" type="text" id="cidade" placeholder="Digite o nome da cidade..." value="<?= $cidade ?>">
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="bg-primary text-light px-2 borda-redonda-10 negrito" for="estado">Estado: </label>
                                <select class="form-control text-center" id="id_estado" name="id_estado">
                                    <option value=<?= $idEstado ?>><?= $estado ?></option>
                                    <?php
                                        foreach ($buscaEstados as $busca) {
                                            $idEstado = $busca['id'];
                                            $nomeEstado = $busca['nome'];
                                    ?>
                                            <option class="text-left" value="<?= $idEstado ?>"><?= $nomeEstado ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php 
                            $createdAtData = convertDataMySQL_DataPHP($createdAt);
                            $createdAtHora = convertDataMySQL_HoraPHP($createdAt);
                            $updatedAtData = convertDataMySQL_DataPHP($updatedAt);
                            $updatedAtHora = convertDataMySQL_HoraPHP($updatedAt);
                        ?>
                        <div class="text-center">
                            <span>Usuário criado por <strong><?= $criador ?></strong>, na data de <strong><?= $createdAtData ?></strong> às <strong><?= $createdAtHora ?></strong> horas.</span>
                            <input type="hidden" name="created_by" value="<?= $createdBy ?>">
                            <br />
                            <span>Última alteração de perfil em <strong><?= $updatedAtData ?></strong> às <strong><?= $updatedAtHora ?></strong> horas.</span>
                            <br />
                            <br />
                            <button class="btn btn-primary" type="submit">Salvar Perfil</button>
                        </div>                        
                    </form>
                </div>
			</div>
        </div>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>