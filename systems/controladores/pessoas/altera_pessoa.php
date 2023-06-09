<?php
    session_start();
    include 'class_pessoas.php';
    date_default_timezone_set('America/Sao_Paulo');
    $id             = $_POST['id'];
    $nome           = $_POST['nome'];
    $idTipo         = $_POST['id_tipo'];
    $ativo          = ( isset($_POST['ativo']) )  ? 1 : 0;
    $cpf_cnpj       = $_POST['cpf_cnpj'];
    $dataNasc       = $_POST['datanasc'] . ' 00:00:00';
    $idSexo         = $_POST['id_sexo'];
    $email          = ( isset($_POST['email']) ) ? 1 : 0;
    $emailNovo      = $_POST['email'];
    $telefone       = ( isset($_POST['telefone']) ) ? 1 : 0;
    $telefoneNovo   = $_POST['telefone'];
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
                        $cpf_cnpj,
                        $dataNasc,
                        $idSexo,
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
    $emailAtual = new Emails();
    $emailAtual = $emailAtual->getEmailPrincipal($id);
    $emailPrincipalNovo = new Emails();
    $emailPrincipalNovo = $emailPrincipalNovo->getIdByEmail($emailNovo);
    
    $telefoneAtual = new Telefones();
    $telefoneAtual = $telefoneAtual->getTelefonePrincipal($id);
    $telefonePrincipalNovo = new Telefones();
    $telefonePrincipalNovo = $telefonePrincipalNovo->getIdByTelefone($telefoneNovo);
   
    if ($emailAtual[0]['email'] != $emailNovo) {
        $alteraEmailAtual = new Emails();
        $alteraEmailAtual->editEmail(0, $emailAtual[0]['id']);
        $alteraEmailPrincipalNovo = new Emails();
        $alteraEmailPrincipalNovo->editEmail(1, $emailPrincipalNovo[0]['id']);
    }
    if ($telefoneAtual[0]['telefone'] != $telefoneNovo) {
        $alteraTelefoneAtual = new Telefones();        
        $alteraTelefoneAtual->editTelefone(0, $telefoneAtual[0]['id']);
        $alteraTelefonePrincipalNovo = new Telefones();
        $alteraTelefonePrincipalNovo->editTelefone(1, $telefonePrincipalNovo[0]['id']);
    }
    
    $_SESSION['msg_update'] = "Usuário $nome alterado com sucesso.";
    ?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/pessoas/busca_perfil.php">
    <?php
?>