<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';
	// MENU
	include '../../controladores/pessoas/class_pessoas.php';
	$tipoUser = $_SESSION['tipo'];
	$idUser = $_SESSION['id_logado'];
    $nomeMenu = new Pessoas;
	$nomeMenu = $nomeMenu->getNomeById($idUser);
	// ===============
    $buscaPessoas = new Pessoas();
    $buscaPessoas = $buscaPessoas->getAllPessoas();
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
                    <h1 class="text-primary text-center mt-3 negrito">Novo Contrato</a></h1>
                </div>
                <div class="form">
                    <form action="valida_contrato.php" method="post">
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group-prepend my-1">
                                        <span class="input-group-text bg-primary text-light borda-redonda-20-left">Cliente: </span>
                                        <select class="form-control borda-redonda-20-right" name="pessoa" id="pessoa">
                                            <option value=0>Selecione o cliente...</option>
                                            <?php
                                                if (!is_null($buscaPessoas)) {
                                                    foreach ($buscaPessoas as $busca) {
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
                                    <div class="input-group-inline">
                                        <label class="text-primary mr-2 negrito" for="mensagem">Descrição do contrato: </label>
                                        <textarea class="borda-redonda-20 border border-primary p-1" name="mensagem" id="mensagem" placeholder="Descreva o contrato aqui..." cols="58" maxlength="255" ></textarea>
                                        <div class="text-danger negrito" id="caracteres_restantes">255</div>
                                        <script type="text/javascript">
                                            textarea = document.querySelector("#mensagem");
                                            textarea.addEventListener('input', autoResize, false);
                                        
                                            function autoResize() {
                                                this.style.height = 'auto';
                                                this.style.height = this.scrollHeight + 'px';
                                            }                                
                                            var textarea=document.getElementById("mensagem");
                                            var caracteresRestantes=document.getElementById("caracteres_restantes");
                                            textarea.oninput=function(e){
                                                caracteresRestantes.innerHTML=(255-this.value.length);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    Status
                                    DATA
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