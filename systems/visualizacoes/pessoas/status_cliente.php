<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/tipos/class_tipos.php';
	include '../../controladores/sexos/class_sexos.php';
	include '../../controladores/estados/class_estados.php';
	include '../../controladores/contratos/class_contratos.php';
	include '../../lib/util.php';

	// MENU
	include '../../controladores/pessoas/class_pessoas.php';  
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
	$nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	$imagem_perfil = new Pessoas();
	$imagem_perfil = $imagem_perfil->getImagemById($idUser);
	// ===============
	
	$user = new Pessoas();
    $user = $user->getPessoaById($idUser);
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
    
    $activ  = ( $ativo == 1)  ? 'Ativo' : 'Inativo';
    $tipo = new Tipos();
    $tipo = $tipo->getNomeById($idTipo);
    $sexo = new Sexos();
    $sexo = $sexo->getSexoById($idSexo);
    $estado = new Estados();
    $estado = $estado->getNomeById($idEstado);
    $criador = new Pessoas();
    $criador = $criador->getNomeById($createdBy);
    $idUser = $_SESSION['id_logado'];
    $nomePerfil = new Pessoas();
	$nomePerfil = $nomePerfil->getNomeById($id);
    $email = new Emails();
    $email = $email->getEmailPrincipal($id);
    $telefone = new Telefones();
    $telefone = $telefone->getTelefonePrincipal($id);
	$dataNascimento = convertDataMySQL_DataPHP($dataNasc);
	$contratos = new Contratos();
	$contratos = $contratos->getContratosByCliente($id);
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
			<div class="text-center mt-3">
				<img src="../../../img/icones/cliente.png" alt="Home" width="80">
                <h1 class="text-primary negrito">Página do cliente</h1>
			</div>
			<div class="row">
				<div class="col-md-5 border border-primary borda-redonda-20">
					<div class="text-center mt-3">
						<div class="row">
							<div class="col-md-10 pl-5">
								<img src="../../../img/icones/perfil-outros.png" alt="Home" width="40">
								<h2 class="text-primary negrito">Perfil </h2>
							</div>
							<div class="col-md-2">
								<a href="busca_perfil.php?user=<?= $idUser ?>">
									<img src="../../../img/icones/editar.png" alt="Home" width="20" title="Editar perfil?">
								</a>
							</div>
						</div>
						<hr class="divisor">
					</div>
					<div class="text-left">
						<span class="font-size-20 negrito" for="nome">Nome: </span>
						<span class="font-size-20"><?= $nome ?></span>
						<br />
						<span class="negrito">Código Identificador: </span>
						<span><?= $id ?></span>
						<br />
						<span class="negrito">Tipo: </span>
						<span><?= $tipo ?></span>
						<br />
						<span class="negrito">Usuário: </span>
						<span><?= $activ ?></span>
						<br />
						<span class="negrito">CPF/CNPJ: </span>
						<span><?= $cpf_cnpj ?></span>
						<br />
						<span class="negrito">Nascimento: </span>
						<span><?= $dataNascimento ?></span>
						<br />                   
						<span class="negrito">Sexo: </span>
						<span><?= $sexo ?></span>
						<br />
						<span class="negrito">E-mail: </span>
						<span><?= $email ?></span>
						<br />
						<span class="negrito">Telefone: </span>
						<span><?= $telefone ?></span>
						<br />
						<span class="negrito">CEP: </span>
						<span><?= $cep ?></span>
						<br />
						<span class="negrito">Endereço: </span>
						<span><?= $endereco ?></span>
						<br />
						<span class="negrito">Compl.: </span>
						<span><?= $enderecoCompl ?></span>
						<br />
						<span class="negrito">Bairro: </span>
						<span><?= $bairro ?></span>
						<br />
						<span class="negrito">Cidade: </span>
						<span><?= $cidade ?></span>
						<br />
						<span class="negrito">Estado: </span>
						<span><?= $estado ?></span>
					</div>
					<?php 
						$createdAtData = convertDataMySQL_DataPHP($createdAt);
						$createdAtHora = convertDataMySQL_HoraPHP($createdAt);
						$updatedAtData = convertDataMySQL_DataPHP($updatedAt);
						$updatedAtHora = convertDataMySQL_HoraPHP($updatedAt);
					?>
					<div class="text-center">
						<span>Usuário criado por: </span>
						<span class="negrito"><?= $criador ?></span>
						<br />
						<span>Na data de </span>
						<span class="negrito"><?= $createdAtData ?></span>
						<span> às </span>
						<span class="negrito"><?= $createdAtHora ?></span>
						<span> horas.</span>
						<br />
						<span>Última alteração de perfil em </span>
						<span class="negrito"><?= $updatedAtData ?></span>
						<span> às </span>
						<span class="negrito"><?= $updatedAtHora ?></span>
						<span> horas.</span>
					</div>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-5 text-center">
					<div class="text-center border border-primary borda-redonda-20">

						<img class="mt-3" src="../../../img/icones/contrato.png" alt="Home" width="40">
						<h2 class="text-primary negrito">Contratos</h2>
						<hr class="divisor">
						<div class="row mb-5">
							<div class="col-md-1"></div>
							<div class="col-md-4">
								<h3 class="text-primary negrito font-size-20">Abertos</h3>
								<hr class="divisor">
								<?php
									if (!empty($contratos)) {
										foreach ($contratos as $aberto) {
											$contrId = $aberto['id'];
											$contrAb = $aberto['aberto'];										
											if ($contrAb == 1) {
								?>
												<a href="../contratos/ver_contrato.php?id_contrato=<?= $contrId ?>" title="Ver contrato?"><?= $contrId ?></a>
												<br />
								<?php
											}
										}
									}
								?>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-4">
								<h3 class="text-primary negrito font-size-20">Concluídos</h3>
								<hr class="divisor">
								<?php
									if (!empty($contratos)) {
										foreach ($contratos as $aberto) {
											$contrId = $aberto['id'];
											$contrAb = $aberto['aberto'];										
											if ($contrAb == 0) {
								?>
												<a href="../contratos/ver_contrato.php?id_contrato=<?= $contrId ?>" title="Ver contrato?"><?= $contrId ?></a>
												<br />
								<?php
											}
										}
									}
								?>
							</div>
							<div class="col-md-1"></div>
						</div>
					</div>					
				</div>
			</div>
        </section>
		<?php
				include '../../../template/js-bootstrap.php'; 
			?>	
    </body>
</html>