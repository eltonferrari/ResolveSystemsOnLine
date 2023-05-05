<?php
    session_start();
    include 'class_pessoas.php';
    date_default_timezone_set('America/Sao_Paulo');
    $id             = $_POST['id'];
    $nome           = $_POST['nome'];
    $idTipo         = $_POST['id_tipo'];
    $ativo  = ( isset($_POST['ativo']) )  ? 1 : 0;
    $cpf            = $_POST['cpf'];
    $dataNasc       = $_POST['datanasc'] . ' 00:00:00';
    $idSexo         = $_POST['id_sexo'];
    $email          = $_POST['email'];
    $telefone       = $_POST['telefone'];
    $cep            = $_POST['cep'];
    $endereco       = $_POST['endereco'];
    $enderecoCompl  = $_POST['endereco_compl'];
    $bairro         = $_POST['bairro'];
    $cidade         = $_POST['cidade'];
    $idEstado       = $_POST['id_estado'];
    $createdBy      = $_POST['created_by'];
    $updatedAt      = new DateTime('now');
    $dataAtual = $updatedAt->format('Y-m-d H:i:s');

    $pessoa = new Pessoas();
    $pessoa = $pessoa->editPessoa(
                        $idTipo,
                        $nome,
                        $cpf,
                        $dataNasc,
                        $idSexo,
                        $email,
                        $telefone,
                        $cep,
                        $endereco,
                        $enderecoCompl,
                        $bairro,
                        $cidade,
                        $idEstado,
                        $ativo,
                        $createdBy,
                        $dataAtual,
                        $id
                       );
    $_SESSION['msg_update'] = "Usuário $nome alterado com sucesso.";
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/busca_perfil.php">
    <?php
    //header("Location: ../../visualizacoes/pessoas/busca_perfil.php");

?>