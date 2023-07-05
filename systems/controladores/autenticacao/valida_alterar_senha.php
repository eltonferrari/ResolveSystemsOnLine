<?php
    session_start();
    include '../pessoas/class_pessoas.php';

    $idPessoa = $_POST['id_pessoa'];
    $senhaAntiga = (md5($_POST['senha_antiga']));
    $senhaNova = (md5($_POST['senha_nova']));
    $retypeSenhaNova = (md5($_POST['retype_senha_nova']));
    
    $senhaAntigaBanco = new Pessoas();
    $senhaAntigaBanco = $senhaAntigaBanco->getSenhaById($idPessoa);
    $senhaAlterada = new Pessoas();
    $msgAlteraSenha = null;
    if ($senhaAntigaBanco == $senhaAntiga) {
        if ($senhaNova == $retypeSenhaNova) {
            $senhaAlterada->alteraSenha($senhaNova, $idPessoa);
            $msgAlteraSenha = 'Senha alterada com sucesso!';
        } else {
            $msgAlteraSenha = 'A senha não foi repetida corretamente!<br />Tente novamente';
        }
    } else {
        $msgAlteraSenha = 'É necessário a senha antiga correta!';
    }
    $_SESSION['msgAlteraSenha'] = $msgAlteraSenha;
?>
    <meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/alterar_senha.php?id_pessoa=<?= $idPessoa ?>">
<?php
?>    