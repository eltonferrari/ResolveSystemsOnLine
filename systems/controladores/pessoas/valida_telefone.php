<?php
    session_start();
    include 'class_telefones.php';
    $idPessoa = $_POST['id_perfil'];
    $todosTelefones = new Telefones();
    $todosTelefones = $todosTelefones->getAllTelefones($idPessoa);
    $novoTelefone = $_POST['telefone'];
    $insertIdTelefone = new Telefones();
    $principal = null;
    $principal = (!isset($todosTelefones)) ? 1 : 0;
    $insertIdTelefone = $insertIdTelefone->addTelefonePessoa($idPessoa,$novoTelefone,$principal);
    $msgTelefoneNovo = "Telefone: $novoTelefone - cadastrado com sucesso no sistema!";
    $_SESSION['msgTelefoneNovo'] = $msgTelefoneNovo;
?>
    <meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/cadastra_telefone.php?id_perfil=<?= $idPessoa ?>">
<?php
?>