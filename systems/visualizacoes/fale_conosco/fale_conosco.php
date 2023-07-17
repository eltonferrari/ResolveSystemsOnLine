<?php
    session_start();
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
		<title>RS - Mensagem de Intenção</title>
	</head>
    <body>
        <?php include '../../../template/menu.php'; ?>
        <div class="container">
            <h3 class="text-primary text-center mt-5 negrito">Fale conosco</h3>
            <?php
                if (isset($_SESSION['msgAddMensagem'])) {
                    $msgAddMensagem = $_SESSION['msgAddMensagem'];
            ?>
                    <p class="text-danger text-center mt-1 negrito"><?= $msgAddMensagem ?></p>
            <?php
                    unset($_SESSION['msgAddMensagem']);
                } else {
            ?>
                    <p class="text-primary text-center mt-1 negrito">
                        Deseja deixar uma mensagem para nós? Preencha este formulário abaixo.
                    </p>
                    <h6 class="text-danger text-center">* Preenchimento obrigatório</h6>
                    <form action="../../controladores/fale_conosco/valida_fale_conosco.php" method="post">
                        <div class="row">
                            <div class="col-md-8 row m-auto mb-2">
                                <div class="col-md-3 form-group">
                                    <label class="text-danger" for="nome">* </label>
                                    <label class="text-primary mr-2 negrito" for="nome">Nome: </label>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <input class="form-control border border-primary borda-redonda-10 p-1" type="text input-width" name="nome" id="nome" placeholder="Coloque seu nome aqui..." size="50" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="text-danger" for="email">* </label>
                                    <label class="text-primary mr-2 negrito" for="email">E-mail: </label>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <input class="form-control border border-primary borda-redonda-10 p-1" type="text input-width" name="email" id="email" placeholder="Coloque seu e-mail aqui..." size="50" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="text-primary mr-2 negrito" for="telefone">Telefone: </label>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <input class="form-control border border-primary borda-redonda-10 p-1" type="text input-width" name="telefone" id="telefone" placeholder="Coloque seu telefone aqui..." size="50">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="text-primary mr-2 negrito" for="mensagem">Deixe uma mensagem: </label>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <textarea class="form-control border border-primary borda-redonda-10 p-1" name="mensagem" id="mensagem" placeholder="Coloque sua mensagem aqui..." cols="53" maxlength="255" ></textarea>
                                    <div class="text-danger negrito" id="caracteres_restantes">255</div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-lg btn-primary btn-lg" type="submit">Enviar</button>
                        </div>
                    </form>
            <?php
                }
            ?>
            <div class="espaco-pre-footer"></div>
            <?php include '../../../template/js-bootstrap.php'; ?>
        </div>
    </body>
</html>