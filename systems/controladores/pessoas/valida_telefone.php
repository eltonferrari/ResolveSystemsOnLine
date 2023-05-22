<?php
    include 'class_telefones.php';
    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $idPessoa = $_POST['id_perfil'];
    $novoTelefone = $_POST['telefone'];
    $insertIdTelefone = new Telefones();
    $insertIdTelefone = $insertIdTelefone->addTelefonePessoa($idPessoa,$novoTelefone,0);
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/cadastra_telefone.php?id_perfil=<?= $idPessoa ?>">
    <?php
?>