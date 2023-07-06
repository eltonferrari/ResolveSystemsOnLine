<?php
    session_start();
    include '../pessoas/class_pessoas.php';

    $idPessoa = $_POST['id_pessoa'];
    $senhaNova = (md5($_POST['senha_nova']));
    $retypeSenhaNova = (md5($_POST['retype_senha_nova']));
    
    $senhaAlterada = new Pessoas();
    $msgAlteraSenha = null;
    if ($senhaNova == $retypeSenhaNova) {
        $senhaAlterada->alteraSenha($senhaNova, $idPessoa);
        $msgAlteraSenha = 'Senha alterada com sucesso!';
    } else {
        $msgAlteraSenha = 'A senha não foi repetida corretamente!<br />Tente novamente';
    }
    $_SESSION['msgAlteraSenha'] = $msgAlteraSenha;
?>
    <meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/alterar_senha.php?id_pessoa=<?= $idPessoa ?>">
<?php
?>    