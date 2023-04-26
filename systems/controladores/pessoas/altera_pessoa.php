<?php
    session_start();
    include 'class_pessoas.php';
    date_default_timezone_set('America/Sao_Paulo');
    echo '===== SESSION =====';
    echo "<pre>";
    print_r($_SESSION);
    echo '</pre>';

    echo '===== POST =====';
    echo "<pre>";
    print_r($_POST);
    echo '</pre>';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idTipo = $_POST['id_tipo'];
    if (isset($_POST['ativo'])) {
        $ativo = 1;
    } else {
        $ativo = 0;
    }
    $cpf            = $_POST['cpf'];
    $dataNasc       = $_POST['datanasc'];
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
    echo '===== DATA ATUAL =====';
    $dataAtual = $updatedAt->format('Y-m-d H:i:s');
    echo $dataAtual;
    $pessoa = new Pessoas();
    $pessoa->editPessoa($id,
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
                        $dataAtual);
    $_SESSION['msg_update'] = "Usuário $nome alterado com sucesso.";
    header("Location: ../../visualizacoes/pessoas/busca_perfil.php");

?>