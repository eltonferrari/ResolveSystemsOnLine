<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/tipos/class_tipos.php';
	include '../../controladores/pessoas/class_pessoas.php';
    $buscaTipo = new Tipos();
	$buscaTipo = $buscaTipo->getAllTipos();
	$buscaPerfil = new Pessoas();
	$buscaPerfil = $buscaPerfil->getIdNomeAllPessoas();
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

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../../assets/Bootstrap4/css/bootstrap.min.css">

		<!-- NORMALIZE CSS -->
		<link   rel="stylesheet" type="text/css" href="../../../assets/css/normalize.css">

		<!-- CSS CUSTOMIZADO -->
		<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">

		<title>RS - Resolve Systems</title>
	</head>
    <body>
        <?php include '../../../template/menu_logado.php';?>
        <div class="container">
			<div class="text-center">
				<img src="../../../img/icones/home-azul.png" alt="Home" width="80">
			</div>
			<div class="row pb-5">
				<div class="col-md-4">
					<div class="text-center mt-3">
						<h5 class="text-primary">Funções de Usuários</h5>
						<?php 
							if (isset($_SESSION['msg_altera_tipo'])) {
								$msgAlteraTipo = $_SESSION['msg_altera_tipo'];
						?>
								<h6 class="text-danger">(<?= $msgAlteraTipo ?>)</h6>
						<?php 
								unset($_SESSION['msg_altera_tipo']);
							}
							if (!is_null($buscaTipo)) {
									foreach ($buscaTipo as $busca) {
										$id = $busca['id'];
										$nome = $busca['nome'];
										$descricao = $busca['descricao'];
							?>
										<div class="row border font-reduzida">
											<div class="col-md-4 border text-left">
												<?= $nome ?>
											</div>
											<div class="col-md-7 text-left">
												<?= $descricao ?>
											</div>
											<div class="col-md-1 border-left p-1">
												<a href="../../visualizacoes/tipos_de_usuarios/altera_funcao.php?id_tipo=<?= $id ?>">
													<img src="../../../img/icones/editar.png" alt="altera_funcao" title="Alterar esta função" width="15">
												</a>	
											</div>
										</div>
							<?php
									}
								}
							?>
						<h5 class="text-primary mt-3">Adicionar nova função</h5>
						<?php 
							if (isset($_SESSION['msg_add_tipo'])) {
								$msgAddTipo = $_SESSION['msg_add_tipo'];
						?>
								<h6 class="text-danger">(<?= $msgAddTipo ?>)</h6>
						<?php 
								unset($_SESSION['msg_add_tipo']);
							}
						?>
						<form name="add-tipos" action="../../controladores/tipos/adiciona_tipo.php" method="post">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary text-light">
										Nome:
									</span>
								</div>
								<input class="form-control" type="text" placeholder="Nome da função" name="nome_tipo" required>
							</div>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary text-light">
										Descrição:
									</span>
								</div>
								<input class="form-control" type="text" placeholder="Descreva a função" name="descricao" required>
							</div>
							<button class="btn btn-lg btn-primary btn-lg" type="submit">Salvar</button>
						</form>
					</div>
				</div>
				<div class="col-md-4">
					<div class="text-center text-success">
						<h5 class="text-primary mt-3">Criar novo usuário</h5>
						<?php 
							if (isset($_SESSION['msg_add_user'])) {
								$msgAddUser = $_SESSION['msg_add_user'];
						?>
								<h6 class="text-danger">(<?= $msgAddUser ?>)</h6>
						<?php 
								unset($_SESSION['msg_add_user']);
							}
						?>
						<form name="add-users" action="../../controladores/pessoas/adiciona_pessoa.php" method="post">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary text-light">Função: </span>
									<select class="form-control" id="funcao" name="funcao">
										<option value=0>Selecione a função...</option>
										<?php
											if (!is_null($buscaTipo)) {
												foreach ($buscaTipo as $busca) {
													$id = $busca['id'];
													$nome = $busca['nome'];												
										?>
													<option value="<?= $id ?>"><?= $nome ?></option>
										<?php
												}
											}
										?>
									</select>
								</div>
							</div>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary text-light">
										Nome:
									</span>
								</div>
								<input class="form-control" type="text" placeholder="Nome do usuário" name="nome" required>
							</div>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary text-light">
										E-mail:
									</span>
								</div>
								<input class="form-control" type="text" placeholder="E-mail do usuário" name="email" required>
							</div>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary text-light">
										Senha:
									</span>
								</div>
								<input class="form-control" type="password" placeholder="Senha do usuário" name="senha" required>
							</div>
							<button class="btn btn-lg btn-primary btn-lg" type="submit">Adicionar</button>
						</form>
					</div>
				</div>
				<div class="col-md-4">
					<div class="text-center text-success">
						<h5 class="text-primary mt-3">Perfil de Usuário</h5>
						<?php
							if (isset($_SESSION['msg_update'])) {
								$msgUpdate = $_SESSION['msg_update'];
						?>
								<h6 class="text-danger">(<?= $msgUpdate ?>)</h6>
						<?php 
								unset($_SESSION['msg_update']);
							}
						?>
						<form name="busca-perfil" action="../../visualizacoes/pessoas/busca_perfil.php" method="post">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary text-light">Usuário: </span>
									<select class="form-control" id="user" name="user">
										<option value=0>Selecione o Usuário</option>
										<?php
											if (!is_null($buscaPerfil)) {
												foreach ($buscaPerfil as $buscaP) {
													$idUser = $buscaP['id'];
													$nomeUser = $buscaP['nome'];												
										?>
													<option value="<?= $idUser ?>"><?= $nomeUser ?></option>
										<?php
												}
											}
										?>
									</select>
								</div>
							</div>
							<button class="btn btn-lg btn-primary btn-lg" type="submit">Buscar Perfil</button>
						</form>
					</div>
				</div>
			</div>
        </div>
        <?php
            include '../../../template/js-bootstrap.php'; 
        ?>
    </body>
</html>